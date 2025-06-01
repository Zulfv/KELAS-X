@extends('backend.back')

@section('admincontent')
  <div>
     <h1>menus</h1>
  </div>
     <div>
        <a href="{{ url('admin/menu/create') }}" class="btn btn-primary">tambah data</a>
     </div>
      <div class="row mt-2">
          <div class="col-4 mb-2">
              <form action="{{ url('admin/select') }}" method="get">
                 <select class="form-select" name="idkategori" onchange="this.form.submit()">
                    <option value="">-- pilih kategori -- </option>
                      @foreach ($kategoris as $kategori)
                        <option value="{{ $kategori->idkategori }}">{{ $kategori->kategori }}</option>
                     @endforeach
                 </select>
               </form>
          </div>
      </div>
  <div>
     <table class="table">
          <thead>
              <th>no</th>
              <th>kategori</th>
              <th>menu</th>
              <th>deskripsi</th>
              <th>gamabar</th>
              <th>harga</th>
              <th>ubah</th>
              <th>hapus</th>
          </thead>
          @php
              $no=1;
          @endphp
          <tbody>
               @foreach ($menus as $menu )
                   <tr>
                       <td>{{ $no++ }}</td>
                       <td>{{ $menu->kategori }}</td>
                       <td>{{ $menu->menu }}</td>
                       <td>{{ $menu->deskripsi }}</td>
                       <td><img width="100px" src="{{ asset('gambar/'.$menu->gambar) }}" alt=""></td>
                       <td>{{ $menu->harga }}</td>
                       <td> <a href="{{ url('admin/menu/'.$menu->idmenu.'/edit') }}">ubah</a></td>
                       <td> <a href="{{ url('admin/menu/'.$menu->idmenu) }}">hapus</a> </td>
                   </tr>
               @endforeach
          </tbody>
     </table>
  </div>
  <div class="d-flex justify-content-center mt-3">
    {{ $menus->withQuerystring()->links('pagination::bootstrap-4') }}
  </div>
@endsection