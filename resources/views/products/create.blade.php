@section('title', __('Products'))
<x-layouts.app :title="__('Products'))">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="form-container">
                    <h2>Form Pembayaran</h2>

                    <!-- Tampilkan pesan error/success -->
                    @if (session('error'))
                        <div class="alert alert-error">
                            {{ session('error') }}
                        </div>
                    @endif

                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form action="{{ url('/payment/create') }}" method="POST">
                        @csrf

                        <div class="form-group">
                            <label for="name">Nama Lengkap</label>
                            <input type="text" id="name" name="name" required value="{{ old('name') }}"
                                placeholder="Masukkan nama lengkap">
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" required value="{{ old('email') }}"
                                placeholder="contoh@email.com">
                        </div>

                        <div class="form-group">
                            <label for="phone">Nomor HP</label>
                            <input type="text" id="phone" name="phone" required value="{{ old('phone') }}"
                                placeholder="08123456789">
                        </div>

                        <div class="form-group">
                            <label for="product">Produk</label>
                            <select id="product" name="product" required>
                                <option value="">Pilih Produk</option>
                                <option value="Produk A" {{ old('product') == 'Produk A' ? 'selected' : '' }}>Produk A
                                </option>
                                <option value="Produk B" {{ old('product') == 'Produk B' ? 'selected' : '' }}>Produk B
                                </option>
                                <option value="Produk C" {{ old('product') == 'Produk C' ? 'selected' : '' }}>Produk C
                                </option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Pilih Jumlah Pembayaran</label>
                            <div class="amount-options">
                                <div class="amount-btn" data-amount="10000">Rp 10.000</div>
                                <div class="amount-btn" data-amount="25000">Rp 25.000</div>
                                <div class="amount-btn" data-amount="50000">Rp 50.000</div>
                                <div class="amount-btn" data-amount="100000">Rp 100.000</div>
                                <div class="amount-btn" data-amount="250000">Rp 250.000</div>
                                <div class="amount-btn" data-amount="500000">Rp 500.000</div>
                            </div>
                            <input type="number" id="amount" name="amount" required
                                value="{{ old('amount', 50000) }}" min="10000"
                                placeholder="Atau masukkan jumlah manual">
                        </div>

                        <button type="submit" class="btn">Bayar Sekarang</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function previewImage(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const preview = document.getElementById('preview');
                    const previewDiv = document.getElementById('imagePreview');
                    preview.src = e.target.result;
                    previewDiv.style.display = 'block';
                };
                reader.readAsDataURL(file);
            }
        }
    </script>

</x-layouts.app>
