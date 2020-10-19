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
    public function index(Request $req)
	{
        $data = Berita::where(function($q) use ($req){
            $q->where('berita_judul', 'like', '%'.$req->cari.'%');
        })->paginate(10);
        $data->appends([$req->cari]);
        return view('pages.berita.index', [
            'data' => $data,
            'i' => ($req->input('page', 1) - 1) * 10,
            'cari' => $req->cari,
        ]);
    }

	public function tambah(Request $req)
	{
        return view('pages.berita.form', [
            'back' => Str::contains(url()->previous(), ['berita/tambah', 'berita/edit'])? '/berita': url()->previous(),
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
                $data->save();
            }
            return redirect($req->get('redirect')? $req->get('redirect'): 'berita');
		}catch(\Exception $e){
            return redirect()->back()->withInput()->withErrors('Gagal Menyimpan Data. '.$e->getMessage());
        }
    }

	public function edit(Request $req)
	{
        return view('pages.berita.form', [
            'data' => Berita::findOrFail($req->get('id')),
            'back' => Str::contains(url()->previous(), ['berita/tambah', 'berita/edit'])? '/berita': url()->previous(),
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
