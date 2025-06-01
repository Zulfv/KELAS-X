@extends('backend.back')

@section('admincontent')
  <div>
     <h1> data user</h1>
  </div>
     <div>
        <a href="{{ url('admin/user/create') }}" class="btn btn-primary">tambah data</a>
        @if (session()->has('pesan'))
            <p class="alert alert-dager">{{ session()->get('pesan') }}</p>
        @endif
    </div>
  <div>
     <table class="table">
          <thead>
              <th>no</th>
              <th>nama</th>
              <th>email</th>
              <th>level</th>
              <th>ubah</th>
              <th>hapus</th>
          </thead>
          @php
              $no=1;
          @endphp
          <tbody>
               @foreach ($users as $user )
                   <tr>
                       <td>{{ $no++ }}</td>
                       <td>{{ $user->name }}</td>
                       <td>{{ $user->email }}</td>
                       <td>{{ $user->level }}</td>
                       <td> <a href="{{ url('admin/user/'.$user->id.'/edit') }}">ubah password</a></td>
                       <td> <a href="{{ url('admin/user/'.$user->id) }}">hapus</a> </td>  
                   </tr>
               @endforeach
          </tbody>
     </table>
  </div>
@endsection 