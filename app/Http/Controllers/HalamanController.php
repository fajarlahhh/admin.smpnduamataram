<?php

namespace App\Http\Controllers;

use App\Models\Halaman;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class HalamanController extends Controller
{
    //
	public function fasilitassekolah(Request $req)
	{
        return view('backend.pages.datasekolah.fasilitassekolah.form', [
            'data' => Halaman::find('fasilitassekolah'),
            'aksi' => 'Tambah'
        ]);
    }

	public function denahsekolah(Request $req)
	{
        return view('backend.pages.datasekolah.denahsekolah.form', [
            'data' => Halaman::find('denahsekolah'),
            'aksi' => 'Tambah'
        ]);
    }

	public function kontak(Request $req)
	{
        return view('backend.pages.kontak.form', [
            'data' => Halaman::find('kontak'),
            'aksi' => 'Tambah'
        ]);
    }

	public function simpan(Request $req)
	{
        try{
            $halaman_gambar =  null;
            $data = Halaman::find($req->get('halaman_jenis'));
            if($data){
                $data->delete();
                File::delete(public_path($data->halaman_gambar));
            }
            if($req->file('halaman_gambar')){
                $file = $req->file('halaman_gambar');

                $ext = $file->getClientOriginalExtension();
                $nama_file = time().Str::random().".".$ext;
                $file->move(public_path('uploads/halaman'), $nama_file);
                $halaman_gambar = '/uploads/halaman/'.$nama_file;
            }

            $data = new Halaman();
            $data->halaman_uraian = $req->get('halaman_uraian');
            $data->halaman_judul = $req->get('halaman_judul');
            $data->halaman_jenis = $req->get('halaman_jenis');
            $data->halaman_gambar = $halaman_gambar;
            $data->save();
            return redirect()->back();
		}catch(\Exception $e){
            return redirect()->back()->withInput()->withErrors('Gagal Menyimpan Data. '.$e->getMessage());
        }
    }
}
