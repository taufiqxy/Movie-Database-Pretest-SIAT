@extends('layout.movieLayout')
@section('title','Tambah Movie')

@section('content')
<div class="container pt-4 bg-white">
    <div class="row">
        <div class="col-md-8 col-xl-6">
            <h1>Perbarui Movie</h1>

            <hr>
            @if(session()->has('pesan'))
            <div class="alert alert-success" role="alert">
            {{ session()->get('pesan')}}
            </div>
            @endif

            <form action="/update-movie/{{$movie->id}}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="mb-3">
                    <label class="form-label" for="judul">Judul Movie</label>
                    <input type="text" id="judul" name="judul" value="{{ $movie->judul }}"
                    class="form-control @error('judul') is-invalid @enderror">
                    @error('judul')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label" for="tahun">Tahun</label>
                    <select class="form-select" name="tahun" id="tahun">
                        <script>
                            let max = new Date().getFullYear();
                            select = document.getElementById('tahun');

                            for (let i = max; i>=2010; i--){
                                let opt = document.createElement('option');
                                opt.value = i;
                                opt.innerHTML = i;
                                if(i == {{$movie->tahun}}){
                                    opt.selected = 'selected';
                                }
                                select.appendChild(opt);
                            }
                        </script>
                    </select>
                    @error('tahun')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label" for="genre">Genre</label>
                    <select class="form-select" name="genre" id="genre"
                        value="{{ old('genre') }}">
                        <option value="Aksi"
                        {{ $movie->genre=='Aksi' ? 'selected': '' }} >
                        Aksi
                        </option>
                        <option value="Komedi"
                        {{ $movie->genre=='Komedi' ? 'selected': '' }} >
                        Komedi
                        </option>
                        <option value="Drama"
                        {{ $movie->genre=='Drama' ? 'selected': '' }} >
                        Drama
                        </option>
                        <option value="Fiksi Ilmiah"
                        {{ $movie->genre=='Fiksi Ilmiah' ? 'selected': '' }} >
                        Fiksi Ilmiah
                        </option>
                        <option value="Pertualangan"
                        {{ $movie->genre=='Pertualangan' ? 'selected': '' }} >
                        Pertualangan
                        </option>
                        <option value="Misteri"
                        {{ $movie->genre=='Misteri' ? 'selected': '' }} >
                        Misteri
                        </option>
                        <option value="Horor"
                        {{ $movie->genre=='Horor' ? 'selected': '' }} >
                        Horor
                        </option>
                        <option value="Dokumenter"
                        {{ $movie->genre=='Dokumenter' ? 'selected': '' }} >
                        Dokumenter
                        </option>
                    </select>
                    @error('genre')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label" for="rating">Rating</label>
                    <input type="text" id="rating" name="rating" value="{{ $movie->rating }}"
                    class="form-control @error('rating') is-invalid @enderror">
                    @error('rating')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label" for="sutradara">Sutradara</label>
                    <input type="text" id="sutradara" name="sutradara" value="{{ $movie->sutradara }}"
                    class="form-control @error('sutradara') is-invalid @enderror">
                    @error('sutradara')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label" for="sinopsis">Sinopsis</label>
                    <textarea class="form-control" id="sinopsis" rows="3"
                    name="sinopsis">{{ $movie->sinopsis }}</textarea>
                    @error('sinopsis')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="berkas" class="form-label">File Video</label>
                    <input type="file" class="form-control" id="berkas" name="berkas">
                    @error('berkas')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary mb-2">Perbarui Sekarang</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
