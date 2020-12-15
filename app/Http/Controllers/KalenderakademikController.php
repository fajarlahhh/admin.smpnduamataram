<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\KalenderAkademik;

class KalenderakademikController extends Controller
{
    //
    public function index(Request $req)
	{
        $file = $req->file? $req->file: 'semua';

        $data = KalenderAkademik::where(function($q) use ($req){
            $q->where('kalender_akademik_uraian', 'like', '%'.$req->cari.'%');
        })->orderBy('kalender_akademik_mulai')->paginate(10);
        $data->appends([$req->cari, $req->file]);
        return view('backend.pages.akademik.kalenderakademik.index', [
            'data' => $data,
            'i' => ($req->input('page', 1) - 1) * 10,
            'cari' => $req->cari,
            'file' => $req->file,
        ]);
    }

	public function tambah(Request $req)
	{
        return view('backend.pages.akademik.kalenderakademik.form', [
            'back' => Str::contains(url()->previous(), ['admin-area/kalenderakademik/tambah', 'admin-area/kalenderakademik/edit'])? '/kalenderakademik': url()->previous(),
            'aksi' => 'Tambah'
        ]);
    }

	public function simpan(Request $req)
	{
        $req->validate([
            'kalender_akademik_uraian' => 'required'
        ]);

        try{
			$tanggal = explode(' - ', $req->get('kalender_akademik_tanggal'));
            $data = new KalenderAkademik();
            $data->kalender_akademik_mulai = date('Y-m-d', strtotime($tanggal[0]));
            $data->kalender_akademik_selesai = date('Y-m-d', strtotime($tanggal[1]));
            $data->kalender_akademik_tanggal = $req->get('kalender_akademik_tanggal');
            $data->kalender_akademik_uraian = $req->get('kalender_akademik_uraian');
            $data->save();
            return redirect($req->get('redirect')? $req->get('redirect'): 'admin-area/kalenderakademik');
		}catch(\Exception $e){
            return redirect()->back()->withInput()->withErrors('Gagal Menyimpan Data. '.$e->getMessage());
        }
    }

	public function hapus(Request $req)
	{
		try{
            $data = KalenderAkademik::findOrFail($req->get('id'))->delete();
		}catch(\Exception $e){
            return redirect()->back()->withInput()->withErrors('Gagal Menghapus Data. '.$e->getMessage());
		}
	}
}
