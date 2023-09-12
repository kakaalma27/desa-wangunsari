@extends('layouts.app')
@section('title', 'Detail Berita')
@section('main')
<section class="text-dark py-5">
    <div class="container-sm">
        <div class="mb-3 align-items-center ps-3 pe-2">
            <p class="fs-2 mt-2 text-center py-3">{{ $berita->judul }}</p>
            <p class="text-md-start fs-4 fw-normal lh-base">{{ $berita->deskripsi }}</p>
        </div>
    </div>
</section>
@endsection
