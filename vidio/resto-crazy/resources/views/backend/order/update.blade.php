@extends('backend.back')

@section('admincontent')
<div class="row">
    <div>
        <h1>{{ number_format($order->total) }}</h1>
    </div>
    <div class="col-6">
        <form action="{{ url('admin/order/'.$order->idorder) }}" method="post">
            @csrf
            @method('PUT')
        
            <div class="mb-3">
                <label class="form-label">Total</label>
                <input class="form-control" min="{{ $order->total }}" value="{{ $order->total }}" type="number" name="bayar">
                <span class="text-danger">
                    @error('total')
                        {{ $message }}
                    @enderror
                </span>
            </div>

            <div class="mt-4">
                <button type="submit" class="btn btn-primary">BAYAR</button>
            </div>

        </form>
    </div>
</div>
@endsection
