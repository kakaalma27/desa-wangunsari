@extends('layouts.app')
@section('title', 'Struktur Karang Taruna')
@section('main')
<section class="p-5 bg-dark">
    <div class="container">
      <div class="text-center">
        <h2 class="text-light fw-bold text-uppercase">Struktur Karang Taruna</h2>
        <img src="{{ asset('img/taruna.png') }}" class="img-fluid">
        <div class="row justify-content-start">
          @foreach ($ListAnggota as $index => $item) 
          <div class="col-md-6 col-lg-3">            
              <div class="card mt-5 bg-secondary">
                  <div class="card-body text-center text-light">
                    @if ($item->image)
                      <img src="{{ asset('storage/' . $item->image) }}" class="card-img-top rounded-circle mb-3" height="240" width="380" alt="...">
                    @else
                      <img src="{{ asset('https://cdn-icons-png.flaticon.com/512/4086/4086679.png') }}" class="card-img-top rounded-circle mb-3" height="240" width="380" alt="Default Image">
                    @endif
                
                    <h6 class="card-title fw-bold">{{ $item['nama'] }}</h6>
                      <p>{{ $item['nipd'] }}</p>
                      <p>{{ Str::limit($item['tupoksi'], 60) }}</p>
                      <!-- Button trigger modal -->
                      <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $index }}">
                          Read More
                  </button>
                  </div>
              </div>
          </div>
          @endforeach
        </div>
      </div>
    </div>
</section>
@endsection