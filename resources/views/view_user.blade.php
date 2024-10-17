@extends('layouts.app')

@section('content')
    <h1>{{ $title }}</h1>

    <div class="card">
        <div class="card-header">
            User Details
        </div>
        <div class="card-body">
            <p><strong>Nama:</strong> {{ $user->nama }}</p>
            <p><strong>NPM:</strong> {{ $user->npm }}</p>
            <p><strong>Kelas:</strong> {{ $kelas->nama_kelas ?? 'Kelas tidak ditemukan' }}</p>
            <p><strong>Foto:</strong></p>
            <img src="{{ asset('storage/uploads/' . $user->foto) }}" alt="User Foto" width="150px">
        </div>
    </div>
    
    <a href="{{ route('user.list') }}" class="btn btn-secondary">Back to List</a>
@endsection
