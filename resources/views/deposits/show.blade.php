@section('title', __('Deposit'))
<x-layouts.app :title="__('Deposit')">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">
                        <i class="fas fa-wallet"></i> Riwayat Deposit
                    </h4>
                </div>
                <div class="card-body">
                    @if ($deposits->count() > 0)
                        <div class="table-responsive-custom">
                            <table class="table-custom">
                                <thead>
                                    <tr>
                                        <th class="text-center">No</th>
                                        @if (Auth::user()->role === 'admin')
                                            <th>Nama Pengguna</th>
                                        @endif
                                        <th>Jumlah Deposit</th>
                                        <th>Cashback</th>
                                        <th>Status</th>
                                        <th>Reference</th>
                                        <th>Tanggal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($deposits as $deposit)
                                        <tr>
                                            <td class="text-center fw-semibold">
                                                {{ $loop->iteration + ($deposits->currentPage() - 1) * $deposits->perPage() }}
                                            </td>

                                            @if (Auth::user()->role === 'admin')
                                                <td>{{ $deposit->user->name ?? '-' }}</td>
                                            @endif

                                            <td>Rp {{ number_format($deposit->amount, 0, ',', '.') }}</td>
                                            <td>Rp {{ number_format($deposit->cashback, 0, ',', '.') }}</td>
                                            <td>
                                                <span
                                                    class="badge bg-{{ $deposit->status === 'success' ? 'success' : 'secondary' }}">
                                                    {{ ucfirst($deposit->status) }}
                                                </span>
                                            </td>
                                            <td>{{ $deposit->reference }}</td>
                                            <td>{{ \Carbon\Carbon::parse($deposit->created_at)->format('d M Y H:i') }}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <div class="mt-3">
                            {{ $deposits->links() }}
                        </div>
                    @else
                        <div class="text-center py-4">
                            <i class="fas fa-wallet fa-4x text-muted mb-3"></i>
                            <h4 class="text-muted">Belum Ada Riwayat Deposit</h4>
                        </div>
                    @endif
                </div>
            </div>
        </div>

    </div>
</x-layouts.app>
