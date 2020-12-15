<?php

namespace App\Http\Controllers;

use App\Models\Mapel;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\TenagaPendidik;

class TenagaPendidikController extends Controller
{
    //
    public function index(Request $req)
	{
        $kriteria = $req->kriteria? $req->kriteria: 'semua';
        $data = TenagaPendidik::where(function($q) use ($req){
            $q->where('tenaga_pendidik_nama', 'like', '%'.$req->cari.'%');
        });

        switch ($kriteria) {
            case 'PNS':
                $data = $data->where('tenaga_pendidik_kriteria', 'PNS');
                break;
            case 'Non PNS':
                $data = $data->where('tenaga_pendidik_kriteria', 'Non PNS');
                break;
        }

        $data = $data->paginate(10);
        $data->appends([$req->cari, $req->kriteria]);
        return view('backend.pages.datasekolah.tenagapendidik.index', [
            'data' => $data,
            'i' => ($req->input('page', 1) - 1) * 10,
            'cari' => $req->cari,
            'kriteria' => $req->kriteria,
        ]);
    }

	public function tambah(Request $req)
	{
        return view('backend.pages.datasekolah.tenagapendidik.form', [
            'back' => Str::contains(url()->previous(), ['admin-area/tenagapendidik/tambah', 'admin-area/tenagapendidik/edit'])? '/admin-area/tenagapendidik': url()->previous(),
            'mapel' => Mapel::all(),
            'kategori' => ['PNS', 'Non PNS'],
            'aksi' => 'Tambah'
        ]);
    }

	public function simpan(Request $req)
	{
        $req->validate([
            'tenaga_pendidik_nama' => 'required',
            'mapel_id' => 'required'
        ]);

        try{
            if ($req->get('ID')) {
                $data = TenagaPendidik::findOrFail($req->get('ID'));
                $data->tenaga_pendidik_nama = $req->get('tenaga_pendidik_nama');
                $data->mapel_id = $req->get('mapel_id');
                $data->tenaga_pendidik_kriteria = $req->get('tenaga_pendidik_kriteria');
                $data->save();
            }else{
                $data = new TenagaPendidik();
                $data->tenaga_pendidik_nama = $req->get('tenaga_pendidik_nama');
                $data->mapel_id = $req->get('mapel_id');
                $data->tenaga_pendidik_kriteria = $req->get('tenaga_pendidik_kriteria');
                $data->save();
            }
            return redirect($req->get('redirect')? $req->get('redirect'): 'admin-area/tenagapendidik');
		}catch(\Exception $e){
            return redirect()->back()->withInput()->withErrors('Gagal Menyimpan Data. '.$e->getMessage());
        }
    }

	public function edit(Request $req)
	{
        return view('backend.pages.datasekolah.tenagapendidik.form', [
            'data' => TenagaPendidik::findOrFail($req->get('id')),
            'mapel' => Mapel::all(),
            'back' => Str::contains(url()->previous(), ['admin-area/tenagapendidik/tambah', 'admin-area/tenagapendidik/edit'])? '/admin-area/tenagapendidik': url()->previous(),
            'kategori' => ['PNS', 'Non PNS'],
            'aksi' => 'Edit'
        ]);
    }

	public function hapus(Request $req)
	{
		try{
            $data = TenagaPendidik::findOrFail($req->get('id'))->delete();
		}catch(\Exception $e){
            return redirect()->back()->withInput()->withErrors('Gagal Menghapus Data. '.$e->getMessage());
		}
	}
}
