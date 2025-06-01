@extends('backend.back')

@section('admincontent')
<div class="row">
   <div class="col-6">
      <form action="{{ url('admin/user/'.$user->id) }}" method="post">
          @csrf
          @method('PUT')
        
      <div class="mb-3">
          <label class="form-label">password</label>
           <input class="form-control"  type="password" name="password">
           <span class="text-danger">
              @error('password')
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