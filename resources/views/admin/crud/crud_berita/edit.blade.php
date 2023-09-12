@extends('layouts.admin')
@section('title', 'Edit Berita')
@section('main')
    <div class="container">
        <div class="card mt-2">
            <div class="card-header">
                <p class="fs-4 fw-normal">Edit Berita</p>
            </div>
            <div class="card-body">
                <form action="{{ route('beritadesa.update', $berita->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="judul" class="form-label">judul</label>
                        <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul" name="judul" value="{{ old('judul', $berita->judul) }}">
                        @error('judul')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">deskripsi</label>
                        <input type="text" class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" name="deskripsi" value="{{ old('deskripsi', $berita->deskripsi) }}">
                        @error('deskripsi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Image</label>
                        <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image">
                        @error('image')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <img src="{{ asset('storage/' . $berita->image) }}" alt="" class="img-top">
                    </div>
                    <button type="submit" class="btn btn-dark">Simpan Perubahan</button>
                </form>
            </div>
        </div>
    </div>
@endsection
