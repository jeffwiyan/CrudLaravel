@extends('layouts.app')

@section('content')
<div class="mb-4">
    <h1>Laravel CRUD Mahasiswa</h1>
    <p><strong>Nama:</strong> Jeffwiyan</p>
    <p><strong>NIM:</strong> 535240149</p>
</div>

    <h2>Daftar Mahasiswa</h2>
    <a class="btn btn-primary mb-3" href="{{ route('mahasiswa.create') }}">Tambah Mahasiswa</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama</th><th>NIM</th><th>Email</th><th>Jurusan</th><th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($mahasiswas as $m)
                <tr>
                    <td>{{ $m->nama }}</td>
                    <td>{{ $m->nim }}</td>
                    <td>{{ $m->email }}</td>
                    <td>{{ $m->jurusan }}</td>
                    <td>
                        <a class="btn btn-sm btn-warning" href="{{ route('mahasiswa.edit', $m->id) }}">Edit</a>
                        <form action="{{ route('mahasiswa.destroy', $m->id) }}" method="POST" style="display:inline-block">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin hapus?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
