@extends('backend.back')

@section('admincontent')
  <div>
     <h1>Order Detail</h1>
  </div>

  
    <form action="{{ url('admin/orderdetail/create') }}" method="get">
      
   <div class="row">
        <div class="mt-2 col-4">
          <label class="form-label">tanggal mulai</label>
          <input class="form-control" type="date" name="tglmulai">
       </div>


      <div class="mt-2 col-4">
         <label class="form-label">tanggal ahkir</label>
         <input class="form-control" type="date" name="tglahkir">
      </div>

     
      <div class="my-4 col-4">
         <p></p>
          <button type="submit" class="btn btn-primary">cari</button>
       </div>
 
    </div>
   </form>
 

  <div>
     <table class="table">
          <thead>
              <tr>
                  <th>No</th>
                  <th>Tanggal</th>                  
                  <th>pelanggan</th>                  
                  <th>Menu</th>
                  <th>Harga</th>
                  <th>Jumlah</th>
                  <th>Total</th>
                  <th>Pelanggan</th>
              </tr>
          </thead>
          <tbody>
              @php
                  $no = 1;
              @endphp
              @foreach ($details as $detail)
                  <tr>
                      <td>{{ $no++ }}</td>
                      <td>{{ $detail->tglorder }}</td>
                      <td>{{ $detail->pelanggan }}</td>
                      <td>{{ $detail->menu }}</td>
                      <td>{{ number_format($detail->harga) }}</td> <!-- pakai format ribuan -->
                      <td>{{ $detail->jumlah }}</td>
                      <td>{{ number_format($detail->total) }}</td> <!-- format ribuan juga -->
                      <td>{{ $detail->pelanggan }}</td> <!-- tambahkan ini -->
                  </tr>
              @endforeach
          </tbody>
     </table>

     {{-- pagination link --}}
     <div class="mt-3">
         {{ $details->links() }}
     </div>
  </div>
@endsection
