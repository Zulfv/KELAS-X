@extends('front')


@section('content')
     <div class="row">
         <div class="col-6">
            <form action="{{ url('/postregister') }}" method="post">
                @csrf
            
            <div class="mb-3">
                <label class="form-label">Pelanggan</label>
                <input class="form-control" value="{{ old('pelanggan')}}" type="text" name="pelanggan">
                <span class="text-danger">
                    @error('pelanggan')
                        {{ $message }}
                    @enderror
             </span>
            </div>
    
            <div class="mb-3">
                <label class="form-label">Alamat</label>
                <input class="form-control" value="{{ old('alamat')}}" type="text" name="alamat">
                 <span class="text-danger">
                    @error('alamat')
                        {{ $message }}
                    @enderror
                 </span>
            </div>
    
            <div class="mb-3">
                <label class="form-label">Telp</label>
                <input class="form-control" value="{{ old('telp')}}" type="text" name="telp">
                <span class="text-danger">
                    @error('telp')
                        {{ $message }}
                    @enderror
                 </span>
            </div>
    
            <div class="mb-3">
                <label class="form-label">Jenis Kelamin</label>
                <select class="form-select" name="jeniskelamin">
                    <option value="l">L</option>
                    <option value="p" selected>P</option>
                </select>
            </div>
    
            <div class="mb-3">
                <label class="form-label">Email</label>
                 <input class="form-control" value="{{ old('email')}}" type="email" name="email">
                 <span class="text-danger">
                    @error('email')
                        {{ $message }}
                    @enderror
                 </span>
            </div>
    
            <div class="mb-3">
                <label class="form-label">Password</label>
                <input class="form-control" value="{{ old('password')}}" type="password" name="password">
                <span class="text-danger">
                    @error('password')
                        {{ $message }}
                    @enderror
                 </span>
            </div>
             
              <div class="mt-4">
                  <button type="submit" class="btn btn-primary">Register</button>
               </div>

           </form>

         </div>
     </div>

@endsection
