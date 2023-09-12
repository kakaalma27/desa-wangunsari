@extends('layouts.admin')
@section('title', 'Admin Dashboard')
@section('main')
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body bg-dark text-light">
                        <p class="fs-4">Berita Desa</p>
                        <span class="fs-2">{{ $BeritaCount }}</span>
                    </div>
                    <div class="card-footer">
                        <a class="text-muted text-decoration-none" href="/admin/beritadesa">Lihat Selengkapnya</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body bg-secondary text-light">
                        <p class="fs-4">Agenda Kegiatan</p>
                        <span class="fs-2">{{ $AgendaCount }}</span>
                    </div>
                    <div class="card-footer">
                        <a class="text-muted text-decoration-none" href="/admin/beritadesa">Lihat Selengkapnya</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body bg-dark text-light">
                        <p class="fs-4">Umkm</p>
                        <span class="fs-2">{{ $UmkmCount }}</span>
                    </div>
                    <div class="card-footer">
                        <a class="text-muted text-decoration-none" href="/admin/beritadesa">Lihat Selengkapnya</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="card mt-3">
            <div class="card-header">
                <p class="fs-3 fw-normal text-center">Sistem Monitoring</p>
            </div>
            <div class="card-body">
                <section id="berita">
                    <div class="row g-3">
                        <div class="col-md">
                            <p class="fs-3 fw-bolder fw-normal ps text-center mb-4">Berita Desa </p>
                            <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
                                    <div class="carousel-inner">
                                        @foreach ($BeritaList->chunk(3) as $index => $beritaChunk)
                                        <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                                            <div class="row justify-content-center g-lg-3">
                                                @foreach ($beritaChunk as $berita)
                                                <div class="col-md-4">
                                                    <div class="card shadow rounded" style="border: none;">
                                                        @if ($berita->image)
                                                            <img src="{{ asset('storage/' . $berita->image) }}" width="120" height="240" class="card-img-top" alt="Image">
                                                        @else
                                                            No image
                                                        @endif
                                                        <div class="card-body text-dark">
                                                            <h5 class="card-title text-center">{{ $berita->judul }}</h5>
                                                            <p>{{ Str::limit($berita['deskripsi'], 120) }}</p> 
                                                            <div class="text-center">                    
                                                                <a href="/berita/{{ $berita->id }}" type="button" class="btn btn-dark">Lihat Selengkapnya</a>    
                                                                <a href="{{ route('beritadesa.edit', $berita) }}" class="btn btn-danger">Edit</a>
                                                            </div> 
                                                        </div>
                                                    </div>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                    <a class="carousel-control-prev" href="#carouselExample" role="button" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#carouselExample" role="button" data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Next</span>
                                    </a>
                            </div>
                        </div>
    
                    </div>
                </section>
                <section id="questions" class="mt-4">
                        <div class="card shadow rounded" style="border: none;">
                            <div class="card-body">
                                <p class="fs-3 fw-bolder fw-normal ps text-center mb-4"> Agenda Kegiatan </p>
                                <div class="accordion accordion-flush" id="questions">
                                  <!-- Item 1 -->
                                  @foreach ($AgendaList as $agenda)            
                                  <div class="accordion-item">
                                    <h2 class="accordion-header">
                                      <button
                                        class="accordion-button collapsed"
                                        type="button"
                                        data-bs-toggle="collapse"
                                        data-bs-target="#question-one"
                                      >
                                      <p style="font-size: 16px;">{{ $agenda['judul']}}</p>
                                      </button>
                                    </h2>
                                    <div
                                      id="question-one"
                                      class="accordion-collapse collapse"
                                      data-bs-parent="#questions"
                                    >
                                      <div class="accordion-body">
                                        <p style="font-size: 16px;">{{ $agenda['deskripsi'] }}</p>
                                        <p style="font-size: 16px;">{{ $agenda['waktu'] }}</p>
                          
                                      </div>
                                    </div>
                                  </div>
                                  @endforeach
                                </div>
                                
                        </div>
                    </div>
                </section>
            </div>
        </div>
@endsection
