<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class MovieController extends Controller
{
    public function tampilMovie() {
        $movies = Movie::all();
        return view('tampilMovie', ['movies' => $movies]);
    }

    public function detailMovie($movie_id) {
        $a_movie = Movie::findOrFail($movie_id);
        return view('detailMovie', ['movie' => $a_movie]);
    }

    public function tambahMovie() {
        return view('tambahMovie');
    }

    public function editMovie($movie_id) {
        $result = Movie::findOrFail($movie_id);
        return view('editMovie', ['movie' => $result]);
    }

    public function updateHapusMovie() {
        $movies = Movie::all();
        return view('updateHapusMovie',['movies' => $movies]);
    }

    public function storeMovie(Request $request) {
        $validateData = $request->validate([
            'judul' => 'required',
            'tahun' => 'required|integer|min:2010',
            'genre' => 'required|in:Aksi,Komedi,Drama,Fiksi Ilmiah,Misteri,Horor,Dokumenter,Pertualangan',
            'rating' => 'required|integer|between:0,10',
            'sutradara' => 'required',
            'sinopsis' => 'required',
            'berkas' => 'required|file|mimetypes:video/mp4,video/avi,video/mpeg,video/quicktime,
                        video/x-matroska,video/x-ms-wmv,video/x-flv,video/x-msvideo,video/3gpp,video/MP2T,application/x-mpegURL,video/x-ms-asf',
        ]);

        // move video
        $slug = Str::slug($validateData['berkas']);
        $extFile = $request->berkas->getClientOriginalExtension();
        $namaFile = $slug.'-'.time().".".$extFile;
        $request->berkas->storeAs('public/uploads',$namaFile);

        // insert into database
        Movie::create([
            'judul' => $validateData['judul'],
            'tahun' => $validateData['tahun'],
            'genre' => $validateData['genre'],
            'rating' => $validateData['rating'],
            'sutradara' => $validateData['sutradara'],
            'sinopsis' => $validateData['sinopsis'],
            'namaFile' => $namaFile,
        ]);

        return redirect()->route('halaman.tambah')
            ->with('pesan',"Berhasil menambahkan movie ".$validateData['judul']);
    }

    public function updateMovie(Request $request, $movie_id) {
        $validateData = $request->validate([
            'judul' => 'required',
            'tahun' => 'required|integer|min:2010',
            'genre' => 'required|in:Aksi,Komedi,Drama,Fiksi Ilmiah,Misteri,Horor,Dokumenter,Pertualangan',
            'rating' => 'required|integer|between:0,10',
            'sutradara' => 'required',
            'sinopsis' => 'required',
            'berkas' => 'sometimes|file|mimetypes:video/mp4,video/avi,video/mpeg,video/quicktime,
                        video/x-matroska,video/x-ms-wmv,video/x-flv,video/x-msvideo,video/3gpp,video/MP2T,application/x-mpegURL,video/x-ms-asf',
        ]);

        $a_movie = Movie::findOrFail($movie_id);

        if ($request->hasFile('berkas')) {
            // move video ke directory
            $slug = Str::slug($validateData['berkas']);
            $extFile = $request->berkas->getClientOriginalExtension();
            $namaFile = $slug.'-'.time().".".$extFile;
            $request->berkas->storeAs('public/uploads',$namaFile);

            // hapus berkas lama
            File::delete(public_path('storage/uploads/').$a_movie->namaFile);
        } else {
            $namaFile = $a_movie->namaFile;
        }

        // update record database
        Movie::where('id',$a_movie->id)->update([
            'judul' => $validateData['judul'],
            'tahun' => $validateData['tahun'],
            'genre' => $validateData['genre'],
            'rating' => $validateData['rating'],
            'sutradara' => $validateData['sutradara'],
            'sinopsis' => $validateData['sinopsis'],
            'namaFile' => $namaFile,
        ]);

        return redirect()->route('halaman.edit',['movie_id'=>$a_movie->id])
            ->with('pesan',"Movie berhasil diperbarui");
    }

    public function deleteMovie(Movie $movie_id) {
        $movie = $movie_id; //$movie_id has become a record, it's renamed to prevent ambigitous

        // delete file first
        File::delete(public_path('storage/uploads/').$movie->namaFile);

        // delete record
        $movie->delete();

        return redirect()->route('halaman.update.hapus')
            ->with('pesan',"Movie dengan judul $movie->judul berhasil dihapus");
    }
}
