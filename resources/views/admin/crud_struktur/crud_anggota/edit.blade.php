@extends('layouts.admin')
@section('title', 'Edit Anggota')
@section('main')
<div class="container">
    <div class="card mt-2">
        <div class="card-header">
            <p class="fs-4 fw-normal">Edit ListAnggota</p>
        </div>
        <div class="card-body">
            <form action="{{ route('anggota.update', $ListAnggota->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="nama" class="form-label">nama</label>
                    <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ old('nama', $ListAnggota->nama) }}">
                    @error('nama')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="nip" class="form-label">nip</label>
                    <input type="text" class="form-control @error('nip') is-invalid @enderror" id="nip" name="nip" value="{{ old('nip', $ListAnggota->nip) }}">
                    @error('nip')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="jataban" class="form-label">jataban</label>
                    <input type="text" class="form-control @error('jataban') is-invalid @enderror" id="jataban" name="jataban" value="{{ old('jataban', $ListAnggota->jataban) }}">
                    @error('jataban')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="tupoksi" class="form-label">tupoksi</label>
                    <textarea type="text" class="form-control @error('tupoksi') is-invalid @enderror" id="tupoksi" name="tupoksi" rows="8">{{ old('tupoksi', $ListAnggota->tupoksi) }}</textarea>
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
                    <img src="{{ asset('storage/' . $ListAnggota->image) }}"  height="240" width="380">
                </div>
                <button type="submit" class="btn btn-dark">Simpan Perubahan</button>
            </form>
        </div>
    </div>
</div>

@endsection