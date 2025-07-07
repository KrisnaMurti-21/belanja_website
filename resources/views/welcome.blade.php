<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="layout-menu-fixed" data-base-url="{{ url('/') }}"
    data-framework="laravel">
@section('title', __('Welcome'))

<head>
    @include('partials.head')
</head>

<body>
    <header class="header-bg">
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
                                <a class="nav-link active" href="/">Dashboard</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/catalogue">Shop</a>
                            </li>
                        </ul>
                        <div class="d-flex align-items-center gap-3">
                            <x-custom-navbar></x-custom-navbar>
                        </div>
                    </div>
                </div>
            </nav>

            <!-- Banner -->
            <div class="row align-items-center mt-5">
                <div class="col-lg-6">
                    <div class="mb-4">
                        <span class="badge-popular">
                            <img src="assets/icons/crown.svg" alt="Crown" width="22">
                            Most Popular 100th Product in Belanja
                        </span>
                    </div>
                    <div class="mb-4">
                        <h1 class="display-4 fw-bold">Working Faster 10x</h1>
                        <p class="lead text-muted">Dolor si amet lorem super-power features riches than any other
                            platform devices AI integrated.</p>
                    </div>
                    <div class="d-flex gap-3">
                        <a href="{{ route('catalogue') }}" class="btn btn-primary-custom">Browse Product</a>
                    </div>
                </div>
                <div class="col-lg-6 position-relative banner-image">
                    <img src="assets/banners/mba13-m2-digitalmat-gallery-1-202402-Photoroom 2.png" class="img-fluid"
                        alt="Banner">
                    <div class="banner-tag" style="top: 60%;">
                        <div class="banner-tag-icon">
                            <img src="assets/icons/code-circle.svg" alt="Icon" width="24">
                        </div>
                        <p class="fw-semibold mb-0">Bonus Mac OS <br> Capitan Pro</p>
                    </div>
                    <div class="banner-tag" style="right: 0; top: 30%;">
                        <div class="banner-tag-icon mb-2">
                            <img src="assets/icons/star-outline.svg" alt="Icon" width="24">
                        </div>
                        <p class="fw-semibold mb-0 text-center">Include <br> Warranty</p>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <main class="container py-5">
        <!-- Categories -->
        <section class="mb-5">
            <div class="d-flex justify-content-between align-items-center section-header">
                <h2 class="section-title">Browse Products <br> by Categories</h2>
                <a href="catalog.html" class="btn btn-outline-custom">Explore All</a>
            </div>
            <div class="row g-4">
                <div class="col-md-3 col-sm-6">
                    <a href="#" class="text-decoration-none">
                        <div class="card-custom card-category">
                            <div class="d-flex align-items-center gap-3">
                                <div class="category-icon">
                                    <img src="assets/icons/mobile.svg" alt="Icon">
                                </div>
                                <div>
                                    <p class="fw-semibold mb-0">Mobile Design</p>
                                    <small class="text-muted">4,583 products</small>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-3 col-sm-6">
                    <a href="#" class="text-decoration-none">
                        <div class="card-custom card-category">
                            <div class="d-flex align-items-center gap-3">
                                <div class="category-icon">
                                    <img src="assets/icons/game.svg" alt="Icon">
                                </div>
                                <div>
                                    <p class="fw-semibold mb-0">Games Asset</p>
                                    <small class="text-muted">4,583 products</small>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-3 col-sm-6">
                    <a href="#" class="text-decoration-none">
                        <div class="card-custom card-category">
                            <div class="d-flex align-items-center gap-3">
                                <div class="category-icon">
                                    <img src="assets/icons/box.svg" alt="Icon">
                                </div>
                                <div>
                                    <p class="fw-semibold mb-0">Essenstials</p>
                                    <small class="text-muted">4,583 products</small>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-3 col-sm-6">
                    <a href="#" class="text-decoration-none">
                        <div class="card-custom card-category">
                            <div class="d-flex align-items-center gap-3">
                                <div class="category-icon">
                                    <img src="assets/icons/monitor.svg" alt="Icon">
                                </div>
                                <div>
                                    <p class="fw-semibold mb-0">Web Class</p>
                                    <small class="text-muted">4,583 products</small>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </section>

        <!-- New Releases -->
        <section>
            <div class="d-flex justify-content-between align-items-center section-header">
                <h2 class="section-title">New Releases <br> From Official Stores</h2>
                <a href="catalog.html" class="btn btn-outline-custom">Explore All</a>
            </div>
            <div class="row g-4">
                <div class="col-xl-2 col-lg-4 col-md-6">
                    <a href="details.html" class="text-decoration-none">
                        <div class="card-custom card-product">
                            <div class="product-img-container mb-4">
                                <img src="assets/thumbnails/color_back_green__buxxfjccqjzm_large_2x-Photoroom 1.png"
                                    class="img-fluid" alt="Product">
                            </div>
                            <div>
                                <p class="fw-semibold mb-1">iMac Green Energy</p>
                                <p class="product-category mb-2">Desktops</p>
                                <p class="price-tag mb-0">Rp 24.000.000</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-xl-2 col-lg-4 col-md-6">
                    <a href="details.html" class="text-decoration-none">
                        <div class="card-custom card-product">
                            <div class="product-img-container mb-4">
                                <img src="assets/thumbnails/iphone15pro-digitalmat-gallery-3-202309-Photoroom 1.png"
                                    class="img-fluid" alt="Product">
                            </div>
                            <div>
                                <p class="fw-semibold mb-1">Smartwei Pro 18</p>
                                <p class="product-category mb-2">Phones</p>
                                <p class="price-tag mb-0">Rp 11.000.000</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-xl-2 col-lg-4 col-md-6">
                    <a href="details.html" class="text-decoration-none">
                        <div class="card-custom card-product">
                            <div class="product-img-container mb-4">
                                <img src="assets/banners/mba13-m2-digitalmat-gallery-1-202402-Photoroom 2.png"
                                    class="img-fluid" alt="Product">
                            </div>
                            <div>
                                <p class="fw-semibold mb-1">MacBook Pro X</p>
                                <p class="product-category mb-2">Laptops</p>
                                <p class="price-tag mb-0">Rp 24.000.000</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-xl-2 col-lg-4 col-md-6">
                    <a href="details.html" class="text-decoration-none">
                        <div class="card-custom card-product">
                            <div class="product-img-container mb-4">
                                <img src="assets/thumbnails/airpods-max-select-skyblue-202011-Photoroom 1.png"
                                    class="img-fluid" alt="Product">
                            </div>
                            <div>
                                <p class="fw-semibold mb-1">Tuli Nyaman</p>
                                <p class="product-category mb-2">Headsets</p>
                                <p class="price-tag mb-0">Rp 3.500.000.000</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-xl-2 col-lg-4 col-md-6">
                    <a href="details.html" class="text-decoration-none">
                        <div class="card-custom card-product">
                            <div class="product-img-container mb-4">
                                <img src="assets/thumbnails/imac24-digitalmat-gallery-1-202310-Photoroom 1.png"
                                    class="img-fluid" alt="Product">
                            </div>
                            <div>
                                <p class="fw-semibold mb-1">Warna iMac Jadi</p>
                                <p class="product-category mb-2">Desktops</p>
                                <p class="price-tag mb-0">Rp 89.000.000</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-xl-2 col-lg-4 col-md-6">
                    <a href="details.html" class="text-decoration-none">
                        <div class="card-custom card-product">
                            <div class="product-img-container mb-4">
                                <img src="assets/thumbnails/imac24-digitalmat-gallery-1-202310-Photoroom 1.png"
                                    class="img-fluid" alt="Product">
                            </div>
                            <div>
                                <p class="fw-semibold mb-1">Warna iMac Jadi</p>
                                <p class="product-category mb-2">Desktops</p>
                                <p class="price-tag mb-0">Rp 89.000.000</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-xl-2 col-lg-4 col-md-6">
                    <a href="details.html" class="text-decoration-none">
                        <div class="card-custom card-product">
                            <div class="product-img-container mb-4">
                                <img src="assets/thumbnails/airpods-max-select-skyblue-202011-Photoroom 1.png"
                                    class="img-fluid" alt="Product">
                            </div>
                            <div>
                                <p class="fw-semibold mb-1">Tuli Nyaman</p>
                                <p class="product-category mb-2">Headsets</p>
                                <p class="price-tag mb-0">Rp 3.500.000.000</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-xl-2 col-lg-4 col-md-6">
                    <a href="details.html" class="text-decoration-none">
                        <div class="card-custom card-product">
                            <div class="product-img-container mb-4">
                                <img src="assets/thumbnails/color_back_green__buxxfjccqjzm_large_2x-Photoroom 1.png"
                                    class="img-fluid" alt="Product">
                            </div>
                            <div>
                                <p class="fw-semibold mb-1">iMac Green Energy</p>
                                <p class="product-category mb-2">Desktops</p>
                                <p class="price-tag mb-0">Rp 24.000.000</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-xl-2 col-lg-4 col-md-6">
                    <a href="details.html" class="text-decoration-none">
                        <div class="card-custom card-product">
                            <div class="product-img-container mb-4">
                                <img src="assets/thumbnails/iphone15pro-digitalmat-gallery-3-202309-Photoroom 1.png"
                                    class="img-fluid" alt="Product">
                            </div>
                            <div>
                                <p class="fw-semibold mb-1">Smartwei Pro 18</p>
                                <p class="product-category mb-2">Phones</p>
                                <p class="price-tag mb-0">Rp 11.000.000</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-xl-2 col-lg-4 col-md-6">
                    <a href="details.html" class="text-decoration-none">
                        <div class="card-custom card-product">
                            <div class="product-img-container mb-4">
                                <img src="assets/banners/mba13-m2-digitalmat-gallery-1-202402-Photoroom 2.png"
                                    class="img-fluid" alt="Product">
                            </div>
                            <div>
                                <p class="fw-semibold mb-1">MacBook Pro X</p>
                                <p class="product-category mb-2">Laptops</p>
                                <p class="price-tag mb-0">Rp 24.000.000</p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </section>
    </main>

    <!-- Include Scripts -->
    @include('partials.scripts')
    <!-- / Include Scripts -->
</body>

</html>
