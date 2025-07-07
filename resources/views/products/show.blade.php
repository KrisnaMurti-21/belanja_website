@section('title', __('Products'))
<x-layouts.app :title="__('Products')">
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="mb-0">
                    <i class="fas fa-eye"></i> Product Details
                </h4>
                <div class="btn-group">
                    <a href="{{ route('products.edit', $product) }}" class="btn btn-warning btn-sm">
                        <i class="fas fa-edit"></i> Edit
                    </a>
                    <form action="{{ route('products.destroy', $product) }}" 
                          method="POST" 
                          style="display: inline;"
                          onsubmit="return confirm('Are you sure you want to delete this product?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">
                            <i class="fas fa-trash"></i> Delete
                        </button>
                    </form>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <table class="table table-borderless">
                            <tr>
                                <th width="30%">ID:</th>
                                <td>{{ $product->id }}</td>
                            </tr>
                            <tr>
                                <th>Name:</th>
                                <td><strong>{{ $product->name }}</strong></td>
                            </tr>
                            <tr>
                                <th>Price:</th>
                                <td>
                                    <span class="badge bg-success fs-6">
                                        Rp {{ number_format($product->price, 0, ',', '.') }}
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <th>Created:</th>
                                <td>{{ $product->created_at->format('d M Y, H:i') }}</td>
                            </tr>
                            <tr>
                                <th>Updated:</th>
                                <td>{{ $product->updated_at->format('d M Y, H:i') }}</td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-6">
                        <h6><strong>Description:</strong></h6>
                        <div class="border p-3 bg-light rounded">
                            @if($product->description)
                                {{ $product->description }}
                            @else
                                <span class="text-muted">No description available</span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <a href="{{ route('products.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Back to List
                </a>
            </div>
        </div>
    </div>
</div>
</x-layouts.app>