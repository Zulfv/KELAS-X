@extends('front')

@section('content')
<div class="container mt-4">
  <div class="row">
    @foreach ($menus as $menu)
      <div class="col-md-4 mb-4">
        <div class="card h-100">
          <img src="{{ asset('gambar/'.$menu->gambar) }}" class="card-img-top" alt="{{ $menu->menu }}">
          <div class="card-body d-flex flex-column">
            <h5 class="card-title">{{ $menu->menu }}</h5>
            <p class="card-text">{{ $menu->deskripsi }}</p>
            <h5 class="card-title mt-auto">Rp {{ number_format($menu->harga,0,',','.') }}</h5>
            <a href="{{ url('beli/'.$menu->idmenu) }}" class="btn btn-primary mt-2">Beli</a>
          </div>
        </div>
      </div>
    @endforeach
  </div>
  <div class="d-flex justify-content-center mt-3">
    {{ $menus->links('pagination::bootstrap-4') }}
  </div>
</div>
@endsection