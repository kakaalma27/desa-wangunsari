<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title')</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <link rel="icon" href="{{ asset('img/logo.png') }}" type="image/x-icon">
  <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
  @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
  <div class="container-fluid">
    <div class="row flex-nowrap">
      <div class="bg-dark col-auto col-md-2 min-vh-100 d-flex flex-column justify-content-between">
        <div class="bg-dark p-2">
          <a href="/admin/home" class="d-flex text-decoration-none mt-1 align-items-center text-white">
            <span class="fs-4 ms-3 d-none d-sm-inline">Admin <span class="text-warning">Wangunsari</span></span>
          </a>
          <ul class="nav nav-pills flex-column mt-4">
            <li class="nav-item py-2 py-sm-0">
              <a href="/admin/beritadesa" class="nav-link text-white">
                <i class="fs-4 bi bi-chat-right-text"></i></i></i><span class="fs-5 ms-3 d-none d-sm-inline">Input Berita</span>
              </a>
            </li>
            <li class="nav-item py-2 py-sm-0">
              <a href="/admin/agenda" class="nav-link text-white">
                <i class="fs-4 bi bi-people-fill"></i></i><span class="fs-5 ms-3 d-none d-sm-inline">Input Kegiatan</span>
              </a>
            </li>
            <li class="nav-item py-2 py-sm-0">
              <a href="/admin/umkm" class="nav-link text-white">
                <i class="fs-4 bi bi-cart-plus"></i></i><span class="fs-5 ms-3 d-none d-sm-inline">Input Umkm</span>
              </a>
            </li>
            <li class="nav-item py-2 py-sm-0 dropdown">
              <a class="nav-link text-white fs-5 ms-3 d-none d-sm-inline dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                </i> Pemerintahan
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="/admin/perangkatdesa">Perangkat Desa</a></li>
                <li><a class="dropdown-item" href="/admin/beritadesa">Karang Taruna</a></li>
                <li><a class="dropdown-item" href="#">Posyandu</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="/admin/struktur">Stuktur Organisasi</a></li>
              </ul>
            </li>
          </ul>
        </div>
        <div class="dropdown open p-3">
          <button class="btn border-none dropdown-toggle text-light" type="button" id="triggerId" data-bs-toggle="dropdown" aria-haspopup="true"
              aria-expanded="false">
              <i class="fs-4 bi bi-person"></i><span class="fs-4 ms-2">{{ Auth::user()->name }}</span>
              </button>
          <div class="dropdown-menu" aria-labelledby="triggerId">
            <button class="dropdown-item" href="#">Setting</button>
            <a class="dropdown-item" href="{{ route('logout') }}"
            onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">
             {{ __('Logout') }}
         </a>

         <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
             @csrf
         </form>
          </div>
        </div>
      </div>
      <div class="col">
        <nav class="navbar navbar-expand-lg bg-body-tertiary p-3">
          <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <form class="d-flex" role="search">
                @csrf
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
              </form>
            </div>
          </div>
        </nav>
        <div class="container mt-4 ">
          <div class="row justify-content-center">
            <div class="col-md">
              @yield('main')
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
  <script>
    setTimeout(function() {
        document.getElementById('success-message').style.display = 'none';
    }, 5000); // 5000 milliseconds = 5 seconds
</script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>
