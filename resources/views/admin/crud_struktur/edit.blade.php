@extends('layouts.admin')
@section('title', 'Edit Struktur Organisasi')
@section('main')
<div class="container">
    <div class="card mt-2">
        <div class="card-header">
            <p class="fs-4 fw-normal">Edit Struktur</p>
        </div>
        <div class="card-body">
            <form action="{{ route('struktur.update', $struktur->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="nama" class="form-label">nama</label>
                    <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ old('nama', $struktur->nama) }}">
                    @error('nama')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="deskripsi" class="form-label">deskripsi</label>
                    <input type="text" class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" name="deskripsi" value="{{ old('deskripsi', $struktur->deskripsi) }}">
                    @error('deskripsi')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-dark">Simpan Perubahan</button>
            </form>
        </div>
    </div>
</div>

@endsection