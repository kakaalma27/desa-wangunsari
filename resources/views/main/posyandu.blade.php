@extends('layouts.app')
@section('title', 'Struktur Posyandu')
@section('main')
<section class="p-5 bg-dark">
    <div class="container">
      <div class="text-center">
        <h2 class="text-light fw-bold text-uppercase">Struktur Posyandu</h2>
        <div class="row justify-content-between">
            <div class="col-md-8">
                <h3 class="text-light fw-bold text-uppercase">Bongas</h3>
                <img src="{{ asset('img/taruna.png') }}" class="img-fluid zoomable-image">
            </div>
            <div class="col-md">
                <h3 class="text-light fw-bold text-uppercase">Ciranini</h3>
                <img src="{{ asset('img/ciranini.png') }}" class="img-fluid zoomable-image">
            </div>
            <div class="col-md">
                <h3 class="text-light fw-bold text-uppercase">Wangunsari</h3>
                <img src="{{ asset('img/wangunsari.png') }}" class="img-fluid zoomable-image">
            </div>
            <div class="col-md">
                <h3 class="text-light fw-bold text-uppercase">Cijeruk</h3>
                <img src="{{ asset('img/cijeruk.png') }}" class="img-fluid zoomable-image">
            </div>
            <div class="col-md">
                <h3 class="text-light fw-bold text-uppercase">Ciwalet</h3>
                <img src="{{ asset('img/ciwalet.png') }}" class="img-fluid zoomable-image">
            </div>
            <div class="col-md">
                <h3 class="text-light fw-bold text-uppercase">Lembursawah</h3>
                <img src="{{ asset('img/lembursawah.png') }}" class="img-fluid zoomable-image">
            </div>
            <div class="col-md">
                <h3 class="text-light fw-bold text-uppercase">Weninggalih</h3>
                <img src="{{ asset('img/weninggalih.png') }}" class="img-fluid zoomable-image">
            </div>
            <div class="col-md">
                <h3 class="text-light fw-bold text-uppercase">Cigaru</h3>
                <img src="{{ asset('img/cigaru.png') }}" class="img-fluid zoomable-image">
            </div>
        </div>
      </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
          const zoomableImages = document.querySelectorAll(".zoomable-image");
      
          zoomableImages.forEach((image) => {
            let zoomLevel = 1;
      
            image.addEventListener("click", function () {
              if (zoomLevel === 1) {
                zoomLevel = 1.5;
              } else {
                zoomLevel = 1;
              }
      
              image.style.transform = `scale(${zoomLevel})`;
            });
          });
        });
      </script>
      
</section>
@endsection