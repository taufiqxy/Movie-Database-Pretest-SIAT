@extends('layout.movieLayout')
@section('title','Hapus Movie')
@section('menuHapus','active')

@section('content')
<div class="container mt-3">
    <div class="row">
        <div class="col-12">
            <div class="py-4">
                <h2>Tabel Movie</h2>
            </div>

            <hr>
            @if(session()->has('pesan'))
            <div class="alert alert-success" role="alert">
            {{ session()->get('pesan')}}
            </div>
            @endif

            <table class="table table-striped">
            <thead>
            <tr>
            <th>#ID</th>
            <th>Judul</th>
            <th>Tahun</th>
            <th>Genre</th>
            <th>Rating</th>
            <th>Sinopsis</th>
            <th>Nama File</th>
            </tr>
            </thead>

            <tbody>
            @forelse ($movies as $movie)
            <tr>
            <th>{{$loop->iteration}}</th>
            <td>{{$movie->judul}}</td>
            <td>{{$movie->tahun}}</td>
            <td>{{$movie->genre}}</td>
            <td>{{$movie->rating}}</td>
            <td>{{$movie->sinopsis}}</td>
            <td>{{$movie->namaFile}}</td>
            <td><a href="/{{ $movie->id }}/edit-movie" class="btn btn-primary">Update</a></td>
            <td>
                <form method="POST" action="/hapus-movie/{{ $movie->id }}">
                @method('DELETE')
                @csrf
                <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
            </td>
            </tr>
            @empty
            <td colspan="6" class="text-center">Tidak Kosong, Silahkan tambah data movie</td>
            @endforelse
            </tbody>

            </table>
        </div>
    </div>
</div>

@endsection
