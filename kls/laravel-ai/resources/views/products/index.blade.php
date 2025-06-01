@extends('layouts.app')

@section('title', 'Produk')

@section('content')
<div class="container py-4">
    <h2 class="mb-4">Daftar Produk</h2>
    <div class="row">
        @foreach ($products as $product)
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <img src="{{ asset('images/' . $product['image']) }}" class="card-img-top" alt="{{ $product['name'] }}">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">{{ $product['name'] }}</h5>
                    <p class="card-text text-primary fw-bold">{{ $product['price'] }}</p>
                    <p class="card-text">{{ $product['description'] }}</p>
                    <a href="#" class="btn btn-primary mt-auto">Lihat Detail</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
