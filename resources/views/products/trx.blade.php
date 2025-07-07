@section('title', __('Products'))
<x-layouts.app :title="__('Products')">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">
                        <i class="fas fa-box"></i> Products History List
                    </h4>
                </div>
                <div class="card-body">
                    @if ($purchases->count() > 0)
                        <div class="table-responsive-custom">
                            <table class="table-custom">
                                <thead>
                                    <tr>
                                        <th class="text-center">No</th>
                                        @if (Auth::user()->role == 'admin')
                                            <th>Nama Pengguna</th>
                                        @endif
                                        <th>Produk</th>
                                        <th>Gambar</th>
                                        <th>Jumlah</th>
                                        <th>Harga</th>
                                        <th>Tanggal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($purchases as $purchase)
                                        <tr>
                                            <td class="text-center fw-semibold">
                                                {{ $loop->iteration + ($purchases->currentPage() - 1) * $purchases->perPage() }}
                                            </td>
                                            @if (Auth::user()->role == 'admin')
                                                <td>{{ $purchase->user->name ?? '-' }}</td>
                                            @endif
                                            <td>{{ $purchase->product->name ?? $purchase->product_name }}</td>
                                            <td>
                                                @if ($purchase->product && $purchase->product->image)
                                                    <img src="{{ asset('storage/' . $purchase->product->image) }}"
                                                        alt="" class="product-image">
                                                @else
                                                    <small class="text-muted">-</small>
                                                @endif
                                            </td>

                                            <td>{{ $purchase->amount }}</td>
                                            <td>Rp {{ number_format($purchase->product->price ?? 0, 0, ',', '.') }}</td>
                                            <td>{{ $purchase->created_at->format('d M Y H:i') }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="text-center py-4">
                            <i class="fas fa-box-open fa-4x text-muted mb-3"></i>
                            <h4 class="text-muted">No Purchase History</h4>
                        </div>
                    @endif

                    {{ $purchases->links() }}
                </div>
            </div>
        </div>

    </div>
</x-layouts.app>
