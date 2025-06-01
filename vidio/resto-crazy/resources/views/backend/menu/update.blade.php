@extends('backend.back')

@section('admincontent')
<div>
    <h2>update data</h2>
</div>
<div class="row">

   <div class="col-6">
      <form action="{{ url('admin/postmenu/'.$menu->idmenu) }}" method="post" enctype="multipart/form-data"  >
          @csrf
        
          <select class="form-select" name="idkategori" >

             @foreach ($kategoris as $kategori)
               <option @selected($kategori->idkategori==$menu->idkategori)  value="{{ $kategori->idkategori }}">{{ $kategori->kategori }}</option>
            @endforeach
        </select>


      <div class="mb-3">
          <label class="form-label">menu</label>
           <input class="form-control" type="text" value="{{ $menu->menu }}"  name="menu">
           <span class="text-danger">
              @error('gambar')
                  {{ $message }}
              @enderror
           </span>
      </div>
      <div class="mb-3">
          <label class="form-label">deskripsi</label>
           <input class="form-control" type="text" value="{{ $menu->deskripsi }}"  name="deskripsi">
           <span class="text-danger">
              @error('deskeripsi')
                  {{ $message }}
              @enderror
           </span>
      </div>
      <div class="mb-3">
          <label class="form-label">harga</label>
           <input class="form-control" type="number" value="{{ $menu->harga }}" name="harga">
           <span class="text-danger">
              @error('harga')
                  {{ $message }}
              @enderror
           </span>
      </div>
      <div class="mb-3">
          <label class="form-label">gambar</label>
           <input class="form-control" type="file"  name="gambar">
           <span class="text-danger">
              @error('gambar')
                  {{ $message }}
              @enderror
           </span>
      </div>
  
       
        <div class="mt-4">
            <button type="submit" class="btn btn-primary">simpan</button>
         </div>

     </form>

   </div>
</div>


@endsection