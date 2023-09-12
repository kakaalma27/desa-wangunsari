@extends('layouts.editor')
@section('title', 'Dashboard Editor')
@section('main')
<section>
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body bg-dark text-light">
                    <p class="fs-4">Total Dusun</p>
                    <span class="fs-2">{{ $Dusun }}</span>
                </div>
                <div class="card-footer">
                    <a class="text-muted text-decoration-none" href="/editor/Dusun">Lihat Selengkapnya</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body bg-secondary text-light">
                    <p class="fs-4">Total Masyrakat</p>
                    <span class="fs-2">{{ $Rt_dusun }}</span>
                </div>
                <div class="card-footer">
                    <a class="text-muted text-decoration-none" href="/editor/rt">Lihat Selengkapnya</a>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="mt-4">
    <div class="container">
        <div class="card">
            <div class="card-header text-center">
                <span class="fs-4">Sistem Monitoring Masyarakat</span>
            </div>
            <div class="card-body">
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
                                    [{{ $jumlahTotal }}, {{ $jumlahLakiLaki }}, {{ $jumlahPerempuan }}],
                                    // ['2015', 1170, 460, 250],
                                    // ['2016', 660, 1120, 300],
                                    // ['2017', 1030, 540, 350]
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
                                        <th>Nama</th>
                                        <th>Jenis Kelamin</th>
                                        <!-- Kolom lainnya -->
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($results->take(5) as $result)
                                    <tr>
                                            <td>{{ $result->nama }}</td>
                                            <td>{{ $result->jenis_kelamin }}</td>
                                            <!-- Kolom lainnya -->
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
</section>

@endsection