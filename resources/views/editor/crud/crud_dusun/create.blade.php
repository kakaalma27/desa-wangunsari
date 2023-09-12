@extends('layouts.editor')

@section('main')
    <div class="container">
        <div class="card mt-2">
            <div class="card-body">
                <h2>Tambah Data Berita Desa</h2>
                <form action="{{ route('dusun.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="dusun" class="form-label">dusun</label>
                        <input type="text" class="form-control @error('dusun') is-invalid @enderror" id="dusun" name="dusun" value="{{ old('dusun') }}">
                        @error('dusun')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="rt" class="form-label">rt</label>
                        <input type="text" class="form-control @error('rt') is-invalid @enderror" id="rt" name="rt" value="{{ old('rt') }}">
                        @error('rt')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">deskripsi</label>
                        <input type="text" class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" name="deskripsi">
                        @error('deskripsi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Tambah Data</button>
                </form>
            </div>
        </div>
    </div>
@endsection
