@extends('layouts.app')

@section('content')
<div>

    <div class="d-flex justify-content-center align-items-center min-vh-100">
        <div class="p-4 border rounded bg-light shadow-sm w-50">
            <h2 class="text-center mb-4">Form Input Mahasiswa</h2>

        <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="nama" class="form-label">Nama:</label>
                <input type="text" name="nama" class="form-control" id="nama">
                @error('nama')
                    <div class="text-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="npm" class="form-label">NPM:</label>
                <input type="text" name="npm" class="form-control" id="npm">
                @error('npm')
                    <div class="text-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="id_kelas" class="form-label">Kelas:</label>
                <select name="kelas_id" id="kelas_id">
                    @foreach($kelas as $kelasItem) 
                        <option value="{{$kelasItem->id}}">{{$kelasItem->nama_kelas}}</option>
                    @endforeach
                </select>
                @error('kelas')
                    <div class="text-danger">{{$message}}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="foto" class="form-label">Foto</label>
                <input class="form-control" type="file" id="foto" name="foto">
            </div>

            <button type="submit" class="btn btn-primary w-100">Submit</button>

        </form>
    </div>
</div>
@endsection


<!-- <!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Input Mahasiswa</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"> -->

    <!-- Custom CSS -->
    <!-- <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}"> -->
<!-- </head> -->

<!-- <body>

    <div class="d-flex justify-content-center align-items-center min-vh-100">
        <div class="p-4 border rounded bg-light shadow-sm w-50">
            <h2 class="text-center mb-4">Form Input Mahasiswa</h2>

            <form action="{{ url('/user/store') }}" method="POST">
                @csrf

                @include('_form')

            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body> -->
<!-- </html> -->