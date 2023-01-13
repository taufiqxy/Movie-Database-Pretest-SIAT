@extends('layout.movieLayout')
@section('title','Tampil Movie')

@section('content')

<div class="container mt-3 p-1 bg-white">
    <h1 class="mb-3">Detail {{ $movie->judul }} ({{$movie->tahun}})</h1>
    <hr>
    <div class="album py-2 bg-light">
      <div class="container">

        <ul>
            <li>Judul       : {{$movie->judul}} </li>
            <li>Tahun       : {{$movie->tahun}} </li>
            <li>Genre       : {{$movie->genre}} </li>
            <li>Rating      : {{$movie->rating}} </li>
            <li>Sutradara   : {{$movie->sutradara}} </li>
            <li>Sinopsis    : {{$movie->sinopsis}} </li>
        </ul>

      </div>
    </div>
  </div>

@endsection
