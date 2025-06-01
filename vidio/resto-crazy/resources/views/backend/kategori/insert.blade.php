 @extends('backend.back')

 @section('admincontent')
 <div class="row">
    <div class="col-6">
       <form action="{{ url('admin/kategori') }}" method="post">
           @csrf
         
       <div class="mb-3">
           <label class="form-label">kategori</label>
            <input class="form-control" value="{{ old('kategori')}}" type="text" name="kategori">
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