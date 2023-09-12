@extends('layouts.admin')
@section('title', 'List Kegiatan')
@section('main')
<div class="container mt-2">
    @if(session('success'))
    <div class="alert alert-success mt-3" id="success-message">
        {{ session('success') }}
    </div>
    @endif
    <div class="card shadow">
            <div class="card-header">
                <span class="fs-4">List Agenda</span>
            </div>
        <div class="card-body">
            <a href="{{ route('agenda.create') }}" class="btn btn-primary">Tambah Data</a>
            <table class="table mt-3">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>judul</th>
                        <th>deskripsi</th>
                        <th>Waktu</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($AgendaList as $agenda)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $agenda->judul }}</td>
                            <td>{{ $agenda->deskripsi }}</td>
                            <td>{{ $agenda->waktu }}</td>
                            <td>
                                <a href="{{ route('agenda.edit', $agenda) }}" class="btn btn-sm btn-primary">Edit</a>
                                <form action="{{ route('agenda.destroy', $agenda) }}" method="post" style="display: inline-block;">
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