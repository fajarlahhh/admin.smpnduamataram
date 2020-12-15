<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\KategoriBerita;

class KategoriberitaController extends Controller
{
    //
    public function index(Request $req)
	{
        $tipe = $req->tipe? $req->tipe: 0;
        $konsinyasi = $req->konsinyasi? $req->konsinyasi: 0;

        $data = KategoriBerita::where(function($q) use ($req){
            $q->where('kategori_berita_uraian', 'like', '%'.$req->cari.'%');
        })->paginate(10);
        $data->appends([$req->cari]);
        return view('backend.pages.berita.kategoriberita.index', [
            'data' => $data,
            'i' => ($req->input('page', 1) - 1) * 10,
            'cari' => $req->cari,
        ]);
    }

	public function tambah(Request $req)
	{
        return view('backend.pages.berita.kategoriberita.form', [
            'back' => Str::contains(url()->previous(), ['admin-area/kategoriberita/tambah', 'admin-area/kategoriberita/edit'])? '/kategoriberita': url()->previous(),
            'aksi' => 'Tambah'
        ]);
    }

	public function simpan(Request $req)
	{
        $req->validate([
            'kategori_berita_uraian' => 'required'
        ]);

        try{
            if ($req->get('ID')) {
                $data = KategoriBerita::findOrFail($req->get('ID'));
                $data->kategori_berita_uraian = $req->get('kategori_berita_uraian');
                $data->save();
            }else{
                $data = new KategoriBerita();
                $data->kategori_berita_uraian = $req->get('kategori_berita_uraian');
                $data->save();
            }
            return redirect($req->get('redirect')? $req->get('redirect'): 'admin-area/kategoriberita');
		}catch(\Exception $e){
            return redirect()->back()->withInput()->withErrors('Gagal Menyimpan Data. '.$e->getMessage());
        }
    }

	public function edit(Request $req)
	{
        return view('backend.pages.berita.kategoriberita.form', [
            'data' => KategoriBerita::findOrFail($req->get('id')),
            'back' => Str::contains(url()->previous(), ['admin-area/kategoriberita/tambah', 'admin-area/kategoriberita/edit'])? '/kategoriberita': url()->previous(),
            'aksi' => 'Edit'
        ]);
    }

	public function hapus(Request $req)
	{
		try{
            KategoriBerita::findOrFail($req->get('id'))->delete();
		}catch(\Exception $e){
            return redirect()->back()->withInput()->withErrors('Gagal Menghapus Data. '.$e->getMessage());
		}
	}
}
