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
                                <a class="nav-link {{ request()->is('catalogue/*') ? 'active' : '' }}" href="/catalogue">Shop</a>
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

        <!-- Detail Product -->
        <div class="container py-5 position-relative">
            <div style="margin-top: -20rem">
                <!-- Breadcrumb and Title -->
                <div class="row mb-5">
                    <div class="col-lg-8">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Shop</a></li>
                                <li class="breadcrumb-item"><a href="#">Browse</a></li>
                                <li class="breadcrumb-item active"><a href="#">Details</a></li>
                            </ol>
                        </nav>
                        <h1 class="product-title">{{ $product->name }}</h1>
                    </div>
                    <div class="col-lg-4 d-flex align-items-center justify-content-end">
                        <div class="d-flex align-items-center">
                            <div class="d-flex me-2">
                                <img src="{{ asset('assets/icons/Star.svg') }}" alt="star" class="me-1">
                                <img src="{{ asset('assets/icons/Star.svg') }}" alt="star" class="me-1">
                                <img src="{{ asset('assets/icons/Star.svg') }}" alt="star" class="me-1">
                                <img src="{{ asset('assets/icons/Star.svg') }}" alt="star" class="me-1">
                                <img src="{{ asset('assets/icons/Star-gray.svg') }}" alt="star">
                            </div>
                            <p class="fw-semibold mb-0">(4,389)</p>
                        </div>
                    </div>
                </div>

                <!-- Product Details -->
                <div class="row mt-5">
                    <div class="col-lg-7">
                        <!-- About Product -->
                        <div class="mb-5">
                            <div class="product-image-card">
                                <img src="{{ asset('storage/' . $product->image) }}" alt="thumbnail"
                                    style="max-width: 200px; height: auto;">
                            </div>
                            <h3 class="fw-semibold mb-3">About Product</h3>
                            <p class="lh-lg">
                                {{ $product->description }}
                            </p>
                        </div>


                    </div>

                    <!-- Sidebar -->
                    <div class="col-lg-5 px-5">
                        <div class="shadow p-3 mb-5 bg-white rounded-5">
                            <div class="mb-4">
                                <span class="badge bg-light text-dark mb-2 fs-5">Brand New</span>
                                <p class="price-tag mb-0 fs-4">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                            </div>
                            <div class="mb-4">
                                <div class="feature-item">
                                    <img src="{{ asset('assets/icons/tick-circle.svg') }}" alt="icon">
                                    <p class="fw-semibold mb-0">Manual book instructions</p>
                                </div>
                                <div class="feature-item">
                                    <img src="{{ asset('assets/icons/tick-circle.svg') }}" alt="icon">
                                    <p class="fw-semibold mb-0">Customer service 24/7</p>
                                </div>
                                <div class="feature-item">
                                    <img src="{{ asset('assets/icons/tick-circle.svg') }}" alt="icon">
                                    <p class="fw-semibold mb-0">Kwitansi orisinal 100%</p>
                                </div>
                            </div>

                            <div class="d-grid gap-3">
                                <a href="{{ route('checkout', $product->id) }}"
                                    class="btn btn-primary-custom">Buy</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Detail Product -->


    </div>
    <!-- Include Scripts -->
    @include('partials.scripts')
    <!-- / Include Scripts -->
</body>

</html>
