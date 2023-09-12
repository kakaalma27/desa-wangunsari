@extends('layouts.app')
@section('title', 'Perangkat Desa')
@section('main')
<section class="p-5 bg-dark">
  <div class="container">
    <div class="text-center">
      <h2 class="text-light fw-bold text-uppercase">Struktur Perangkat Desa</h2>
      <img src="{{ asset('img/perangkat.png') }}" class="img-fluid"">
    </div>
    <div class="row justify-content-start">
          @foreach ($ListAnggota as $index => $item) 
          <div class="col-md-6 col-lg-3">            
              <div class="card mt-5 bg-secondary">
                  <div class="card-body text-center text-light">
                      <img src="{{ asset('storage/' . $item->image) }}" class="card-img-top rounded-circle mb-3"  height="240" width="380" alt="...">
                      <h6 class="card-title fw-bold">{{ $item['nama'] }}</h6>
                      <p>{{ $item['nipd'] }}</p>
                      <p>{{ Str::limit($item['tupoksi'], 60) }}</p>
                      <!-- Button trigger modal -->
                      <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $index }}">
                          Read More
                  </button>
                  </div>
                  <div class="modal fade" id="exampleModal{{ $index }}" tabindex="-1" aria-labelledby="exampleModalLabel{{ $index }}" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel{{ $index }}">{{ $item['jataban'] }}</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                              <p>{{ $item['tupoksi'] }}</p>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                          </div>
                        </div>
                      </div>
                    </div>
              </div>
          </div>    
          @endforeach
      </div>       
  </div>

</section>
@endsection