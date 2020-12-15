<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\KategoriKegiatan;

class KategorikegiatanController extends Controller
{
    //
    public function index(Request $req)
	{
        $tipe = $req->tipe? $req->tipe: 0;
        $konsinyasi = $req->konsinyasi? $req->konsinyasi: 0;

        $data = KategoriKegiatan::where(function($q) use ($req){
            $q->where('kategori_kegiatan_uraian', 'like', '%'.$req->cari.'%');
        })->paginate(10);
        $data->appends([$req->cari]);
        return view('backend.pages.kegiatan.kategorikegiatan.index', [
            'data' => $data,
            'i' => ($req->input('page', 1) - 1) * 10,
            'cari' => $req->cari,
        ]);
    }

	public function tambah(Request $req)
	{
        return view('backend.pages.kegiatan.kategorikegiatan.form', [
            'back' => Str::contains(url()->previous(), ['admin-area/kategorikegiatan/tambah', 'admin-area/kategorikegiatan/edit'])? '/admin-area/kategorikegiatan': url()->previous(),
            'aksi' => 'Tambah'
        ]);
    }

	public function simpan(Request $req)
	{
        $req->validate([
            'kategori_kegiatan_uraian' => 'required'
        ]);

        try{
            if ($req->get('ID')) {
                $data = KategoriKegiatan::findOrFail($req->get('ID'));
                $data->kategori_kegiatan_uraian = $req->get('kategori_kegiatan_uraian');
                $data->save();
            }else{
                $data = new KategoriKegiatan();
                $data->kategori_kegiatan_uraian = $req->get('kategori_kegiatan_uraian');
                $data->save();
            }
            return redirect($req->get('redirect')? $req->get('redirect'): 'admin-area/kategorikegiatan');
		}catch(\Exception $e){
            return redirect()->back()->withInput()->withErrors('Gagal Menyimpan Data. '.$e->getMessage());
        }
    }

	public function edit(Request $req)
	{
        return view('backend.pages.kegiatan.kategorikegiatan.form', [
            'data' => KategoriKegiatan::findOrFail($req->get('id')),
            'back' => Str::contains(url()->previous(), ['admin-area/kategorikegiatan/tambah', 'admin-area/kategorikegiatan/edit'])? '/admin-area/kategorikegiatan': url()->previous(),
            'aksi' => 'Edit'
        ]);
    }

	public function hapus(Request $req)
	{
		try{
            KategoriKegiatan::findOrFail($req->get('id'))->delete();
		}catch(\Exception $e){
            return redirect()->back()->withInput()->withErrors('Gagal Menghapus Data. '.$e->getMessage());
		}
	}
}
