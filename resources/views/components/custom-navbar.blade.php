<div>
    @if (Route::has('login'))
        @auth
            @if (Auth::user()->role == 'admin')
                <a href="{{ url('/admin') }}" class="btn btn-white">Dashboard</a>
            @elseif (Auth::user()->role == 'supervisor')
                <a href="{{ url('/supervisor') }}" class="btn btn-white">Dashboard</a>
            @else
                <div class="nav-item navbar-dropdown dropdown-user dropdown">
                    <!-- Check if the user is authenticated -->
                    @if (Auth::check())
                        <a class="nav-link dropdown-toggle hide-arrow p-0" href="javascript:void(0);"
                            data-bs-toggle="dropdown">
                            <div class="avatar avatar-online">
                                <img src="{{ Auth::user()->profile_photo_url ?? asset('assets/img/avatars/1.png') }}" alt
                                    class="w-px-40 h-auto rounded-circle">
                            </div>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li>
                                <a class="dropdown-item" href="{{ route('settings.profile') }}" wire:navigate>
                                    <div class="d-flex">
                                        <div class="flex-shrink-0 me-3">
                                            <div class="avatar avatar-online">
                                                <img src="{{ Auth::user()->profile_photo_url ?? asset('assets/img/avatars/1.png') }}"
                                                    alt class="w-px-40 h-auto rounded-circle" />
                                            </div>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="mb-0">{{ Auth::user()->name }}</h6>
                                            <small class="text-body-secondary">{{ Auth::user()->role ?? 'User' }}</small>
                                            <!-- Display user role -->
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <div class="dropdown-divider my-1"></div>
                            </li>
                            <li>
                                <a class="dropdown-item {{ request()->routeIs('dashboard') ? 'active' : '' }}"
                                    href="{{ route('dashboard') }}" wire:navigate>
                                    <i class="icon-base bx bx-area icon-md me-3"></i><span>Dashboard</span>
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item {{ request()->routeIs('settings.profile') ? 'active' : '' }}"
                                    href="{{ route('settings.profile') }}" wire:navigate>
                                    <i class="icon-base bx bx-user icon-md me-3"></i><span>My
                                        Profile</span>
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item {{ request()->routeIs('settings.password') ? 'active' : '' }}"
                                    href="{{ route('settings.password') }}" wire:navigate>
                                    <i class="icon-base bx bx-cog icon-md me-3"></i><span>Settings</span>
                                </a>
                            </li>
                            <li>
                                <div class="dropdown-divider my-1"></div>
                            </li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button class="dropdown-item" type="submit" class="btn p-0"><i
                                            class="icon-base bx bx-power-off icon-md me-3"></i><span>Log
                                            Out</span></button>
                                </form>
                            </li>
                        </ul>
                    @else
                        <!-- If the user is not logged in, show the login option -->
                        <a class="nav-link dropdown-toggle hide-arrow p-0" href="javascript:void(0);"
                            data-bs-toggle="dropdown">
                            <div class="avatar avatar-online">
                                <img src="{{ asset('assets/img/avatars/1.png') }}" alt
                                    class="w-px-40 h-auto rounded-circle" />
                            </div>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="{{ route('login') }}">Log In</a>
                            </li>
                        </ul>
                    @endif
                </div>
                <!--/ User -->
            @endif
        @else
            <a href="{{ route('login') }}" class="btn btn-secondary me-2">Log in</a>

            @if (Route::has('register'))
                <a href="{{ route('register') }}" class="btn btn-primary">Register</a>
            @endif
        @endauth
    @endif
</div>
