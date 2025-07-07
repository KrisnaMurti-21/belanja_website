<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Purchase;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class TransactionController extends Controller
{
    public function checkout(Product $product)
    {
        Auth::user()->id;
        $user = User::find(Auth::user()->id);
        $userAmount = $user->deposit;
        return view('transactions.checkout', compact('product', 'userAmount'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'price' => 'required|numeric',
            'ppn' => 'required|numeric',
            'total_price' => 'required|numeric',
        ]);

        $user = Auth::user();
        $depositUser = User::find($user->id);

        if ($depositUser->deposit < $request->total_price) {
            return back()->with('error', 'Saldo tidak cukup untuk melakukan pembelian.');
        }

        $existing = Purchase::where('user_id', $user->id)
            ->where('product_id', $request->product_id)
            ->where('status', 'success')
            ->first();

        if ($existing) {
            return redirect()->route('home')->with('info', 'Transaksi sudah diproses sebelumnya.');
        }

        $product = Product::findOrFail($request->product_id);
        $transactionCode = 'TRX-' . strtoupper(Str::random(10));

        $purchase = Purchase::create([
            'user_id' => $user->id,
            'product_id' => $request->product_id,
            'product_name' => $product->name,
            'amount' => $request->price,
            'status' => 'success',
            'transaction_code' => $transactionCode,
        ]);
        $purchase->load(['product:id,name,image,price']);

        // Potong saldo
        $depositUser->update([
            'deposit' => $depositUser->deposit - $request->total_price
        ]);

        return view('transactions.success', compact('purchase'));
    }

    public function showtrx()
    {
        if (Auth::user()->role == 'admin' || Auth::user()->role == 'supervisor') {
            $purchases = Purchase::with(['user', 'product'])->paginate(10);
        } else {
            $purchases = Purchase::with('product')
                ->where('user_id', Auth::id())
                ->paginate(10);
        }

        return view('products.trx', compact('purchases'));
    }
}
