@extends('layout.movieLayout')
@section('title','Tampil Movie')
@section('menuTampil','active')

@section('content')

<div class="container text-center mt-3 p-1 bg-white">
    <h1 class="mb-5">Daftar Movies</h1>
    <div class="album py bg-light">
      <div class="container">

        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

          @forelse ($movies as $movie)
          <div class="col">
            <div class="card text-center">
                <video height="225" controls="controls autoplay">
                    <source src="storage/uploads/{{$movie->namaFile}}">
                </video>

              <div class="card-body">
                <p>{{$movie->judul}} ({{$movie->tahun}})</p>

                  <div class="btn-group">
                    <button type="button" class="btn btn-sm btn-outline-secondary">Informasi Detail</button>
                  </div>

              </div>
            </div>
          </div>
          @empty
          <div class="alert alert-info center-block" style="width: 100%;" role="alert">
              <strong>Data Kosong! </strong>Silahkan Tambahakan Data Movie Baru...
          </div>
          @endforelse

        </div>
      </div>
    </div>
  </div>

@endsection
