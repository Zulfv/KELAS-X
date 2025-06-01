@extends('backend.back')

@section('admincontent')
<div>
    <h1>Pelanggan</h1>
</div>

<div class="mb-3">
    <a href="{{ url('admin/pelanggan/create') }}" class="btn btn-primary">Tambah Data</a>
</div>

<div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Pelanggan</th>
                <th>Alamat</th>
                <th>Email</th>
                <th>Telp</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @php
                $no = 1;
            @endphp
            @foreach ($pelanggans as $pelanggan)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $pelanggan->pelanggan }}</td>
                    <td>{{ $pelanggan->alamat }}</td>
                    <td>{{ $pelanggan->email }}</td>
                    <td>{{ $pelanggan->telp }}</td>
                    <td>
                        @php
                           if ($pelanggan->aktif == 0) {
                               $aktif = '<a href="' . url('admin/pelanggan/'.$pelanggan->idpelanggan) . '">BANNED</a>';
                            } else {
                              $aktif = '<a href="' . url('admin/pelanggan/'.$pelanggan->idpelanggan) . '">AKTIF</a>';
                            }
                        @endphp
                        {!! $aktif !!}
                    </td>
                </tr> 
            @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-center mt-3">
        {{ $pelanggans->withQuerystring()->links('pagination::bootstrap-4') }}
      </div>
</div>
@endsection
