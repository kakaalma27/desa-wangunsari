@extends('layouts.admin')
@section('title', 'List Berita')
@section('main')
@if(session('success'))
<div class="alert alert-success mt-3" id="success-message">
    {{ session('success') }}
</div>
@endif
        <div class="card shadow">
            <div class="card-header fs-4">
                List Berita
              </div>
            <div class="card-body">
                <a href="{{ route('beritadesa.create') }}" class="btn btn-primary">Tambah Berita</a>
                <table class="table mt-3">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Judul</th>
                            <th>Deskripsi</th>
                            <th>Image</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($BeritaList as $berita)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $berita->judul }}</td>
                                <td>{{ Str::limit($berita['deskripsi'], 140) }}</td>
                                <td>
                                    @if ($berita->image)
                                        <img src="{{ asset('storage/' . $berita->image) }}" alt="Image" style="max-width: 100px;">
                                    @else
                                        No image
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('beritadesa.edit', $berita) }}" class="btn btn-sm btn-primary">Edit</a>
                                    <form action="{{ route('beritadesa.destroy', $berita) }}" method="post" style="display: inline-block;">
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
@endsection
