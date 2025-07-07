@section('title', __('Products'))
<x-layouts.app :title="__('Products')">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">
                        <i class="fas fa-box"></i> Products List
                    </h4>
                    <a href="{{ route('products.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus"></i> Add New Product
                    </a>
                </div>
                <div class="card-body">
                    @if ($products->count() > 0)
                        <div class="table-responsive-custom">
                            <table class="table-custom">
                                <thead>
                                    <tr>
                                        <th scope="col" class="text-center">No</th>
                                        <th scope="col">Gambar</th>
                                        <th scope="col">Nama Barang</th>
                                        <th scope="col" class="text-start">Harga</th>
                                        <th scope="col" class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $product)
                                        <tr>
                                            <td class="text-center fw-semibold">
                                                {{ $loop->iteration + ($products->currentPage() - 1) * $products->perPage() }}
                                            </td>
                                            <td>
                                                <img src="{{ asset('storage/' . $product->image) }}"
                                                    alt="{{ $product->name }}" class="product-image">
                                            </td>
                                            <td class="fw-semibold">{{ Str::limit($product->name, 20, '...') }}</td>
                                            <td class="text-start">
                                                <span class="price-tag">Rp
                                                    {{ number_format($product->price, 0, ',', '.') }}</span>
                                            </td>
                                            <td class="text-center">
                                                <a href="{{ route('products.show', $product) }}">
                                                    <button class="btn-action btn-view-table" data-bs-toggle="tooltip"
                                                        data-bs-placement="top" title="Lihat Detail">
                                                        <i class="bx bx-show"></i>
                                                    </button>
                                                </a>
                                                <a href="{{ route('products.edit', $product) }}">
                                                    <button class="btn-action btn-edit-table" data-bs-toggle="tooltip"
                                                        data-bs-placement="top" title="Edit Barang">
                                                        <i class="bx bx-edit"></i>
                                                    </button>
                                                </a>
                                                <form class="delete-form"
                                                    action="{{ route('products.destroy', $product) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button"
                                                        class="btn-action btn-delete-table delete-btn"
                                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                                        title="Hapus Barang">
                                                        <i class="bx bx-trash"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="text-center py-4">
                            <i class="fas fa-box-open fa-4x text-muted mb-3"></i>
                            <h4 class="text-muted">No products found</h4>
                            <p class="text-muted">Start by creating your first product</p>
                            <a href="{{ route('products.create') }}" class="btn btn-primary">
                                <i class="fas fa-plus"></i> Create Product
                            </a>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Table section -->
            @if ($products->count() > 0)
            @else
            @endif

        </div>
    </div>
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">
                        <i class="bx bx-trash"></i> Konfirmasi Hapus
                    </h5>
                </div>
                <div class="modal-body">
                    <i class="bx bx-error-circle delete-icon"></i>
                    <h6 class="mb-3">Yakin ingin menghapus data ini?</h6>
                    <p class="text-muted mb-0">Data yang dihapus tidak dapat dikembalikan.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-cancel" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-delete" id="confirmDelete">Hapus</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let formToSubmit = null;

            // Event listener untuk tombol hapus
            document.querySelectorAll('.delete-btn').forEach(button => {
                button.addEventListener('click', function(e) {
                    e.preventDefault();
                    formToSubmit = this.closest('.delete-form');

                    // Tampilkan modal
                    const modal = new bootstrap.Modal(document.getElementById('deleteModal'));
                    modal.show();
                });
            });

            // Event listener untuk tombol konfirmasi hapus
            document.getElementById('confirmDelete').addEventListener('click', function() {
                if (formToSubmit) {
                    formToSubmit.submit();
                }
            });
        });
    </script>
</x-layouts.app>
