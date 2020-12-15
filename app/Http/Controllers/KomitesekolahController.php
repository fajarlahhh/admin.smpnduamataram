<?php

namespace App\Http\Controllers;

use App\Models\Profil;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class KomitesekolahController extends Controller
{
    //
	public function index(Request $req)
	{
        return view('backend.pages.profil.komitesekolah.form', [
            'data' => Profil::where('profil_jenis', 'Komite Sekolah')->get()->first(),
            'aksi' => 'Tambah'
        ]);
    }


	public function simpan(Request $req)
	{
        $req->validate([
            'profil_uraian' => 'required'
        ]);

        try{

            $lama = Profil::where('profil_jenis', 'Komite Sekolah')->first();
            $data = new Profil();
            if($req->file('profil_gambar')){
                if ($lama) {
                    File::delete(public_path($lama->profil_gambar));
                }
                $file = $req->file('profil_gambar');
                $ext = $file->getClientOriginalExtension();
                $nama_file = time().Str::random().".".$ext;
                $file->move(public_path('uploads/profil'), $nama_file);
                $data->profil_gambar = '/uploads/profil/'.$nama_file;
            }else{
                $data->profil_gambar = $lama->profil_gambar;
            }
            if ($lama) {
                $lama->delete();
            }

            $data->profil_uraian = $req->get('profil_uraian');
            $data->profil_jenis = 'Komite Sekolah';
            $data->save();
            return redirect('admin-area/komitesekolah');
		}catch(\Exception $e){
            return redirect()->back()->withInput()->withErrors('Gagal Menyimpan Data. '.$e->getMessage());
        }
    }
}
