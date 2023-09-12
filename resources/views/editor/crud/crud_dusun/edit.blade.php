@extends('layouts.editor')
@section('title', 'Edit Nama Dusun')
@section('main')
    <div class="container">
        <h2>Edit Data Rt</h2>
        <form action="{{ route('Dusun.update', $Dusun->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="nama_dusun" class="form-label">Nama Dusun</label>
                <input type="text" class="form-control @error('nama_dusun') is-invalid @enderror" id="nama_dusun" name="nama_dusun" value="{{ old('nama', $Dusun->nama_dusun) }}">
                @error('nama_dusun')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="nama_rt" class="form-label">Nama Rt</label>
                <input type="text" class="form-control @error('nama_rt') is-invalid @enderror" id="nama_rt" name="nama_rt" value="{{ old('nama_rt', $Dusun->nama_rt) }}">
                @error('nama_rt')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                <textarea cols="30" rows="10" class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" name="deskripsi" value="{{ old('deskripsi', $Dusun->deskripsi) }}">{{ old('deskripsi', $Dusun->deskripsi) }}</textarea>
                @error('deskripsi')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        </form>
    </div>
@endsection
