@extends('layouts.admin')
@section('title', 'Agenda Kegiatan')
@section('main')
<div class="container">
    <div class="card mt-2 shadow">
        <div class="card-body">
            <h2>Tambah Agenda Desa</h2>
            <form action="{{ route('agenda.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="judul" class="form-label">judul</label>
                    <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul" name="judul">
                    @error('judul')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="deskripsi" class="form-label">deskripsi</label>
                    <textarea class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" name="deskripsi" cols="30" rows="10"></textarea>
                    @error('deskripsi')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="waktu" class="form-label">waktu</label>
                    <input type="text" class="form-control @error('waktu') is-invalid @enderror" id="waktu" name="waktu">
                    @error('waktu')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Tambah Data</button>
            </form>
        </div>
    </div>
</div>
@endsection