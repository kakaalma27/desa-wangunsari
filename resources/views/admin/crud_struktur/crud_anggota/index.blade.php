@extends('layouts.admin')
@section('title', 'List Struktur Anggota')
@section('main')
    <div class="container mt-2">
        <div class="card">
            <div class="card-body">
                <h2>List Anggota Struktur</h2>
                <a href="{{ route('anggota.create') }}" class="btn btn-primary">Tambah Data</a>
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <form action="{{ route('anggota.index') }}" method="GET" class="mb-3">
                            <label for="strukturs_id" class="form-label">Pilih Struktur Desa</label>
                            <select class="form-control" id="strukturs_id" name="strukturs_id">
                                <option value="" disabled selected>Pilih Struktur Desa</option>
                                @foreach ($ListStruktur as $Struktur)
                                    <option value="{{ $Struktur->id }}" {{ request('strukturs_id') == $Struktur->id ? 'selected' : '' }}>
                                        {{ $Struktur->nama }} - {{ $Struktur->deskripsi }}
                                    </option>
                                @endforeach
                            </select>
                    </div>
                    <div class="col-md-6">
                            <label class="d-none d-md-block">&nbsp;</label>
                            <button type="submit" class="btn btn-primary">Filter</button>
                        </form>
                    </div>
                </div>
                
                
                
                <table class="table mt-3">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>nip</th>
                            <th>jataban</th>
                            <th>tupoksi</th>
                            <th>image</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($ListAnggota as $anggota)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $anggota->nama }}</td>
                                <td>{{ $anggota->nip }}</td>
                                <td>{{ $anggota->jataban }}</td>
                                <td>{{ Str::limit($anggota['tupoksi'], 180) }}</td>
                                <td>
                                    @if ($anggota->image)
                                        <img src="{{ asset('storage/' . $anggota->image) }}" alt="Image" style="max-width: 100px;">
                                    @else
                                        No image
                                    @endif
                                </td> 
                                <td>
                                    <a href="{{ route('anggota.edit', $anggota) }}" class="btn btn-sm btn-primary">Edit</a>
                                    <form action="{{ route('anggota.destroy', $anggota) }}" method="post" style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
