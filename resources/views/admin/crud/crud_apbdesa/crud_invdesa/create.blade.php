@extends('layouts.admin')

@section('main')
    <div class="container">
        <div class="card mt-2">
            <div class="card-body">
                <h2>Tambah Data Investaris Desa</h2>
                <form action="{{ route('invdesa.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="apb_id" class="form-label">Pilih APB Desa</label>
                        <select class="form-control @error('apb_id') is-invalid @enderror" id="apb_id" name="apb_id">
                            <option value="" disabled selected>Pilih APB Desa</option>
                            @foreach ($APBDESA as $apb)
                                <option value="{{ $apb->id }}" {{ old('apb_id') == $apb->id ? 'selected' : '' }}>
                                    {{ $apb->kategori }} - {{ $apb->judul }}
                                </option>
                            @endforeach
                        </select>
                        @error('apb_id')
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
                        <label for="kode" class="form-label">kode</label>
                        <input type="text" class="form-control @error('kode') is-invalid @enderror" id="kode" name="kode" value="{{ old('kode') }}">
                        @error('kode')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="nup" class="form-label">nup</label>
                        <input type="text" class="form-control @error('nup') is-invalid @enderror" id="nup" name="nup" value="{{ old('nup') }}">
                        @error('nup')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="merek" class="form-label">merek</label>
                        <input type="text" class="form-control @error('merek') is-invalid @enderror" id="merek" name="merek" value="{{ old('merek') }}">
                        @error('merek')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="tahun" class="form-label">tahun</label>
                        <input type="text" class="form-control @error('tahun') is-invalid @enderror" id="tahun" name="tahun" value="{{ old('tahun') }}">
                        @error('tahun')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Tambah Data</button>
                </form>
            </div>
        </div>
    </div>
@endsection
