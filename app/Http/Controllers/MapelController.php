<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Mapel;

class MapelController extends Controller
{
    //
    public function index(Request $req)
	{
        $tipe = $req->tipe? $req->tipe: 0;
        $konsinyasi = $req->konsinyasi? $req->konsinyasi: 0;

        $data = Mapel::where(function($q) use ($req){
            $q->where('mapel_nama', 'like', '%'.$req->cari.'%');
        })->paginate(10);
        $data->appends([$req->cari]);
        return view('backend.pages.datamaster.mapel.index', [
            'data' => $data,
            'i' => ($req->input('page', 1) - 1) * 10,
            'cari' => $req->cari,
        ]);
    }

	public function tambah(Request $req)
	{
        return view('backend.pages.datamaster.mapel.form', [
            'back' => Str::contains(url()->previous(), ['admin-area/mapel/tambah', 'admin-area/mapel/edit'])? '/admin-area/mapel': url()->previous(),
            'aksi' => 'Tambah'
        ]);
    }

	public function simpan(Request $req)
	{
        $req->validate([
            'mapel_nama' => 'required'
        ]);

        try{
            if ($req->get('ID')) {
                $data = Mapel::findOrFail($req->get('ID'));
                $data->mapel_nama = $req->get('mapel_nama');
                $data->save();
            }else{
                $data = new Mapel();
                $data->mapel_nama = $req->get('mapel_nama');
                $data->save();
            }
            return redirect($req->get('redirect')? $req->get('redirect'): 'admin-area/mapel');
		}catch(\Exception $e){
            return redirect()->back()->withInput()->withErrors('Gagal Menyimpan Data. '.$e->getMessage());
        }
    }

	public function edit(Request $req)
	{
        return view('backend.pages.datamaster.mapel.form', [
            'data' => Mapel::findOrFail($req->get('id')),
            'back' => Str::contains(url()->previous(), ['admin-area/mapel/tambah', 'admin-area/mapel/edit'])? '/admin-area/mapel': url()->previous(),
            'aksi' => 'Edit'
        ]);
    }

	public function hapus(Request $req)
	{
		try{
            Mapel::findOrFail($req->get('id'))->delete();
		}catch(\Exception $e){
            return redirect()->back()->withInput()->withErrors('Gagal Menghapus Data. '.$e->getMessage());
		}
	}
}
