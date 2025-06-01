@extends('layouts.app')

@section('title', 'Cabang')

@section('content')
<div class="container py-4">
    <h2 class="mb-4">Cabang Kami</h2>
    <div class="list-group">
        @foreach ($branches as $branch)
        <div class="list-group-item">
            <h5 class="mb-1">{{ $branch['name'] }}</h5>
            <p class="mb-1">{{ $branch['address'] }}</p>
            <small>Telepon: {{ $branch['phone'] }}</small>
        </div>
        @endforeach
    </div>
</div>
@endsection
