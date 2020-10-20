<?php

namespace App\Http\Controllers;

use App\Models\Kontak;
use Illuminate\Http\Request;

class KontakController extends Controller
{
    //
	public function index(Request $req)
	{
        return view('pages.kontak.form', [
            'data' => Kontak::first(),
            'aksi' => 'Tambah'
        ]);
    }


	public function simpan(Request $req)
	{
        $req->validate([
            'kontak_uraian' => 'required'
        ]);

        try{

            $lama = Kontak::query()->truncate();
            $data = new Kontak();
            $data->kontak_uraian = $req->get('kontak_uraian');
            $data->save();
            return redirect('kontak');
		}catch(\Exception $e){
            return redirect()->back()->withInput()->withErrors('Gagal Menyimpan Data. '.$e->getMessage());
        }
    }
}
