@extends('layouts.app')

@section('title', 'Kontak Kami')

@section('content')
<div class="container my-5">
    <h2 class="text-center text-primary mb-4"><i class="bi bi-telephone-fill me-2"></i>Kontak Kami</h2>
    <div class="row justify-content-center">
        <div class="col-md-8 bg-light p-4 rounded shadow-sm">
            <form>
                <div class="mb-3">
                    <label for="name" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="name" placeholder="Nama Anda">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email / Nomor HP</label>
                    <input type="text" class="form-control" id="email" placeholder="Email atau HP">
                </div>
                <div class="mb-3">
                    <label for="pesan" class="form-label">Pesan</label>
                    <textarea class="form-control" id="pesan" rows="4" placeholder="Tulis pesan Anda..."></textarea>
                </div>
                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-send-fill me-2"></i>Kirim Pesan
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
