@extends('layouts.app')

@section('title', 'Tentang Kami')

@section('content')
    <div class="bg-dark text-light p-4 rounded shadow">
        <h2 class="text-danger text-center mb-4">
            <i class="bi bi-info-circle-fill"></i> Tentang Kami
        </h2>
        <p class="fs-5">
            <strong class="text-primary">AI Racing Garage</strong> adalah bengkel motor balap yang fokus pada peningkatan performa dan tampilan motor Anda.
            Kami berpengalaman dalam tuning mesin, sistem pengereman, hingga custom tampilan racing style.
        </p>
        <p class="fs-5">
            Dipercaya oleh komunitas balap lokal, kami selalu mengutamakan kecepatan, ketepatan, dan kualitas terbaik.
        </p>
        <div class="text-center mt-4">
            <img src="https://www.freeiconspng.com/thumbs/motorcycle-png/speed-racing-motorcycle-png-28.png" class="img-fluid" style="max-height: 200px;" alt="motor">
        </div>
    </div>
@endsection
