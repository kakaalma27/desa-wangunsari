@extends('layouts.admin')
@section('main')
    <div class="container">
        <h2>Edit Data Perangkat Desa</h2>
        <form action="{{ route('perangkatdesa.update', $desa->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ old('nama', $desa->nama) }}">
                @error('nama')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="nipd" class="form-label">NIPD</label>
                <input type="text" class="form-control @error('nipd') is-invalid @enderror" id="nipd" name="nipd" value="{{ old('nipd', $desa->nipd) }}">
                @error('nipd')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="jabatan" class="form-label">Jabatan</label>
                <input type="text" class="form-control @error('jabatan') is-invalid @enderror" id="jabatan" name="jabatan" value="{{ old('jabatan', $desa->jabatan) }}">
                @error('jabatan')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="tupoksi" class="form-label">Tupoksi</label>
                <textarea class="form-control @error('tupoksi') is-invalid @enderror" id="tupoksi" name="tupoksi" cols="30" rows="10">{{ old('tupoksi', $desa->tupoksi) }}</textarea>
                @error('tupoksi')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image">
                @error('image')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        </form>
    </div>
@endsection
