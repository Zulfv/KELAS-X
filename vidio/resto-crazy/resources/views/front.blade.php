<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>resto CRAYZ</title>
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
</head>
<body>
    <div class="container">
        <nav class="navbar navbar-expand-lg bg-body-tertiary mt-2">
            <div class="container-fluid">
                <a href="/"><img style="width: 100px" src="{{ asset('gambar/logo.png') }}" alt=""></a>
                <ul class="navbar-nav gap-5">
                    @if (session()->has('cart'))
                        <li class="nav-item"><a href="{{ url('cart') }}">Cart ({{ count(session('cart')) }})</a></li>
                    @else
                        <li class="nav-item">Cart</li>
                    @endif

                    @if (session()->missing('idpelanggan'))
                        <li class="nav-item"><a href="{{ url('register') }}">Register</a></li>
                        <li class="nav-item"><a href="{{ url('login') }}">Login</a></li>
                    @else
                        <li class="nav-item">{{ session('idpelanggan')['email'] }}</li>
                        <li class="nav-item"><a href="{{ url('logout') }}">Logout</a></li>
                    @endif
                </ul>
            </div>
        </nav>

        <div class="row mt-3">
            <div class="col-2">
                <ul class="list-group">
                    @foreach ($kategoris as $kategori)
                        <li class="list-group-item">
                            <a href="{{ url('show/'.$kategori->idkategori) }}">{{ $kategori->kategori }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="col-10">
                @yield('content')
            </div>
        </div>

        <div class="bg-light mt-5">
            <p class="text-center">@RESTO-CRAYZ</p>
        </div>
    </div>

    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
