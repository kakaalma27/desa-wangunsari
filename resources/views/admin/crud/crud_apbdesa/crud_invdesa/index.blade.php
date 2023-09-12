@extends('layouts.admin')
@section('main')
    <div class="container mt-2">
        <div class="card">
            <div class="card-body">
                <h2>Daftar Perangkat Desa</h2>
                <a href="{{ route('invdesa.create') }}" class="btn btn-primary">Tambah Data</a>
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <form action="{{ route('invdesa.index') }}" method="GET" class="mb-3">
                            <label for="apb_id" class="form-label">Pilih APB Desa</label>
                            <select class="form-control" id="apb_id" name="apb_id">
                                <option value="" disabled selected>Pilih APB Desa</option>
                                @foreach ($APBDESA as $apb)
                                    <option value="{{ $apb->id }}" {{ request('apb_id') == $apb->id ? 'selected' : '' }}>
                                        {{ $apb->kategori }} - {{ $apb->judul }}
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
                            <th>kode</th>
                            <th>nup</th>
                            <th>merek</th>
                            <th>tahun</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($INVList as $investaris)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $investaris->nama }}</td>
                                <td>{{ $investaris->kode }}</td>
                                <td>{{ $investaris->nup }}</td>
                                <td>{{ $investaris->merek }}</td>
                                <td>{{ $investaris->tahun }}</td>   
                                <td>
                                    <a href="{{ route('invdesa.edit', $investaris) }}" class="btn btn-sm btn-primary">Edit</a>
                                    <form action="{{ route('invdesa.destroy', $investaris) }}" method="post" style="display: inline-block;">
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
