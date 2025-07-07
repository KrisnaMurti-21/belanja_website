<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="layout-menu-fixed" data-base-url="{{ url('/') }}"
    data-framework="laravel">
@section('title', __('Welcome'))

<head>
    @include('partials.head')
</head>

<body>
    <header class="header-bg mb-12" style="padding-bottom: 20rem">
        <div class="container">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-custom">
                <div class="container-fluid">
                    <a class="navbar-brand" href="/">
                        <img src="{{ asset('assets/logos/logo.svg') }}" alt="Logo" height="40">
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="/">Dashboard</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ request()->is('catalogue') ? 'active' : '' }}" href="/catalogue">Shop</a>
                            </li>
                        </ul>
                        <div class="d-flex align-items-center gap-3">
                            <x-custom-navbar></x-custom-navbar>
                        </div>
                    </div>
                </div>
            </nav>
    </header>
    <div class="bg-white">

        <!-- Catalogue Product -->
        <div class="container py-5 position-relative">
            <div style="margin-top: -20rem">
                <!-- Breadcrumb and Title -->
                <div class="row mb-5">
                    <div class="col-lg-8">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Shop</a></li>
                                <li class="breadcrumb-item"><a href="#">Browse</a></li>
                                <li class="breadcrumb-item active"><a href="#">Catalog</a></li>
                            </ol>
                        </nav>
                        <h1 class="page-title">Our Product Catalog</h1>
                    </div>
                    <div class="col-lg-4">
                        <form class="input-group-custom">
                            <div class="d-flex align-items-center gap-3 w-100">
                                <img src="assets/icons/search-normal.svg" alt="Search" width="20">
                                <input type="text" class="form-control border-0 p-0"
                                    placeholder="Search product by name, brand, category">
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Catalog Content -->
                <div class="row">
                    <!-- Filters Panel -->
                    <div class="col-lg-3">
                        <div class="filter-panel">
                            <h2 class="section-title mb-4">Filters</h2>

                            <!-- Price Range -->
                            <div class="filter-section">
                                <h3 class="filter-title">Range Harga</h3>
                                <div class="input-group-custom mb-3">
                                    <div class="d-flex align-items-center gap-3">
                                        <img src="assets/icons/dollar-circle.svg" alt="Min Price" width="20">
                                        <input type="number" class="form-control border-0 p-0"
                                            placeholder="Minimum price">
                                    </div>
                                </div>
                                <div class="input-group-custom">
                                    <div class="d-flex align-items-center gap-3">
                                        <img src="assets/icons/dollar-circle.svg" alt="Max Price" width="20">
                                        <input type="number" class="form-control border-0 p-0"
                                            placeholder="Maximum price">
                                    </div>
                                </div>
                            </div>

                            <hr class="border-gray-300 my-4">

                            <!-- Stocks -->
                            <div class="filter-section">
                                <h3 class="filter-title">Stocks</h3>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="stock" id="preOrder">
                                    <label class="form-check-label" for="preOrder">Pre Order</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="stock" id="readyStock">
                                    <label class="form-check-label" for="readyStock">Ready Stock</label>
                                </div>
                            </div>

                            <hr class="border-gray-300 my-4">

                            <!-- Brands -->
                            <div class="filter-section">
                                <h3 class="filter-title">Brands</h3>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="brand" id="apple">
                                    <label class="form-check-label" for="apple">Apple</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="brand" id="samsung">
                                    <label class="form-check-label" for="samsung">Samsung</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="brand" id="huawei">
                                    <label class="form-check-label" for="huawei">Huawei</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="brand" id="nokia">
                                    <label class="form-check-label" for="nokia">Nokia</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="brand" id="microsoft">
                                    <label class="form-check-label" for="microsoft">Microsoft</label>
                                </div>
                            </div>

                            <hr class="border-gray-300 my-4">

                            <!-- Location -->
                            <div class="filter-section">
                                <h3 class="filter-title">Location</h3>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="loc" id="bandung">
                                    <label class="form-check-label" for="bandung">Bandung</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="loc" id="jakarta">
                                    <label class="form-check-label" for="jakarta">Jakarta</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="loc" id="shanghai">
                                    <label class="form-check-label" for="shanghai">Shanghai</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="loc" id="beijing">
                                    <label class="form-check-label" for="beijing">Beijing</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Products Panel -->
                    <div class="col-lg-8">
                        <div class="products-panel">
                            <h2 class="section-title mb-4">Products</h2>
                            <div class="row g-4">
                                @if (count($products) > 0)
                                    @foreach ($products as $product)
                                        <!-- Product -->
                                        <div class="col-md-6 col-lg-4">
                                            <a href="{{ route('catalogue.detail', $product->id) }}"
                                                class="text-decoration-none">
                                                <div class="card-custom card-product">
                                                    <div class="product-img-container mb-4">
                                                        <img src="{{ asset('storage/' . $product->image) }}"
                                                            class="img-fluid" alt="{{ $product->name }}">
                                                    </div>
                                                    <div>
                                                        <p class="fw-semibold mb-1"></p>
                                                        <p class="product-category mb-2">{{ $product->name }}</p>
                                                        <p class="price-tag mb-0">Rp {{ $product->price }}</p>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <!-- End Product -->
                                    @endforeach
                                @else
                                    <p>No products found.</p>
                                @endif


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Catalogue Product -->
    </div>
    <!-- Include Scripts -->
    @include('partials.scripts')
    <!-- / Include Scripts -->
</body>

</html>
