<nav class="navbar navbar-expand-lg navbar-dark bg-black border-bottom border-danger shadow-sm">
    <div class="container">
        <a class="navbar-brand fw-bold text-light" href="{{ route('home') }}">
            <i class="bi bi-speedometer2 me-2 text-danger"></i>AI Garage
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
    
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto text-uppercase">
                <li class="nav-item">
                    <a class="nav-link text-light" href="{{ route('home') }}">
                        <i class="bi bi-house-door-fill me-1 text-primary"></i>Beranda
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" href="{{ route('services.index') }}">
                        <i class="bi bi-tools me-1 text-primary"></i>Layanan
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" href="{{ route('booking.index') }}">
                        <i class="bi bi-calendar-check-fill me-1 text-primary"></i>Booking
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" href="{{ route('about.index') }}">
                        <i class="bi bi-info-circle-fill me-1 text-primary"></i>Tentang
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" href="{{ route('contact.index') }}">
                        <i class="bi bi-telephone-fill me-1 text-primary"></i>Kontak
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
