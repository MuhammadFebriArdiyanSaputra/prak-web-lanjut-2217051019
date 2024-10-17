@extends('layouts.app')

@section('content')
<div class="mb-3">
    <a href="{{ route('user.create') }}" class="btn btn-primary">Tambah User</a>
</div><br>

<h2 style="text-align: center;">List Data</h2><br>


<table>
    <thead>
        <tr>
        <th>ID</th>
        <th>Nama</th>
        <th>NPM</th>
        <th>Kelas</th>
        <th>Foto</th>
        <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
        <tr>
        <td>{{ $user['id'] }}</td>
        <td>{{ $user['nama'] }}</td>
        <td>{{ $user['npm'] }}</td>
        <td>{{ $user['nama_kelas'] }}</td>
        <td>
            <img src="{{ asset('storage/uploads/' . $user->foto) }}" alt="Foto User" width="100">
        </td>
        <td>
            <a href="{{ route('user.view', $user->id) }}" class="btn btn-info">View</a>
            <a href="{{ route('user.edit', $user['id']) }}" class="btn btn-edit">Edit</a>
            <form action="{{ route('user.destroy', $user['id']) }}" method="POST" style="display:inline-block;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-delete" onclick="return confirm('Apakah anda yakin ingin menghapus?');">Hapus</button>
            </form>
        </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
