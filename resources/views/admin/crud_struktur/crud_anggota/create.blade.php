@extends('layouts.admin')
@section('title', 'Struktur Anggota')
@section('main')
    <div class="container">
        <div class="card mt-2">
            <div class="card-header">
                <p class="fs-4 fw-normal">Tambah Anggota Struktur</p>
            </div>
            <div class="card-body">
                <form action="{{ route('anggota.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="strukturs_id" class="form-label">Pilih Struktur Organisasi</label>
                        <select class="form-control @error('strukturs_id') is-invalid @enderror" id="strukturs_id" name="strukturs_id">
                            <option value="" disabled selected>Pilih Struktur Organisasi</option>
                            @foreach ($ListStuktur as $apb)
                                <option value="{{ $apb->id }}" {{ old('strukturs_id') == $apb->id ? 'selected' : '' }}>
                                    {{ $apb->nama }} - {{ $apb->deskripsi }}
                                </option>
                            @endforeach
                        </select>
                        @error('strukturs_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="nama" class="form-label">nama</label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ old('nama') }}">
                        @error('nama')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="nip" class="form-label">nip</label>
                        <input type="text" class="form-control @error('nip') is-invalid @enderror" id="nip" name="nip" value="{{ old('nip') }}">
                        @error('nip')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="jataban" class="form-label">jataban</label>
                        <input type="text" class="form-control @error('jataban') is-invalid @enderror" id="jataban" name="jataban" value="{{ old('jataban') }}">
                        @error('jataban')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="tupoksi" class="form-label">tupoksi</label>
                        <textarea type="text" class="form-control @error('tupoksi') is-invalid @enderror" id="tupoksi" name="tupoksi" value="{{ old('tupoksi') }}"></textarea>
                        @error('tupoksi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">image</label>
                        <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" value="{{ old('image') }}">
                        @error('image')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Tambah Data</button>
                </form>
            </div>
        </div>
    </div>
@endsection