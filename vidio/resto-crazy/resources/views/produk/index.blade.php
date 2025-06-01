@extends('front')

@section('content')
    <h2>Kategori: {{ $kategori->kategori }}</h2>

    <div class="row">
        @forelse ($produks as $produk)
            <div class="col-md-4 mb-3">
                <div class="card">
                    <img src="{{ asset('gambar/'.$produk->gambar) }}" class="card-img-top" style="height: 200px; object-fit: cover;">
                    <div class="card-body">
                        <h5 class="card-title">{{ $produk->nama }}</h5>
                        <p class="card-text">{{ $produk->deskripsi }}</p>
                        <p class="text-danger">Rp {{ number_format($produk->harga, 0, ',', '.') }}</p>
                        <a href="#" class="btn btn-success">Beli</a>
                    </div>
                </div>
            </div>
        @empty
            <p>Tidak ada produk di kategori ini.</p>
        @endforelse
    </div>
@endsection
