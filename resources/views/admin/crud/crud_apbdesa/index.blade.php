@extends('layouts.admin')
@section('title', '')
@section('main')
    <div class="container mt-2">
        <div class="card">
            <div class="card-body">
                <h2>Daftar APB Desa</h2>
                <a href="{{ route('apbdesa.create') }}" class="btn btn-primary">Tambah Data</a>
                <table class="table mt-3">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>kategori</th>
                            <th>judul</th>
                            <th>deskripsi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($APBDESA as $apb)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $apb->kategori }}</td>
                                <td>{{ $apb->judul }}</td>
                                <td>{{ $apb->deskripsi }}</td>
                                <td>
                                    <a href="{{ route('apbdesa.index', $apb) }}" class="btn btn-sm btn-primary">Edit</a>
                                    <form action="{{ route('apbdesa.destroy', $apb) }}" method="post" style="display: inline-block;">
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
