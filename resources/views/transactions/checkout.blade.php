<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="layout-menu-fixed" data-base-url="{{ url('/') }}"
    data-framework="laravel">
@section('title', __('Welcome'))

<head>
    @include('partials.head')
</head>

<body>
    <header class="header-bg mb-12" style="padding-bottom: 5rem">
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
                                <a class="nav-link {{ request()->is('/') ? 'active' : '' }}"
                                    href="/">Dashboard</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ request()->is('catalogue/*') ? 'active' : '' }}"
                                    href="/catalogue">Shop</a>
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
            <div style="margin-top: -7rem">
                <!-- Breadcrumb and Title -->
                <div class="row mb-5">
                    <div class="col-12">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('catalogue') }}">Shop</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('catalogue') }}">Browse</a></li>
                                <li class="breadcrumb-item active"><a>Details</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>

                <!-- Checkout Form -->
                <div class="row">
                    <!-- Shipping Address -->
                    <div class="col-lg-7 mb-4 mb-lg-0">
                        <h2 class="fw-bold mb-4">Order Details</h2>

                        <div>
                            <div class="mb-4">
                                <div class="cart-item d-flex justify-content-between align-items-center flex-wrap">
                                    <div class="d-flex align-items-center gap-4 product-info">
                                        <div class="product-img-container">
                                            <img src="{{ asset('assets/thumbnails/iphone15pro-digitalmat-gallery-3.png') }}"
                                                alt="iPhone Sawedia Pro">
                                        </div>
                                        <div>
                                            <p class="fw-semibold mb-1">{{ Str::limit($product->name, 40, '...') }}</p>
                                        </div>
                                    </div>

                                    <div>
                                        <p class="text-muted mb-1 small">Price</p>
                                        <p class="price-tag mb-0">Rp {{ number_format($product->price, 0, ',', '.') }}
                                        </p>
                                    </div>

                                    <a href="{{ route('catalogue.detail', $product->id) }}">
                                        <button class="btn btn-outline-custom">Cancel</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Payment Details -->
                    <div class="col-lg-5">
                        <h2 class="fw-bold mb-4">Payment Details</h2>

                        <div class="payment-box">
                            <div class="payment-feature">
                                <div class="d-flex align-items-center gap-3">
                                    <div class="payment-feature-icon">
                                        <img src="{{ asset('assets/icons/cake.svg') }}" alt="Original" width="24">
                                    </div>
                                    <div>
                                        <p class="fw-semibold mb-0">100% It's Original</p>
                                        <p class="text-muted mb-0 small">We don't sell fake products</p>
                                    </div>
                                </div>
                                <img src="{{ asset('assets/icons/arrow-right.svg') }}" alt="Arrow" width="24">
                            </div>

                            <div class="mb-4">
                                <div class="payment-detail">
                                    <div class="d-flex align-items-center gap-2">
                                        <img src="{{ asset('assets/icons/tick-circle.svg') }}" alt="Tick"
                                            width="20">
                                        <span>Your balance</span>
                                    </div>
                                    <span class="fw-semibold">Rp {{ number_format($userAmount, 0, ',', '.') }}</span>
                                </div>

                                <div class="payment-detail">
                                    <div class="d-flex align-items-center gap-2">
                                        <img src="{{ asset('assets/icons/tick-circle.svg') }}" alt="Tick"
                                            width="20">
                                        <span>Warranty Original</span>
                                    </div>
                                    <span class="fw-semibold">Rp 0</span>
                                </div>

                                <div class="payment-detail">
                                    <div class="d-flex align-items-center gap-2">
                                        <img src="{{ asset('assets/icons/tick-circle.svg') }}" alt="Tick"
                                            width="20">
                                        <span>PPN 11%</span>
                                    </div>
                                    <span class="fw-semibold">Rp
                                        {{ number_format($product->price * 0.11, 0, ',', '.') }}</span>
                                </div>
                            </div>

                            <div class="payment-total">
                                <span class="fw-semibold">Total</span>
                                <span class="grand-total">Rp
                                    {{ number_format($product->price * 0.11 + $product->price, 0, ',', '.') }}</span>
                            </div>

                            <form action="{{ route('transaction.store') }}" method="POST">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <input type="hidden" name="price" value="{{ $product->price }}">
                                <input type="hidden" name="ppn" value="{{ $product->price * 0.11 }}">
                                <input type="hidden" name="total_price" value="{{ $product->price * 1.11 }}">

                                <div class="d-grid gap-3 mt-4">
                                    @if ($userAmount >= $product->price * 1.11)
                                        <a href="{{ route('transaction.store') }}">
                                            <button type="submit" class="btn btn-primary-custom">Checkout
                                                Now</button>
                                        </a>
                                    @else
                                        <span class="text-danger fw-bold text-center">Saldo tidak cukup untuk melakukan
                                            pembelian.</span>
                                        <a href="{{ route('topup') }}" class="btn btn-outline-custom">Topup Now</a>
                                    @endif
                                </div>
                            </form>
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
