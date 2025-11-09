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
    </style>

    @stack('styles')
</head>

<body>

    <nav class="navbar navbar-expand-lg position-absolute top-0 start-0 end-0"
        style="font-family: 'Palanquin', sans-serif; z-index: 1030;">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center gap-2" href="{{ url('/') }}">
                <img src="{{ asset('images/seal-infinite.png') }}" alt="Seal Infinite" height="90" ">
            </a>

            <button class="navbar-toggler text-bg-light" type="button" data-bs-toggle="collapse"
                data-bs-target="#topNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div id="topNav" class="collapse navbar-collapse">
                <ul class="navbar-nav ms-auto align-items-lg-center gap-lg-2">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/download') }}"><i class="bi bi-download me-1"></i> Download Seal Online</a>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('/shop') }}"><i class="bi bi-bag me-1"></i> Shop</a></li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown"><i
                                class="bi bi-trophy me-1"></i> Rank</a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="#">Top Player</a></li>
                            <li><a class="dropdown-item" href="#">Guild Rank</a></li>
                        </ul>
                    </li>

                    <li class="nav-item"><a class="nav-link" href="{{ url('/donate') }}"><i class="bi bi-heart-fill me-1"></i>
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

                    <li class="nav-item d-none d-lg-block">
                        <span class="nav-link"><i class="bi bi-gift"></i></span>
                    </li>

                    <li class="nav-item ms-lg-2">
                        <a href="{{ url('/login') }}"" class="btn btn-light btn-pill fw-semibold">
                <i class="bi bi-box-arrow-in-right me-1"></i> Login/Register
            </a>
            </li>
            </ul>
        </div>
        </div>
    </nav>

    <main class="">
        @yield('content')
    </main>

    <footer class=" px-5 bg-white">
        <div class="d-flex justify-content-between align-items-center mx-auto">
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
