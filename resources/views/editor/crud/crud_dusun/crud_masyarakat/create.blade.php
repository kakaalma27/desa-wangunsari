@extends('layouts.editor')
@section('title', 'Masyarakat')
@section('main')
    <div class="container">
        <div class="card mt-2">
            <div class="card-header">
                <span class="fs-4">Tambah Data Masyarakat</span>
            </div>
            <div class="card-body shadow ">
                <form action="{{ route('masyarakat.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-4">
                        <label for="dusun_id" class="form-label">Pilih Dusun - RT</label>
                        <select class="form-control @error('dusun_id') is-invalid @enderror" id="dusun_id" name="dusun_id">
                            <option value="" disabled selected>Pilih Dusun - RT</option>
                            @foreach ($ListDusun as $dusun)
                                <option value="{{ $dusun->id }}" {{ old('dusun_id') == $dusun->id ? 'selected' : '' }}>
                                    {{ $dusun->dusun }} - {{ $dusun->rt }}
                                </option>
                            @endforeach
                        </select>
                        @error('dusun_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="row g-2 d-flex justify-content-center"">
                        <div class="col col-md-5 col-sm-4  mb-4">
                            <label for="nama" class="form-label">nama</label>
                            <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ old('nama') }}">
                            @error('nama')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col col-md-5 col-sm-4  mb-4">
                            <label for="jenis_kelamin" class="form-label">jenis kelamin</label>
                            <select class="form-select" id="jenis_kelamin" name="jenis_kelamin" value="{{ old('jenis_kelamin') }}">
                                <option>Pilih Jenis Kelamin</option>
                                <option value="Laki-Laki">Laki-Laki</option>
                                <option value="Perempuan">Perempuan</option>
                              </select>
                        </div>
                        <div class="col col-md-5 col-sm-4  mb-4">
                            <label for="staus" class="form-label">staus</label>
                            <select class="form-select" id="staus" name="staus">
                                <option>Pilih staus</option>
                                <option value="Kawin">Kawin</option>
                                <option value="Belum">Belum</option>
                            </select>
                            @error('staus')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col col-md-5 col-sm-4  mb-4">
                            <label for="tempat" class="form-label">Tempat Lahir</label>
                            <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror" id="tempat_lahir" name="tempat_lahir" value="{{ old('tempat_lahir') }}">
                            @error('tempat_lahir')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col col-md-5 col-sm-4  mb-4">
                            <label for="lahir" class="form-label">Tanggal Lahir</label>
                            <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" id="tanggal_lahir" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}">
                            @error('tanggal_lahir')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col col-md-5 col-sm-4 mb-4">
                            <label for="pekerjaan" class="form-label">pekerjaan</label>
                            <select class="form-select" id="pekerjaan" name="pekerjaan" value="{{ old('pekerjaan') }}">
                                <option>Pilih pekerjaan</option>
                                <option value="Wiraswasta">Wiraswasta</option>
                                <option value="Mengurus Rumah Tangga">Mengurus Rumah Tangga</option>
                                <option value="Pelajar / Mahasiswa">Pelajar / Mahasiswa</option>
                                <option value="Belum / Tidak Bekerja">Belum / Tidak Bekerja</option>
                                <option value="Buruh Harian lepas">Buruh Harian lepas</option>
                                <option value="PEDAGANG">PEDAGANG</option>
                                <option value="Petani / Pekebun">Petani / Pekebun</option>
                            </select>
                            @error('pekerjaan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col col-md-5 col-sm-4 mb-4">
                            <label for="pendidikan" class="form-label">pendidikan</label>
                            <select class="form-select" id="pendidikan" name="pendidikan" value="{{ old('pendidikan') }}">
                                <option>Pilih pendidikan</option>
                                <option value="Tamatan SD">Tamatan SD</option>
                                <option value="SLTP / SEDERAJAT">SLTP / SEDERAJAT</option>
                                <option value="Tidak / Belum Sekolah">Tidak / Belum Sekolah</option>
                            </select>
                            @error('pendidikan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Tambah Data</button>
                </form>
            </div>
        </div>
    </div>
@endsection
