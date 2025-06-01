@extends('backend.back')

@section('admincontent')
  <div>
     <h1>order detail</h1>
  </div>
      <h1>pelanggan : {{ $orders [0] ['pelanggan']}}</h1>
      <h1>total : {{ number_format($orders [0] ['total']) }}</h1>
  <div>
     <table class="table">
          <thead>
              <th>no</th>
              <th>menu</th>
              <th>harga</th>
              <th>jumlah</th>
              <th>total</th>
          </thead>
          @php
              $no=1;
          @endphp
          <tbody>
               @foreach ($orders as $order )
                   <tr>
                       <td>{{ $no++ }}</td>

                       <td>{{ $order->menu }}</td>
                       <td>{{ $order->harga }}</td>
                       <td>{{ $order->jumlah }}</td>
                       <td>{{ $order->jumlah * $order->harga }}</td>
                       
                   </tr>
               @endforeach
          </tbody>
     </table>
  </div>
@endsection