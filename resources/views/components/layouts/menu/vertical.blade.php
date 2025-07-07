<!-- Menu -->
<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="{{ url('/') }}" class="app-brand-link"><x-app-logo /></a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Dashboards -->
        <li class="menu-item {{ request()->is('dashboard') ? 'active' : '' }}">
            <a class="menu-link" href="{{ route('dashboard') }}" wire:navigate>{{ __('Dashboard') }}</a>
        </li>

        @if (Auth::user()->role == 'admin')
            <!-- Products -->
            <li class="menu-item {{ request()->is('products') ? 'active' : '' }}">
                <a href="{{ route('products.index') }}" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-shopping-bag"></i>
                    <div class="text-truncate">{{ __('Product') }}</div>
                </a>
            </li>
            <li class="menu-item {{ request()->is('historytrx') ? 'active' : '' }}">
                <a href="{{ route('trx.history') }}" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-wallet"></i>
                    <div class="text-truncate">{{ __('Riwayat Transaksi') }}</div>
                </a>
            </li>
            <li class="menu-item {{ request()->is('historyproduct') ? 'active' : '' }}">
                <a href="{{ route('trx.product') }}" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-package"></i>
                    <div class="text-truncate">{{ __('History Product') }}</div>
                </a>
            </li>
        @endif

        @if (Auth::user()->role == 'supervisor')
            <li class="menu-item {{ request()->is('historytrx') ? 'active' : '' }}">
                <a href="{{ route('trx.history') }}" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-wallet"></i>
                    <div class="text-truncate">{{ __('Riwayat Transaksi') }}</div>
                </a>
            </li>
            <li class="menu-item {{ request()->is('historyproduct') ? 'active' : '' }}">
                <a href="{{ route('trx.product') }}" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-package"></i>
                    <div class="text-truncate">{{ __('History Product') }}</div>
                </a>
            </li>
        @endif
        @if (Auth::user()->role == 'user')
            <!-- Wallet -->
            <li class="menu-item {{ request()->is('topup/*') ? 'active open' : '' }}">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons bx bx-wallet"></i>
                    <div class="text-truncate">{{ __('Wallet') }}</div>
                </a>
                <ul class="menu-sub">
                    <li class="menu-item {{ request()->routeIs('settings.profile') ? 'active' : '' }}">
                        <a class="menu-link" href="{{ route('topup') }}" wire:navigate>{{ __('Topup') }}</a>
                    </li>
                </ul>
                <ul class="menu-sub">
                    <li class="menu-item {{ request()->routeIs('historytrx') ? 'active' : '' }}">
                        <a class="menu-link" href="{{ route('trx.history') }}"
                            wire:navigate>{{ __('Riwayat Topup') }}</a>
                    </li>
                </ul>
            </li>
            <li class="menu-item {{ request()->is('historyproduct') ? 'active' : '' }}">
                <a href="{{ route('trx.product') }}" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-package"></i>
                    <div class="text-truncate">{{ __('History Product') }}</div>
                </a>
            </li>
        @endif
        <!-- Settings -->
        <li class="menu-item {{ request()->is('settings/*') ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-cog"></i>
                <div class="text-truncate">{{ __('Settings') }}</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ request()->routeIs('settings.profile') ? 'active' : '' }}">
                    <a class="menu-link" href="{{ route('settings.profile') }}" wire:navigate>{{ __('Profile') }}</a>
                </li>
                <li class="menu-item {{ request()->routeIs('settings.password') ? 'active' : '' }}">
                    <a class="menu-link" href="{{ route('settings.password') }}"
                        wire:navigate>{{ __('Password') }}</a>
                </li>
            </ul>
        </li>

    </ul>
</aside>
<!-- / Menu -->

<script>
    // Toggle the 'open' class when the menu-toggle is clicked
    document.querySelectorAll('.menu-toggle').forEach(function(menuToggle) {
        menuToggle.addEventListener('click', function() {
            const menuItem = menuToggle.closest('.menu-item');
            // Toggle the 'open' class on the clicked menu-item
            menuItem.classList.toggle('open');
        });
    });
</script>
