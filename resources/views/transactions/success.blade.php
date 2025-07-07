<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="layout-menu-fixed" data-base-url="{{ url('/') }}"
    data-framework="laravel">
@section('title', __('Welcome'))

<head>
    @include('partials.head')
</head>

<body>
    <header>
        <div class="container">
    </header>
    <div class="my-10">
        <!-- Main Content -->
        <main class="text-center py-10 ">
            <div class="success-icon rounded-circle">
                <i class="bx bx-check text-white fs-1"></i>
            </div>
            <h2 class="h3 mb-2 fw-semibold">Thank you for your purchase</h2>
            <p class="mb-4">Your order number is {{ $purchase->transaction_code }}</p>

            <!-- Order Summary -->
            <section class="order-summary">
                <h3 class="h5 fw-semibold mb-3">Order Summary</h3>

                <!-- Product -->
                <div class="d-flex align-items-center mb-3">
                    <img src="{{ asset('storage/' . $purchase->product->image) }}"
                        alt="Blue half sleeve 100% cotton shirt for women on a white background"
                        class="product-image me-3">
                    <div class="flex-grow-1">
                        <p class="mb-0 small">{{ Str::limit($purchase->product->name, 40, '...') }}</p>
                    </div>
                    <div class="fw-semibold small">Rp. {{ number_format($purchase->product->price, 0, ',', '.') }}
                    </div>
                </div>

                <hr class="my-3">

                <hr class="my-3">

                <!-- Total -->
                <div class="d-flex justify-content-between fw-bold small">
                    <span>Total</span>
                    <span>Rp. {{ number_format($purchase->amount, 0, ',', '.') }}</span>
                </div>
            </section>

            <a href="{{ route('home') }}">

                <button class="btn btn-outline-dark mt-4 px-4 py-2 rounded-1">Back to Home</button>
            </a>
        </main>
    </div>
    <!-- Include Scripts -->
    @include('partials.scripts')
    <!-- / Include Scripts -->
</body>

</html>
