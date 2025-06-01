<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'AI Racing Garage')</title>

    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Bootstrap Icons CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Google Font Orbitron -->
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@500;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Orbitron', sans-serif;
            background-color: #1f1f1f;
            color: #fff;
        }
        .navbar {
            background-color: #121212;
        }
        .navbar-brand {
            color: #ff4c4c;
            font-weight: bold;
            font-size: 1.5rem;
        }
        .navbar-brand:hover {
            color: #fff;
        }
        .nav-link {
            color: #ccc !important;
        }
        .nav-link:hover {
            color: #fff !important;
        }
        footer {
            background-color: #111;
            color: #aaa;
            padding: 20px 0;
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg shadow">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                <i class="bi bi-lightning-fill"></i> AI Garage
            </a>
            <button class="navbar-toggler bg-danger" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar">
                <span class="navbar-toggler-icon text-light"></span>
            </button>

            <div class="collapse navbar-collapse" id="mainNavbar">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link" href="{{ url('/') }}">Beranda</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('services.index') }}">Layanan</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('booking.index') }}">Booking</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('about.index') }}">Tentang Kami</a></li>
                </ul>

                <!-- Search -->
                <form action="{{ route('services.search') }}" method="GET" class="d-flex">
                    <input class="form-control me-2 bg-dark text-light border-secondary" type="search" name="q" placeholder="Cari layanan..." aria-label="Search">
                    <button class="btn btn-outline-primary" type="submit"><i class="bi bi-search"></i></button>
                </form>
            </div>
        </div>
    </nav>

    <!-- Content -->
    <main class="container my-5">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="text-center mt-5">
        <div class="container">
            <p>&copy; {{ date('Y') }} AI Racing Garage - Bengkel Motor Balap Terpercaya</p>
            <p>
                <i class="bi bi-geo-alt-fill"></i> Jl. Speedway No. 99, Kota Racing |
                <i class="bi bi-phone-fill"></i> 0812-3456-7890
            </p>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
