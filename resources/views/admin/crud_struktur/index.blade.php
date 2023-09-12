@extends('layouts.admin')
@section('title', 'Struktur Organisasi')
@section('main')
    <div class="container mt-2">
        @if(session('success'))
        <div class="alert alert-success mt-3" id="success-message">
            {{ session('success') }}
        </div>
        @endif
                <div class="card shadow">
                    <div class="card-header fs-4">
                        List Struktur Organisasi
                      </div>
            <div class="card-body">
                <a href="{{ route('struktur.create') }}" class="btn btn-primary">Tambah Struktur</a>
                <a href="{{ route('anggota.index') }}" class="btn btn-primary">Tambah Anggota</a>
                <table class="table mt-3">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>nama</th>
                            <th>deskripsi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($ListStuktur as $Struktur)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $Struktur->nama }}</td>
                                <td>{{ $Struktur->deskripsi }}</td>
                                <td>
                                    <a href="{{ route('struktur.edit', $Struktur) }}" class="btn btn-sm btn-primary">Edit</a>
                                    <form action="{{ route('struktur.destroy', $Struktur) }}" method="post" style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection