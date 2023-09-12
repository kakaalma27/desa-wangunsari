@extends('layouts.editor')
@section('title', 'Table Masyarakat')
@section('main')
    <div class="container mt-2">
        @if(session('success'))
        <div class="alert alert-success mt-3" id="success-message">
            {{ session('success') }}
        </div>
        @endif
    
        <div class="card shadow">
            <div class="card-header">
                <span class="fs-4">List Masyarakat</span>
            </div>
            <div class="card-body">
                <a href="{{ route('masyarakat.create') }}" class="btn btn-primary">Tambah Data</a>
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <form action="{{ route('masyarakat.index') }}" method="GET" class="mb-3">
                            <label for="dusun_id" class="form-label">Pilih Dusun - RT</label>
                            <select class="form-control" id="dusun_id" name="dusun_id">
                                <option value="" disabled selected>Pilih Dusun - RT</option>
                                @foreach ($ListDusun as $apb)
                                    <option value="{{ $apb->id }}" {{ request('dusun_id') == $apb->id ? 'selected' : '' }}>
                                        {{ $apb->dusun }} - {{ $apb->rt }}
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
                </form>
                
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
                            <th>nama</th>
                            <th>jenis_kelamin</th>
                            <th>staus</th>
                            <th>tempat_lahir</th>
                            <th>tanggal_lahir</th>
                            <th>pekerjaan</th>
                            <th>pendidikan</th>
                            <th>aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($ListMasyarakat as $warga)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $warga->nama }}</td>
                                <td>{{ $warga->jenis_kelamin }}</td>
                                <td>{{ $warga->staus }}</td>
                                <td>{{ $warga->tempat_lahir }}</td>
                                <td>{{ $warga->tanggal_lahir }}</td>   
                                <td>{{ $warga->pekerjaan }}</td>
                                <td>{{ $warga->pendidikan }}</td>     
                                <td>
                                    <a href="{{ route('masyarakat.edit', $warga) }}" class="btn btn-sm btn-primary">Edit</a>
                                    <form action="{{ route('masyarakat.destroy', $warga) }}" method="post" style="display: inline-block;">
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
