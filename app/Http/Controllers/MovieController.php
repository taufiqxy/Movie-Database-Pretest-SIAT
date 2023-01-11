<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function tampilMovie() {
        return view('tampilMovie');
    }

    public function tambahMovie() {
        return view('tambahMovie');
    }

    public function hapusMovie() {
        return view('hapusMovie');
    }

    public function storeMovie(Request $request) {
        $validateData = $request->validate([
            'judul' => 'required',
            'tahun' => 'required|integer|min:2010',
            'genre' => 'required|in:Aksi,Komedi,Drama,Fiksi Ilmiah,Horor,Dokumenter',
            'rating' => 'required|integer|between:0,10',
            'sinopsis' => 'required',
            'berkas' => 'required|file|mimetypes:video/mp4,video/avi,video/mpeg,video/quicktime,
                        video/x-matroska,video/x-ms-wmv',
        ]);

        //Movie::create($validateData);
        //return "Berhasil menambahkan!";
        dump($request);
    }

    public function deleteMovie() {
        return 'movie berhasil dihapus';
    }
}
