 @extends('backend.back')

 @section('admincontent')
 <div class="row">
    <div class="col-6">
       <form action="{{ url('admin/user') }}" method="post">
           @csrf
         
       <div class="mb-3">
           <label class="form-label">level</label>
           <select class="form-select"  name="level" id="">
              <option value="manager">manager</option>
              <option value="kasir">kasir</option>
              <option value="admin">admin</option>
           </select>
       </div>
       <div class="mb-3">
           <label class="form-label">nama</label>
            <input class="form-control" value="{{ old('name')}}" type="text" name="name">
            <span class="text-danger">
               @error('name')
                   {{ $message }}
               @enderror
            </span>
       </div>
       <div class="mb-3">
           <label class="form-label">email</label>
            <input class="form-control" value="{{ old('email')}}" type="text" name="email">
            <span class="text-danger">
               @error('email')
                   {{ $message }}
               @enderror
            </span>
       </div>
       <div class="mb-3">
           <label class="form-label">password</label>
            <input class="form-control" value="{{ old('password')}}" type="text" name="password">
            <span class="text-danger">
               @error('password')
                   {{ $message }}
               @enderror
            </span>

        
         <div class="mt-4">
             <button type="submit" class="btn btn-primary">simpan</button>
          </div>

      </form>

    </div>
</div>


 @endsection