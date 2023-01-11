<!DOCTYPE html>
<html lang="en">
<head>
    <title>@yield('title')</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="favicon.png" />
</head>

<body>
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        <div class="container">
            <ul class="navbar-nav">
            <li class="nav-item">
            <a class="nav-link @yield('menuTampil')" href="/tampil-movie">Daftar Movie</a>
            </li>
            <li class="nav-item">
            <a class="nav-link @yield('menuTambah')" href="/tambah-movie">Tambahkan Movie</a>
            </li>
            <li class="nav-item">
            <a class="nav-link @yield('menuHapus')" href="/hapus-movie">Hapus Movie</a>
            </li>
            </ul>
        </div>
    </nav>

    @yield('content')

    <footer class="bg-dark py-4 text-white mt-4">
    <div class="container">
    Movie Database | by Taufiq Hidayat
    </div>
    </footer>
</body>
</html>
