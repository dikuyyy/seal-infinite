<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Seal Infinite')</title>

    <!-- Bootstrap & Icons (CDN) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Palanquin:wght@100;200;300;400;500;600;700&family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap"
        rel="stylesheet">

    <style>
        html,
        body {
            font-family: 'Inter', sans-serif;
            scroll-behavior: smooth;
            background: #0a0f1a;
        }

        .nav-glass {
            background: rgba(10, 15, 26, .55);
            box-shadow: 0 6px 24px rgba(0, 0, 0, .25);
            backdrop-filter: blur(8px);
            -webkit-backdrop-filter: blur(8px);
        }

        .nav-link,
        .navbar-brand {
            color: #e8eefc !important;
        }

        .nav-link:hover {
            color: #ffd86b !important;
        }

        .btn-pill {
            border-radius: 50rem;
            padding: .55rem 1rem;
            font-weight: 600;
        }

        footer {
            background: #0b1220;
            color: #9fb0d0;
        }

        /* Drawer Styles */
        .offcanvas {
            background: linear-gradient(135deg, #0a0f1a 0%, #1a1f3a 100%);
            width: 300px !important;
        }

        .offcanvas-header {
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .offcanvas-title {
            color: #e8eefc;
            font-weight: 600;
        }

        .offcanvas .btn-close {
            filter: invert(1);
        }

        .offcanvas .nav-link {
            color: #e8eefc !important;
            padding: 0.75rem 1rem;
            border-radius: 0.5rem;
            margin-bottom: 0.5rem;
            transition: all 0.3s ease;
        }

        .offcanvas .nav-link:hover {
            background: rgba(255, 216, 107, 0.1);
            color: #ffd86b !important;
            transform: translateX(5px);
        }

        .offcanvas .dropdown-menu {
            background: rgba(26, 31, 58, 0.95);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .offcanvas .dropdown-item {
            color: #e8eefc;
            padding: 0.5rem 1rem;
        }

        .offcanvas .dropdown-item:hover {
            background: rgba(255, 216, 107, 0.1);
            color: #ffd86b;
        }

        /* Account Dropdown Styles */
        .account-dropdown {
            border-radius: 1rem !important;
            overflow: hidden;
            animation: dropdownSlide 0.3s ease-out;
            margin-top: 0.5rem !important;
        }

        @keyframes dropdownSlide {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .account-dropdown .dropdown-header {
            border-radius: 1rem 1rem 0 0;
        }

        .account-dropdown .info-item {
            transition: transform 0.2s ease;
        }

        .account-dropdown .info-item:hover {
            transform: translateX(3px);
        }

        .account-dropdown .btn {
            transition: all 0.3s ease;
            font-weight: 600;
        }

        .account-dropdown .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        }

        .account-dropdown .btn-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
        }

        .account-dropdown .btn-outline-danger:hover {
            background: #dc3545;
            color: white;
        }

        .text-purple {
            color: #764ba2;
        }

        .title {
            font-family: 'Orbitron', sans-serif;
            font-size: 4.5rem;
            font-weight: 900;
            color: #fff;
            margin-bottom: 2rem;
            letter-spacing: 4px;
            text-shadow:
                0 0 20px rgba(100, 150, 255, 0.8),
                0 0 40px rgba(50, 100, 200, 0.6),
                2px 2px 4px rgba(0, 0, 0, 0.8);
        }

        /* Responsive adjustments */
        @media (max-width: 575.98px) {
            .account-dropdown {
                min-width: 280px !important;
                margin-right: 1rem;
            }
        }

        /* Responsive navbar */
        @media (max-width: 991.98px) {
            .navbar-toggler {
                border: none;
                padding: 0.5rem;
            }

            .navbar-brand img {
                height: 60px;
            }
        }

        /* Footer responsive */
        @media (max-width: 767.98px) {
            footer .d-flex {
                flex-direction: column;
                text-align: center;
                gap: 1rem;
            }

            footer img {
                height: 80px !important;
            }
        }

        .hero {
            position: relative;
            min-height: 120vh;
            color: #eef3ff;
            background: url("/images/background/hero-1.jpg") center/cover no-repeat;
            z-index: 66;
            padding-bottom: 20rem;
        }



        .hero::before {
            content: "";
            position: absolute;
            inset: 0;
            background: radial-gradient(1200px 600px at 25% 40%,
                    rgba(36, 79, 170, 0.18),
                    transparent 60%),
                linear-gradient(180deg,
                    rgba(0, 0, 0, 0.65) 0%,
                    rgba(7, 11, 22, 0.18) 25%,
                    rgba(7, 11, 22, 0.12) 50%,
                    rgba(7, 11, 22, 0.22) 75%,
                    rgba(0, 0, 0, 0.7) 100%);
            pointer-events: none;
        }

        @media (max-width: 1200px) {
            .title {
                font-size: 3.5rem;
            }
        }

        @media(max-width: 768px) {
            .title {
                font-size: 2.5rem;
                margin-bottom: 1.5rem;
                letter-spacing: 2px;
            }
        }

        @media (max-width: 991.98px) {
            .hero {
                min-height: auto;
                padding-bottom: 8rem;
            }
        }

        @media (max-width: 575.98px) {
            .hero {
                padding-bottom: 6rem;
            }

            .title {
                font-size: 2rem;
                letter-spacing: 1px;
            }
        }
    </style>

    @stack('styles')
</head>

<body>

    <nav class="navbar navbar-expand-lg position-absolute top-0 start-0 end-0"
        style="font-family: 'Palanquin', sans-serif; z-index: 1030;">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center gap-2" href="{{ url('/') }}">
                <img src="{{ asset('images/seal-infinite.png') }}" alt="Seal Infinite" height="90">
            </a>

            <button class="navbar-toggler text-bg-light" type="button" data-bs-toggle="offcanvas"
                data-bs-target="#mobileDrawer" aria-controls="mobileDrawer">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Desktop Menu -->
            <div class="collapse navbar-collapse d-none d-lg-block">
                <ul class="navbar-nav ms-auto align-items-lg-center gap-lg-2">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/download') }}"><i class="bi bi-download me-1"></i> Download
                            Seal Online</a>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('/shop') }}"><i class="bi bi-bag me-1"></i>
                            Shop</a></li>

                    <li class="nav-item dropdown">
                        <a class="nav-link" href="{{ url('/rankings') }}"><i class="bi bi-trophy me-1"></i> Rank</a>
                    </li>

                    <li class="nav-item"><a class="nav-link" href="{{ url('/donate') }}"><i
                                class="bi bi-heart-fill me-1"></i>
                            Donation</a></li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                            <i class="bi bi-info-circle me-1"></i> Game Info
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="#">Guide</a></li>
                            <li><a class="dropdown-item" href="#">Patch Notes</a></li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <span class="nav-link"><i class="bi bi-gift"></i></span>
                    </li>

                    <li class="nav-item ms-lg-2 dropdown">
                        {{-- state button ketika user login/logout --}}
                        {{-- @auth --}}
                        <a href="#" class="btn btn-light btn-pill fw-semibold dropdown-toggle"
                            data-bs-toggle="dropdown" aria-expanded="false" id="userDropdown">
                            <i class="bi bi-person-circle me-1"></i> {{ Auth::user()->name ?? 'gm02' }}
                        </a>
                        <div class="dropdown-menu dropdown-menu-end account-dropdown shadow-lg border-0 p-0"
                            style="min-width: 320px;">
                            <!-- Header -->
                            <div class="dropdown-header bg-gradient p-3"
                                style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
                                <div class="d-flex align-items-center">
                                    <div class="avatar-circle me-3">
                                        <i class="bi bi-person-circle text-black" style="font-size: 2.5rem;"></i>
                                    </div>
                                    <div class="text-black">
                                        <h6 class="mb-0 fw-bold">{{ Auth::user()->name ?? 'gm02' }}</h6>
                                        <small
                                            class="opacity-75">{{ Auth::user()->email ?? 'admin@sealinfinite.com' }}</small>
                                    </div>
                                </div>
                            </div>

                            <!-- Account Info Section -->
                            <div class="p-3">
                                <div class="text-muted small fw-semibold mb-2 text-uppercase">
                                    <i class="bi bi-info-circle me-1"></i> Account Info
                                </div>

                                <div class="info-grid">
                                    <div class="info-item">
                                        <div class="d-flex justify-content-between align-items-center mb-2 p-2 rounded"
                                            style="background: #f8f9fa;">
                                            <span class="text-muted small">Status</span>
                                            <span class="badge bg-success rounded-pill px-3">Active</span>
                                        </div>
                                    </div>

                                    <div class="info-item">
                                        <div class="d-flex justify-content-between align-items-center mb-2 p-2 rounded"
                                            style="background: #fff8e1;">
                                            <span class="text-muted small d-flex align-items-center">
                                                <i class="bi bi-coin text-warning me-1"></i> Cash Coin
                                            </span>
                                            <span class="fw-bold text-dark">1,250</span>
                                        </div>
                                    </div>

                                    <div class="info-item">
                                        <div class="d-flex justify-content-between align-items-center mb-2 p-2 rounded"
                                            style="background: #e3f2fd;">
                                            <span class="text-muted small d-flex align-items-center">
                                                <i class="bi bi-stars text-primary me-1"></i> AFK Point
                                            </span>
                                            <span class="fw-bold text-dark">450</span>
                                        </div>
                                    </div>

                                    <div class="info-item">
                                        <div class="d-flex justify-content-between align-items-center mb-2 p-2 rounded"
                                            style="background: #f3e5f5;">
                                            <span class="text-muted small d-flex align-items-center">
                                                <i class="bi bi-clock-history text-purple me-1"></i> Last Login
                                            </span>
                                            <span
                                                class="fw-semibold text-dark small">{{ now()->format('d M, H:i') }}</span>
                                        </div>
                                    </div>

                                    <div class="info-item">
                                        <div class="d-flex justify-content-between align-items-center mb-2 p-2 rounded"
                                            style="background: #e8f5e9;">
                                            <span class="text-muted small d-flex align-items-center">
                                                <i class="bi bi-graph-up text-success me-1"></i> Total Login
                                            </span>
                                            <span class="fw-bold text-dark">127x</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <hr class="my-0">

                            <!-- Action Buttons -->
                            <div class="p-3">
                                <a href="{{ url('/account-manager') }}"
                                    class="btn btn-primary w-100 mb-2 d-flex align-items-center justify-content-center rounded-pill">
                                    <i class="bi bi-gear me-2"></i> Manage Account
                                </a>
                                <form action="{{ url('/logout') }}" method="POST" class="d-inline w-100">
                                    @csrf
                                    <button type="submit"
                                        class="btn btn-outline-danger w-100 d-flex align-items-center justify-content-center rounded-pill">
                                        <i class="bi bi-box-arrow-right me-2"></i> Logout
                                    </button>
                                </form>
                            </div>
                        </div>
                        {{-- @else
                            <a href="{{ url('/login') }}" class="btn btn-light btn-pill fw-semibold">
                                <i class="bi bi-box-arrow-in-right me-1"></i> Login/Register
                            </a>
                        @endauth --}}
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Mobile Drawer -->
    <div class="offcanvas offcanvas-end" tabindex="-1" id="mobileDrawer" aria-labelledby="mobileDrawerLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="mobileDrawerLabel">
                <i class="bi bi-list me-2"></i>Menu
            </h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/download') }}">
                        <i class="bi bi-download me-2"></i> Download Seal Online
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/shop') }}">
                        <i class="bi bi-bag me-2"></i> Shop
                    </a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link" href="{{ url('/rankings') }}">
                        <i class="bi bi-trophy me-2"></i> Rank
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/donate') }}">
                        <i class="bi bi-heart-fill me-2"></i> Donation
                    </a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                        <i class="bi bi-info-circle me-2"></i> Game Info
                    </a>
                    <ul class="dropdown-menu w-100">
                        <li><a class="dropdown-item" href="#">Guide</a></li>
                        <li><a class="dropdown-item" href="#">Patch Notes</a></li>
                    </ul>
                </li>

                <li class="nav-item mt-3">
                    {{-- state button ketika user login/logout --}}
                    {{-- @auth
                        <a href="{{ url('/profile') }}" class="btn btn-light w-100 btn-pill fw-semibold">
                            <i class="bi bi-person-circle me-2"></i> {{ Auth::user()->name }}
                        </a>
                    @else
                        <a href="{{ url('/login') }}" class="btn btn-light w-100 btn-pill fw-semibold">
                            <i class="bi bi-box-arrow-in-right me-2"></i> Login/Register
                        </a>
                    @endauth --}}
                    <a href="{{ url('/profile') }}" class="btn btn-light w-100 btn-pill fw-semibold">
                        <i class="bi bi-person-circle me-2"></i> gm02
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <section class="hero">
        <div class="container" style="padding-top: 10rem">
            @sectionMissing('hide-title')
                <div class="title">
                    @yield('title', 'Seal Infinite')
                </div>
            @endif
            @yield('content')
        </div>
    </section>

    <footer class="px-5 bg-white">
        <div class="d-flex justify-content-between align-items-center mx-auto py-3">
            <div class="text-dark" style="font-family: sans-serif">
                © {{ date('Y') }} Seal Infinite. All rights reserved.
            </div>
            <div>
                <img src="{{ asset('images/seal-infinite.png') }}" alt="Seal Infinite" style="height: 100px;">
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>

</html>
