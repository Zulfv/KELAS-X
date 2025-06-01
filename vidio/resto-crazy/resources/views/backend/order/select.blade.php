@extends('backend.back')

@section('admincontent')
  <div>
     <h1>order</h1>
  </div>
     <div>
        <a href="{{ url('admin/kategori/create') }}" class="btn btn-primary">tambah data</a>
     </div>
  <div>
     <table class="table">
          <thead>
              <th>no</th>
              <th>pelanggan</th>
              <th>tanggal</th>
              <th>tolal</th>
              <th>bayar</th>
              <th>kembali</th>
              <th>status</th>
          </thead>
          @php
              $no=1;
          @endphp
          <tbody>
               @foreach ($orders as $order )
                   <tr>
                       <td>{{ $no++ }}</td>
                       <td><a href="{{ url('admin/order/'.$order->idorder.'/edit') }}">{{ $order->pelanggan }}</a></td>
                       <td>{{ $order->tglorder }}</td>
                       <td>{{ $order->total }}</td>
                       <td>{{ $order->bayar }}</td>
                       <td>{{ $order->kembali }}</td>
                       @php
                           $status = "LUNAS";
                           if ($order->status == 0) {
                              $status = '<a href=" '.url('admin/order/'.$order->idorder).' ">BAYAR</a>';
                           }
                       @endphp
                       <td>{!! $status !!}</td>
                   </tr>
               @endforeach
          </tbody>
     </table>
  </div>
  <div class="d-flex justify-content-center mt-3">
    {{ $orders->withQuerystring()->links('pagination::bootstrap-4') }}
  </div>
@endsection