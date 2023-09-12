@extends('layouts.admin')
@section('title', 'List UMKM')
@section('main')
@if(session('success'))
<div class="alert alert-success mt-3" id="success-message">
    {{ session('success') }}
</div>
@endif
        <div class="card">
            <div class="card-header fs-4">
                List UMKM
              </div>
            <div class="card-body">
                <a href="{{ route('umkm.create') }}" class="btn btn-primary">Tambah UMKM</a>
                <table class="table mt-3">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>judul</th>
                            <th>deskripsi</th>
                            <th>nohp</th>
                            <th>Image</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($Listumkm as $umkm)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $umkm->judul }}</td>
                                <td>{{ Str::limit($umkm['deskripsi'], 140) }}</td>
                                <td>{{ $umkm->nohp }}</td>
                                <td>
                                    @if ($umkm->image)
                                        <img src="{{ asset('storage/' . $umkm->image) }}" alt="Image" style="max-width: 100px;">
                                    @else
                                        No image
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('umkm.edit', $umkm) }}" class="btn btn-sm btn-primary">Edit</a>
                                    <form action="{{ route('umkm.destroy', $umkm) }}" method="post" style="display: inline-block;">
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
