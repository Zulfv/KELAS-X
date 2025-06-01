@extends('backend.back')

@section('admincontent')
  <div>
     <h1>kategori</h1>
  </div>
     <div>
        <a href="{{ url('admin/kategori/create') }}" class="btn btn-primary">tambah data</a>
     </div>
  <div>
     <table class="table">
          <thead>
              <th>no</th>
              <th>kategori</th>
              <th>ubah</th>
              <th>hapus</th>
          </thead>
          @php
              $no=1;
          @endphp
          <tbody>
               @foreach ($kategoris as $kategori )
                   <tr>
                       <td>{{ $no++ }}</td>
                       <td>{{ $kategori->kategori }}</td>
                       <td> <a href="{{ url('admin/kategori/'.$kategori->idkategori.'/edit') }}">ubah</a></td>
                       <td> <a href="{{ url('admin/kategori/'.$kategori->idkategori) }}">hapus</a> </td>
                   </tr>
               @endforeach
          </tbody>
     </table>
  </div>
@endsection