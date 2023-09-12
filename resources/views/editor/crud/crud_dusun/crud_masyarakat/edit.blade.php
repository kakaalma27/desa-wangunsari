@extends('layouts.editor')
@section('title', 'Edit Masyarakat')
@section('main')
    <div class="container">
        <div class="card shadow">
            <div class="card-header">
                <p class="fs-4 fw-normal">Edit Masyarakat</p>
            </div>
            <div class="card-body">
                <form action="{{ route('masyarakat.update', $masyarakat->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row g-2 d-flex justify-content-center"">
                        <div class="col col-md-5 col-sm-4  mb-4">
                            <label for="nama" class="form-label">nama</label>
                            <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ old('nama', $masyarakat->nama) }}">
                            @error('nama')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col col-md-5 col-sm-4  mb-4">
                            <label for="jenis_kelamin" class="form-label">jenis kelamin</label>
                            <select class="form-select" id="jenis_kelamin" name="jenis_kelamin">
                                <option value="Laki-Laki" {{ $masyarakat->jenis_kelamin === 'Laki-Laki' ? 'selected' : '' }}>Laki-Laki</option>
                                <option value="Perempuan" {{ $masyarakat->jenis_kelamin === 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                            </select>
                            
                        </div>
                        <div class="col col-md-5 col-sm-4  mb-4">
                            <label for="staus" class="form-label">Status</label>
                            <select class="form-select" id="staus" name="staus">
                                <option value="Kawin" @if(old('staus', $masyarakat->staus) == 'Kawin') selected @endif>Kawin</option>
                                <option value="Belum" @if(old('staus', $masyarakat->staus) == 'Belum') selected @endif>Belum</option>
                            </select>
                            @error('staus')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="col col-md-5 col-sm-4  mb-4">
                            <label for="tempat" class="form-label">Tempat Lahir</label>
                            <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror" id="tempat_lahir" name="tempat_lahir" value="{{ old('tempat_lahir', $masyarakat->tempat_lahir) }}">
                            @error('tempat_lahir')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col col-md-5 col-sm-4 mb-4">
                            <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                            <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" id="tanggal_lahir" name="tanggal_lahir" value="{{ old('tanggal_lahir', $masyarakat->tanggal_lahir ?? '') }}">
                            @error('tanggal_lahir')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="col col-md-5 col-sm-4 mb-4">
                            <label for="pekerjaan" class="form-label">Pekerjaan</label>
                            <select class="form-select @error('pekerjaan') is-invalid @enderror" id="pekerjaan" name="pekerjaan">
                                <option value="">Pilih pekerjaan</option>
                                <option value="Wiraswasta" {{ old('pekerjaan', $masyarakat->pekerjaan) === 'Wiraswasta' ? 'selected' : '' }}>Wiraswasta</option>
                                <option value="Mengurus Rumah Tangga" {{ old('pekerjaan', $masyarakat->pekerjaan) === 'Mengurus Rumah Tangga' ? 'selected' : '' }}>Mengurus Rumah Tangga</option>
                                <option value="Pelajar / Mahasiswa" {{ old('pekerjaan', $masyarakat->pekerjaan) === 'Pelajar / Mahasiswa' ? 'selected' : '' }}>Pelajar / Mahasiswa</option>
                                <option value="Belum / Tidak Bekerja" {{ old('pekerjaan', $masyarakat->pekerjaan) === 'Belum / Tidak Bekerja' ? 'selected' : '' }}>Belum / Tidak Bekerja</option>
                                <option value="Buruh Harian lepas" {{ old('pekerjaan', $masyarakat->pekerjaan) === 'Buruh Harian lepas' ? 'selected' : '' }}>Buruh Harian lepas</option>
                                <option value="PEDAGANG" {{ old('pekerjaan', $masyarakat->pekerjaan) === 'PEDAGANG' ? 'selected' : '' }}>PEDAGANG</option>
                                <option value="Petani / Pekebun" {{ old('pekerjaan', $masyarakat->pekerjaan) === 'Petani / Pekebun' ? 'selected' : '' }}>Petani / Pekebun</option>
                            </select>
                            @error('pekerjaan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="col col-md-5 col-sm-4 mb-4">
                            <label for="pendidikan" class="form-label">Pendidikan</label>
                            <select class="form-select @error('pendidikan') is-invalid @enderror" id="pendidikan" name="pendidikan">
                                <option value="">Pilih pendidikan</option>
                                <option value="Tamatan SD" {{ old('pendidikan', $masyarakat->pendidikan) === 'Tamatan SD' ? 'selected' : '' }}>Tamatan SD</option>
                                <option value="SLTP / SEDERAJAT" {{ old('pendidikan', $masyarakat->pendidikan) === 'SLTP / SEDERAJAT' ? 'selected' : '' }}>SLTP / SEDERAJAT</option>
                                <option value="Tidak / Belum Sekolah" {{ old('pendidikan', $masyarakat->pendidikan) === 'Tidak / Belum Sekolah' ? 'selected' : '' }}>Tidak / Belum Sekolah</option>
                            </select>
                            @error('pendidikan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </form>
            </div>
        </div>
    </div>
@endsection
