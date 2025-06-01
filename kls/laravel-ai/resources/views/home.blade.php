@extends('layouts.app')

@section('title', 'Beranda')

@section('content')
    <div class="text-center">
        <h1 class="display-4 text-danger mb-4">
            <i class="bi bi-lightning-charge-fill"></i> AI GARAGE
        </h1>
        <p class="lead text-light">
            Bengkel Motor Balap • Tuning • Service Premium
        </p>
        <a href="{{ route('services.index') }}" class="btn btn-danger btn-lg mt-3 shadow">
            <i class="bi bi-tools"></i> Lihat Layanan Kami
        </a>
    </div>

    <hr class="my-5 text-secondary">

    <div class="row text-center">
        <div class="col-md-4 mb-4">
            <div class="card bg-black border border-danger h-100 shadow-sm">
                <div class="card-body">
                    <i class="bi bi-gear-fill display-4 text-primary mb-3"></i>
                    <h5 class="card-title text-danger">Tuning Mesin</h5>
                    <p class="card-text text-light">Optimasi performa motor dengan alat dyno terkini.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card bg-black border border-primary h-100 shadow-sm">
                <div class="card-body">
                    <i class="bi bi-wrench-adjustable-circle-fill display-4 text-danger mb-3"></i>
                    <h5 class="card-title text-primary">Service Cepat</h5>
                    <p class="card-text text-light">Perawatan rutin dan pengecekan menyeluruh dalam 30 menit.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card bg-black border border-light h-100 shadow-sm">
                <div class="card-body">
                    <i class="bi bi-speedometer2 display-4 text-warning mb-3"></i>
                    <h5 class="card-title text-light">Test Jalan</h5>
                    <p class="card-text text-light">Uji performa di trek pendek untuk hasil maksimal.</p>
                </div>
            </div>
        </div>
    </div>
@endsection
