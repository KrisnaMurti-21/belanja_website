<?php

namespace App\Http\Controllers;

use App\Models\Deposit;
use App\Models\User;
use Duitku\Config;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class DepositController extends Controller
{
    private function getDuitkuConfig()
    {
        $config = new Config(env("DUITKU_MERCHANT_KEY"), env("DUITKU_MERCHANT_CODE"));
        $config->setSandboxMode(true);
        // set sanitizer (default : true)
        $config->setSanitizedMode(false);
        // set log parameter (default : true)
        $config->setDuitkuLogs(false);
        return $config;
    }

    public function index()
    {
        Auth::user()->id;
        $user = User::find(Auth::user()->id);
        $depositUser = $user->deposit;
        return view('deposits.index', compact('depositUser'));
    }

    public function createDeposit(Request $request)
    {
        $duitkuConfig = $this->getDuitkuConfig();

        $amount = (int) $request->input('amount', 100000);
        // Buat record deposit terlebih dahulu (status: pending)
        $deposit = \App\Models\Deposit::create([
            'user_id'   => Auth::user()->id,
            'amount'    => $amount,
            'status'    => 'pending',
            'cashback'  => 0, // default
            'reference' => 'deposit-' . time()
        ]);

        // Gunakan ID deposit sebagai merchantOrderId
        $merchantOrderId = 'ORDER-X-' . $deposit->id;

        $params = [
            'paymentAmount'     => $amount,
            'merchantOrderId'   => (string) $merchantOrderId, // harus string
            'productDetails'    => 'Top Up Saldo',
            'email'             => Auth::user()->email,
            'customerVaName'    => $user->name ?? 'Customer',
            'callbackUrl'       => config('services.callback_url'),
            'returnUrl'         => config('services.return_url'),
            'expiryPeriod'      => 60,
            'itemDetails'       => [
                [
                    'name'     => 'Top Up Saldo',
                    'price'    => $amount,
                    'quantity' => 1,
                ]
            ],
        ];

        try {
            // Kirim request ke Duitku
            $responseDuitkuPop = \Duitku\Pop::createInvoice($params, $duitkuConfig);
            $res = json_decode($responseDuitkuPop, true);

            // Simpan reference dari Duitku ke dalam record deposit
            $deposit->update([
                'reference' => $res['reference']
            ]);

            // Redirect user ke halaman pembayaran Duitku
            return redirect()->to($res['paymentUrl']);
        } catch (\Exception $e) {
            // Gagal kirim ke Duitku
            Log::error('Create payment gagal: ' . $e->getMessage());
            return back()->with('error', 'Terjadi kesalahan saat memproses pembayaran.');
        }
    }
    // Untuk return URL (GET) - redirect user setelah payment
    public function handleReturn(Request $request)
    {
        $merchantOrderId = $request->get('merchantOrderId');
        $resultCode = $request->get('resultCode');
        $reference = $request->get('reference');

        if ($resultCode == "00") {
            // Payment success - redirect to success page
            return view('deposits.success');
        } else {
            // Payment failed - redirect to failed page
            return view('deposits.failed');
        }
    }

    // Untuk callback URL (POST) - server-to-server notification
    public function handleCallback(Request $request)
    {
        Log::info('===> handleCallback() CALLED');
        try {
            $callback = \Duitku\Api::callback($this->getDuitkuConfig());

            header('Content-Type: application/json');
            $notif = json_decode($callback, true);

            if (!empty($notif['merchantCode']) && !empty($notif['amount']) && !empty($notif['merchantOrderId']) && !empty($notif['signature'])) {
                $params = $notif['merchantCode'] . $notif['amount'] . $notif['merchantOrderId'] . env('DUITKU_MERCHANT_KEY');
                $calcSignature = md5($params);

                $cashback = 0;
                $beforeAmount = $notif['amount'];
                if ($beforeAmount >= 15000000) {
                    $cashback = $beforeAmount * 0.20;
                } elseif ($beforeAmount >= 10000000) {
                    $cashback = $beforeAmount * 0.12;
                } elseif ($beforeAmount >= 5000000) {
                    $cashback = $beforeAmount * 0.05;
                } else {
                    $cashback = 0;
                }
                $finalAmount = $beforeAmount + $cashback;
                if ($notif['signature'] == $calcSignature) {
                    $orderId = str_replace('ORDER-X-', '', $notif['merchantOrderId']);
                    $deposit = Deposit::find($orderId);
                    if ($deposit->status !== 'success') {
                        $deposit->update([
                            'status' => 'success',
                            'cashback' => $cashback
                        ]);
                        $user = User::find($deposit->user_id);
                        if ($user) {
                            $user->update([
                                'deposit' => $user->deposit + $finalAmount,
                            ]);
                        }
                        return response()->json(['message' => 'Callback received'], 200);
                    }
                }
            } else {
                return response()->json(['message' => 'Invalid callback data'], 400);
            }
            return response()->json(['message' => 'Callback received'], 200);
        } catch (\Exception $e) {
            Log::error('Callback Duitku error: ' . $e->getMessage());
            return response()->json(['message' => 'Internal Server Error'], 500);
        }
    }

    public function show()
    {
        $user = Auth::user();

        if ($user->role === 'admin' || $user->role === 'supervisor') {
            $deposits = Deposit::with('user')->latest()->paginate(10);
        } else {
            $deposits = Deposit::where('user_id', $user->id)
                ->latest()
                ->paginate(10);
        }

        return view('deposits.show', compact('deposits'));
    }
}
