<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\KategoriBerita;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class BeritaController extends Controller
{
    //
    public function frontend(Request $req)
    {
        if ($req->id) {
            return view('pages.berita.baca', [
                'data' => Berita::with('kategori')->where('berita_id', $req->id)->first(),
                'terbaru' => Berita::with('kategori')->orderBy('created_at', 'desc')->limit(3)->get(),
                'kategori' => KategoriBerita::with('berita')->get()
            ]);
        }else if ($req->kategori) {
            return view('pages.berita.index', [
                'data' => Berita::with('kategori')->whereHas('kategori', function ($q) use($req)
                {
                    $q->where('kategori_berita_id', $req->kategori);
                })->first()
            ]);
        }else if ($req->cari) {
            return view('pages.berita.index', [
                'data' => Berita::with('kategori')->where('berita_judul', 'like', '%'.$req->cari.'%')->get()
            ]);
        }else{
            return view('pages.berita.index', [
                'data' => Berita::with('kategori')->orderBy('created_at', 'desc')->limit(6)->get()
            ]);
        }
    }

    public function index(Request $req)
	{
        $data = Berita::with('kategori')->where(function($q) use ($req){
            $q->where('berita_judul', 'like', '%'.$req->cari.'%');
        })->paginate(10);
        $data->appends([$req->cari]);
        return view('backend.pages.berita.data.index', [
            'data' => $data,
            'i' => ($req->input('page', 1) - 1) * 10,
            'cari' => $req->cari,
        ]);
    }

	public function tambah(Request $req)
	{
        return view('backend.pages.berita.data.form', [
            'back' => Str::contains(url()->previous(), ['admin-area/berita/tambah', 'admin-area/berita/edit'])? '/admin-area/berita': url()->previous(),
            'kategori' => KategoriBerita::all(),
            'aksi' => 'Tambah'
        ]);
    }

	public function simpan(Request $req)
	{
        $req->validate([
            'berita_judul' => 'required'
        ]);

        try{
            if ($req->get('ID')) {
                $data = Berita::findOrFail($req->get('ID'));
                $data->berita_judul = $req->get('berita_judul');
                $data->berita_isi = $req->get('berita_isi');
                $data->kategori_berita_id = $req->get('kategori_berita_id');

                if($req->file('berita_gambar')){
                    File::delete(public_path($data->berita_gambar));
                    $file = $req->file('berita_gambar');

                    $ext = $file->getClientOriginalExtension();
                    $nama_file = time().Str::random().".".$ext;
                    $file->move(public_path('uploads/berita'), $nama_file);
                    $data->berita_gambar = '/uploads/berita/'.$nama_file;
                }

                $data->save();
            }else{
                $file = $req->file('berita_gambar');

                $ext = $file->getClientOriginalExtension();
                $nama_file = time().Str::random().".".$ext;
                $file->move(public_path('uploads/berita'), $nama_file);

                $data = new Berita();
                $data->berita_judul = $req->get('berita_judul');
                $data->berita_isi = $req->get('berita_isi');
                $data->berita_gambar = '/uploads/berita/'.$nama_file;
                $data->berita_author = Auth::user()->pengguna_nama;
                $data->kategori_berita_id = $req->get('kategori_berita_id');
                $data->save();
            }
            return redirect($req->get('redirect')? $req->get('redirect'): 'admin-area/berita');
		}catch(\Exception $e){
            return redirect()->back()->withInput()->withErrors('Gagal Menyimpan Data. '.$e->getMessage());
        }
    }

	public function edit(Request $req)
	{
        return view('backend.pages.berita.data.form', [
            'data' => Berita::findOrFail($req->get('id')),
            'back' => Str::contains(url()->previous(), ['admin-area/berita/tambah', 'admin-area/berita/edit'])? '/berita': url()->previous(),
            'kategori' => KategoriBerita::all(),
            'aksi' => 'Edit'
        ]);
    }

	public function hapus(Request $req)
	{
		try{
            $data = Berita::findOrFail($req->get('id'));
            File::delete(public_path($data->berita_gambar));
            $data->delete();
		}catch(\Exception $e){
            return redirect()->back()->withInput()->withErrors('Gagal Menghapus Data. '.$e->getMessage());
		}
	}
}
