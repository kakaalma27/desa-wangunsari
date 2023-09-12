@extends('layouts.app')
@section('title', 'Desa Wangunsari')
@section('main')
<section class="bg-dark text-light p-5 p-lg-0 pt-lg-5 text-center text-sm-start">
    <div class="container">
      <div class="d-sm-flex align-items-center justify-content-between">
        <div>
          <h1>Desa <span class="text-warning"> Wangunsari </span></h1>
          <p class="lead my-4">
            Dengan adanya website desa wangunsari ini kami berharap agar warga desa wangunsari lebih cepat dan lebih akurat untuk mendapatkan informasi.
          </p>
          {{-- <button
            class="btn btn-primary btn-lg"
            data-bs-toggle="modal"
            data-bs-target="#enroll"
          >
            Start The Enrollment
          </button> --}}
        </div>
        <img
          class="img-fluid w-50 d-none d-sm-block"
          src="img/showcase.svg"
          alt=""
        />
      </div>
    </div>
  </section>
  <section class="p-5">
    <div class="container">
      <div class="row text-center g-4">
        <div class="col-md">
          <div class="card bg-dark text-light">
            <div class="card-body text-center">
              <div class="h1 mb-3">
                <i class="bi bi-laptop"></i>
              </div>
              <p class="card-title mb-3 fs-3">Layanan Masyarakat</p>
              <p class="card-text fw-normal fs-6">
                Kami Siap Melayani dan Memberikan Informasi Kepada Warga Desa Wangunsari Secara Online.
              </p>
              <a href="/person" class="btn btn-primary">Read More</a>
            </div>
          </div>
        </div>
        <div class="col-md">
          <div class="card bg-secondary text-light">
            <div class="card-body text-center">
              <div class="h1 mb-3">
                <svg xmlns="http://www.w3.org/2000/svg" width="44" height="44" fill="currentColor" class="bi bi-activity" viewBox="0 0 16 16">
                  <path fill-rule="evenodd" d="M6 2a.5.5 0 0 1 .47.33L10 12.036l1.53-4.208A.5.5 0 0 1 12 7.5h3.5a.5.5 0 0 1 0 1h-3.15l-1.88 5.17a.5.5 0 0 1-.94 0L6 3.964 4.47 8.171A.5.5 0 0 1 4 8.5H.5a.5.5 0 0 1 0-1h3.15l1.88-5.17A.5.5 0 0 1 6 2Z"/>
                </svg>
              </div>
              <p class="card-title mb-3 fs-3">Potensi Desa</p>
              <p class="card-text fw-normal fs-6">
                Potensi desa mencakup beragam aspek yang dapat berkontribusi pada pertumbuhan dan kesejahteraan masyarakat.
              </p>
              <a href="/potensi" class="btn btn-dark">Read More</a>
            </div>
          </div>
        </div>
        <div class="col-md">
          <div class="card bg-dark text-light">
            <div class="card-body text-center">
              <div class="h1 mb-3">
                <i class="bi bi-people"></i>
              </div>
              <h3 class="card-title mb-3">In Person</h3>
              <p class="card-text fw-normal fs-6">
                Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                Iure, quas quidem possimus dolorum esse eligendi?
              </p>
              <a href="#" class="btn btn-primary">Read More</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="bg-dark text-light p-5 text-center text-sm-start">
    <p class="fs-3 fw-bolder fw-normal ps text-center mb-4"> Berita Desa Wangunsari </p>
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
                                <p>{{ Str::limit($berita['deskripsi'], 140) }}</p> 
                                <div class="text-center">                    
                                    <a href="/berita/{{ $berita->id }}" type="button" class="btn btn-dark">Lihat Selengkapnya</a>  
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
</section>


  <section id="questions" class="p-5">
    <div class="container">
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
  </section>



  
@endsection
