@section('title', __('Topup'))
<x-layouts.app :title="__('Topup')">
    <div class="row">
        <div class="col-12">
            <!-- Page Header -->
            <div
                class="d-flex justify-content-between align-items-center p-4 mb-4 rounded rounded-3 header-bg shadow-sm">
                <div class="d-flex align-items-center">
                    <span class="p-3 bg-white rounded shadow-md me-3">
                        <i class="bx bx-book text-dark"></i>
                    </span>
                    <h1 class="h2 mb-0 text-dark">Billing</h1>
                </div>
                <div class="d-flex align-items-center points-display shadow-md bg-white px-5 py-3 rounded">
                    <span class="points-badge d-flex align-items-center me-2">
                        <span>Balance Rp.</span>
                    </span>
                    <span class="text-primary fw-bold fs-5">{{ number_format($depositUser, 0, ',', '.') }}</span>
                </div>
            </div>

            <!-- Card Pembayaran -->
            <div class="card px-4 py-5">
                <!-- Tombol Pilihan Nominal -->
                <div class="row g-3 mb-4">
                    @foreach ([100000, 200000, 500000, 750000, 1000000, 2000000, 5000000, 10000000] as $amount)
                        <div class="col-6 col-md-3">
                            <button type="button" class="point-option w-100 btn btn-outline-primary"
                                data-amount="{{ $amount }}">
                                <i class="fas fa-dollar-sign me-1"></i>
                                <span>{{ number_format($amount, 0, ',', '.') }}</span>
                            </button>
                        </div>
                    @endforeach
                </div>

                <!-- Form Input Manual -->
                <form action="{{ url('/topup/create') }}" method="POST" class="d-flex gap-3 mb-4">
                    @csrf
                    <div class="input-group flex-grow-1">
                        <div class="input-group-prepend d-flex align-items-center px-2">
                            <i class="fas fa-dollar-sign me-1"></i>
                            <span>Top Up</span>
                        </div>
                        <input type="number" class="form-control" name="amount" id="amount" min="10000" required
                            placeholder="Atau masukkan jumlah manual" value="{{ old('amount', 100000) }}">
                    </div>
                    <button type="submit" class="btn btn-primary">Bayar Sekarang</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.querySelectorAll('.point-option').forEach(btn => {
            btn.addEventListener('click', function() {
                // Hapus semua kelas aktif
                document.querySelectorAll('.point-option').forEach(b => b.classList.remove('active'));

                // Tambahkan kelas aktif ke tombol yang diklik
                this.classList.add('active');

                // Ambil nilai dan set ke input
                const amount = this.dataset.amount;
                document.getElementById('amount').value = amount;
            });
        });
    </script>

</x-layouts.app>
