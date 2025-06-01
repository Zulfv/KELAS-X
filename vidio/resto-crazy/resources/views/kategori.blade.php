@extends('front')

@section('content')
<div class="row">
   @foreach (  $menus as $menu )
   <div class="card mx-2 mb-2" style="width: 18rem;">

    <img src="{{ asset('gambar/'.$menu->gambar) }}" class="card-img-top" alt="...">

    <div class="card-body">
      <h5 class="card-title">{{ $menu->menu }}</h5>
      <p class="card-text">{{ $menu->deskripsi }} </p>
      <h5 class="card-title">{{ $menu->harga }}</h5>
      <a href="{{ url('beli/'.$menu->idmenu) }}" class="btn btn-primary">beli</a>
    </div>

  </div>
   @endforeach
    <div class="d-flex justify-content-center mt-5">
      {{ $menus->links() }}
    </div>
</div>  
@endsection