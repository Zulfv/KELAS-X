@extends('backend.back')

@section('admincontent')
<div class="row">
   <div class="col-6">
      <form action="{{ url('admin/kategori/'.$kategori->idkategori) }}" method="post">
          @csrf
          @method('PUT')
        
      <div class="mb-3">
          <label class="form-label">kategori</label>
           <input class="form-control" value="{{ $kategori->kategori }}" type="text" name="kategori">
           <span class="text-danger">
              @error('kategori')
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