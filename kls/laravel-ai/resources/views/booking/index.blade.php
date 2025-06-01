@extends('layouts.app')

@section('title', 'Booking Service')

@section('content')
    <h2 class="text-center text-primary mb-4">
        <i class="bi bi-calendar-check-fill"></i> Booking Service
    </h2>

    <form action="#" method="POST" class="bg-dark p-4 rounded shadow text-light">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label text-light">Nama Lengkap</label>
            <input type="text" class="form-control bg-black text-light border-secondary" id="name" name="name" required>
        </div>

        <div class="mb-3">
            <label for="phone" class="form-label text-light">Nomor HP</label>
            <input type="text" class="form-control bg-black text-light border-secondary" id="phone" name="phone" required>
        </div>

        <div class="mb-3">
            <label for="service" class="form-label text-light">Pilih Layanan</label>
            <select id="service" name="service" class="form-select bg-black text-light border-secondary" required>
                <option value="">-- Pilih Layanan --</option>
                <option value="Tuning Mesin">Tuning Mesin</option>
                <option value="Ganti Oli">Ganti Oli</option>
                <option value="Cek Rem & Lampu">Cek Rem & Lampu</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="date" class="form-label text-light">Tanggal Booking</label>
            <input type="date" class="form-control bg-black text-light border-secondary" id="date" name="date" required>
        </div>

        <button type="submit" class="btn btn-danger w-100">
            <i class="bi bi-send-fill"></i> Kirim Booking
        </button>
    </form>
@endsection
