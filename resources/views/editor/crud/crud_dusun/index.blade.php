@extends('layouts.editor')
@section('title', 'Dusun')
@section('main')
    <div class="container mt-2">
        @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

        <div class="card shadow">
            <div class="card-header">
                <span class="fs-4">List Dusun Wangunsari</span>
            </div>
            <div class="card-body">
                <a href="{{ route('dusun.create') }}" class="btn btn-primary">Tambah Data</a>
                <table class="table mt-3">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>dusun</th>
                            <th>rt</th>
                            <th>deskripsi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($dusun as $dusuns)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $dusuns->dusun }}</td>
                                <td>{{ $dusuns->rt }}</td>
                                <td>{{ $dusuns->deskripsi }}</td>
                                <td>
                                    <a href="{{ route('dusun.edit', $dusuns) }}" class="btn btn-sm btn-primary">Edit</a>
                                    <form action="{{ route('dusun.destroy', $dusuns) }}" method="post" style="display: inline-block;">
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
