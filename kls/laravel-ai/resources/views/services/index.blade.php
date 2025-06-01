@extends('layouts.app')

@section('title', 'Layanan')

@section('content')
    <h2 class="text-danger mb-4 text-center">
        <i class="bi bi-tools"></i> Layanan Kami
    </h2>

    <div class="row">
        @foreach ($services as $service)
        <div class="col-md-4 mb-4">
            <div class="card bg-black border border-secondary h-100 shadow-sm">
                <div class="card-body text-center">
                    <i class="bi {{ $service->icon }} display-4 text-primary mb-3"></i>
                    <h5 class="card-title text-danger">{{ $service->name }}</h5>
                    <p class="card-text text-light">{{ $service->description }}</p>
                    <a href="{{ route('booking.index') }}" class="btn btn-outline-danger btn-sm mt-2">
                        <i class="bi bi-calendar-check-fill"></i> Booking Sekarang
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
@endsection
