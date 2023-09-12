@extends('layouts.app')
@section('title', 'Potensi Desa')
@section('main')
<section class="p-5">
    <div class="container">
        <div class="row">
            <div class="col-md">
                <div class="card mt-3">
                    <div class="card-header bg-secondary text-light">
                        <span class="fs-4">Informasi Potensi</span>
                    </div>
                    <div class="card-body">
                        <span class="fs-5">Potensi ini mencakup berbagai aspek yang dapat memengaruhi perkembangan dan keberlanjutan desa, termasuk sumber daya alam, sumber daya manusia, ekonomi, sosial, budaya, infrastruktur, dan banyak lagi. </span>
                    </div>
                </div>

            </div>
        </div>
        <ul class="nav nav-tabs mt-3">
            <li class="nav-item">
                @if(request()->is('penduduk'))
                    <a class="nav-link text-decoration-none text-dark active bg-secondary" data-bs-toggle="tab" data-bs-target="#tab-penduduk" href="#penduduk" aria-expanded="true">Potensi Penduduk</a>
                @else
                    <a class="nav-link text-decoration-none text-dark" data-bs-toggle="tab" data-bs-target="#tab-penduduk" href="#penduduk" aria-expanded="true" >Potensi Penduduk</a>
                @endif
            </li>
            <li class="nav-item">
                @if(request()->is('wilayah'))
                    <a class="nav-link text-decoration-none text-dark active bg-body-secondary" data-bs-toggle="tab" data-bs-target="#tab-wilayah" href="#wilayah">Potensi Wilayah</a>
                @else
                    <a class="nav-link text-decoration-none text-dark" data-bs-toggle="tab" data-bs-target="#tab-wilayah" href="#wilayah" aria-expanded="true">Potensi Wilayah</a>
                @endif
            </li>
            <li class="nav-item">
                @if(request()->is('umkm'))
                    <a class="nav-link text-decoration-none text-dark active bg-body-secondary" data-bs-toggle="tab" data-bs-target="#tab-umkm" href="#umkm">Potensi UMKM</a>
                @else
                    <a class="nav-link text-decoration-none text-dark" data-bs-toggle="tab" data-bs-target="#tab-umkm" href="#umkm" aria-expanded="true">Potensi UMKM</a>
                @endif
            </li>
        </ul>
        

          <div class="tab-content">
            <div class="tab-pane active {{ request()->is('penduduk') ? 'show active' : '' }}" id="tab-penduduk">
                <div class="card">
                    <div class="card-body">
                            <div class="row justify-content-center">
                                <div class="col-4 mb-3">
                                    <div class="card">
                                        <div class="card-header bg-dark text-light">
                                            <span class="fs-4">Jumlah Penduduk</span>
                                        </div>
                                        <div class="card-body text-center">
                                            <p class="fs-2">{{ $TotalPenduduk }} </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4 mb-3">
                                    <div class="card">
                                        <div class="card-header bg-secondary text-light">
                                            <span class="fs-4">Laki-Laki</span>
                                        </div>
                                        <div class="card-body text-center">
                                            <p class="fs-2"> {{ $JumlahLakiLaki }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4 mb-3">
                                    <div class="card">
                                        <div class="card-header">
                                            <span class="fs-4">Perempuan</span>
                                        </div>
                                        <div class="card-body text-center">
                                            <p class="fs-2">{{ $JumlahPerempuan }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-md-8 col-md-offset-2 bordered p-xl mt-xl">
                                    <div id="columnchart_material" style="width: 800px; height: 500px;"></div>
                                    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                                    <script type="text/javascript">
                                        google.charts.load('current', {'packages':['bar']});
                                        google.charts.setOnLoadCallback(drawChart);
                            
                                        function drawChart() {
                                            var data = google.visualization.arrayToDataTable([
                                                ['Jumlah Penduduk', 'Laki-Laki', 'Perempuan'],
                                                [{{ $TotalPenduduk }}, {{ $JumlahLakiLaki }}, {{ $JumlahPerempuan }}],
                                            ]);
                            
                                            var options = {
                                                chart: {
                                                    // title: 'Company Performance',
                                                    // subtitle: 'Sales, Expenses, and Profit: 2014-2017',
                                                }
                                            };
                            
                                            var chart = new google.charts.Bar(document.getElementById('columnchart_material'));
                            
                                            chart.draw(data, google.charts.Bar.convertOptions(options));
                                        }
                                    </script>
                                </div>
                                <div class="col">
                                    <form class="d-flex" action="#" method="GET">
                                        @csrf
                                        <input class="form-control me-3" type="search" name="query" placeholder="Masukkan NIK / Nama">
                                        <button class="btn btn-outline-success" type="submit">Search</button>
                                    </form>
                                    @if(isset($results))
                                    @if($results->count() > 0)
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>NIK</th>
                                                    <th>Nama</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($results->take(10) as $result)
                                                <tr>
                                                        <td>{{ substr_replace($result->nik, '*****', 6, 5) }}</td>
                                                        <td>{{ $result->nama }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    @else
                                        <p>Tidak ditemukan hasil pencarian.</p>
                                    @endif
                                @endif
                                    
                                </div>
                            </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade {{ request()->is('wilayah') ? 'show active' : '' }}" id="tab-wilayah">
                <div class="card">
                    <div class="card-body">
                        <p class="fw-bold text-dark fs-4 text-uppercase text-center">Potensi Wilayah</p>
                        <div class="row row-cols-2 row-cols-lg-2 g-2 g-lg-3">
                            <div class="col-md">
                                <div class="card ">
                                    <div class="card-header bg-dark text-light"><p class="fw-semibold fs-5">A. Letak dan Luas Wilayah</p></div>
                                    <div class="card-body">
                                        <p class="fw-medium fs-6">Desa Wangunsari merupakan salah satu desa dari 8 desa yang ada di Kecamatan Bantarlong Kabupaten Tasikmalaya dengan luas wilayah 1.304,000 Ha yang masuk kedalam klasifikiasi Desa swakarya dengan Tipologi Persawahan , dengan batas-batas wilayah : <br>
                                            Sebelah Utara berbatasan dengan  Desa Sukabakti <br>
                                            Sebelah Selatan berbatasan dengan Desa Cipicung <br>
                                            Sebelah Timur berbatasan dengan Desa Pamijahan <br>
                                            Sebelah Barat berbatasan dengan Desa Sukabakti <br>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="card">
                                    <div class="card-header bg-dark text-light">
                                        <p class="fw-semibold fs-5">B. Iklim</p>
                                    </div>
                                    <div class="card-body">
                                        <p class="fw-medium fs-6">
                                            Iklim Desa Wangunsari mempunyai dua iklim yaitu kemarau dan penghujan, hal tersebut mempunyai pengaruh langsung terhadap pola bercocok tanam masyarakat yang ada di Desa Wangunsari Kecamatan Bantarkalong yang mayoritas mata pencaharian penduduk adalah buruh tani dengan komoditi unggulan berdasarkan luas panen dan nilai produksi adalah padi sawah.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="card">
                                    <div class="card-header bg-dark text-light">
                                        <p class="fw-semibold fs-5">C. Orbitasi</p>
                                    </div>
                                    <div class="card-body">
                                        <p class="fw-medium fs-6">
                                            - Jarak ke Ibu Kota Kecamatan (Km) 17,000 <br>
                                            - Waktu Tempuh dengan Kendaraan Bermotor (Jam) 1,00 <br>
                                            - Kendaraan Umum ke Ibu Kota Kecamatan (Unit) 80,0000 <br>
                                            - Waktu Tempuh dengan Kendaraan Bermotor (Jam) 3,00<br>
                                            - Waktu Tempuh dengan Berjalan Kaki/Kendaraan Non Bermotor (Jam) 24,00<br>
                                            - Kendaraan Umum Ke Ibu Kota Kabupaten/Kota (Unit) 4<br>
                                            - Jarak Ke Ibu Kota Provinsi (Km) 147,0000<br>
                                            - Waktu Tempuh dengan Kendaraan Bermotor (Jam) 6,00<br>
                                            - Waktu Tempuh dengan Berjalan Kaki/Kendaraan Non Bermotor (Jam) 72,00<br>
                                            - Kendaraan Umum ke Ibu kota Provinsi (Unit) 2<br>

                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade {{ request()->is('umkm') ? 'show active' : '' }}" id="tab-umkm">
                <div class="row justify-content-start">
                    @foreach ($Umkmlist as $umkm)
                    <div class="col-md-4">                        
                        <div class="card mt-2" style="border: none;">
                            <div class="card-body">
                                <img src="{{ asset('storage/' . $umkm->image) }}" class="card-img-top" height="280">
                                <p class="fs-5 text-uppercase fw-normal text-center">{{$umkm->judul}}</p>
                                <p class="fs-6 fw-normal text-center text-wrap lh-sm">{{{ Str::limit($umkm['deskripsi'], 140) }}}
                            </div>
                                <button type="button" class="btn btn-dark btn-md" onclick="redirectToWhatsApp('{{$umkm->nohp}}')">Hubungi Penjual</button>
                            </div>
                    </div>    
                    @endforeach
                </div>                    
            </div>
            
          </div>
    </div>
</section>
<script>
    function redirectToWhatsApp(phoneNumber) {
        // Remove all non-digit characters from the phone number
        phoneNumber = phoneNumber.replace(/\D/g, '');
    
        // Create a WhatsApp link with the phone number
        var whatsappLink = "https://api.whatsapp.com/send?phone=" + phoneNumber;
    
        // Open the WhatsApp link in a new tab or window
        window.open(whatsappLink, '_blank');
    }
    </script>
@endsection