<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Models\PesertaDidik;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PesertadidikController extends Controller
{
    //
    public function index(Request $req)
    {
        $kelas = $req->kelas? $req->kelas: 'VII';
        $data = PesertaDidik::where('peserta_didik_kelas', $kelas)->where(function($q) use ($req){
            $q->where('peserta_didik_nama', 'like', '%'.$req->cari.'%');
        })->paginate(10);
        $data->appends([$req->cari,$req->kelas]);
        return view('backend.pages.datasekolah.pesertadidik.index', [
            'data' => $data,
            'i' => ($req->input('page', 1) - 1) * 10,
            'cari' => $req->cari,
            'kelas' => $kelas,
        ]);
    }

	public function tambah(Request $req)
	{
        return view('backend.pages.datasekolah.pesertadidik.form', [
            'back' => Str::contains(url()->previous(), ['admin-area/pesertadidik/tambah'])? '/admin-area/pesertadidik': url()->previous(),
            'kelas' => ['VII', 'VIII', 'IX'],
            'aksi' => 'Tambah'
        ]);
    }

	public function simpan(Request $req)
	{
        $req->validate([
            'peserta_didik_nama' => 'required'
        ]);

        try{
            $file = $req->file('peserta_didik_file');

            $ext = $file->getClientOriginalExtension();
            $nama_file = time().Str::random().".".$ext;
            $file->move(public_path('uploads/pesertadidik'), $nama_file);

            $data = new PesertaDidik();
            $data->peserta_didik_nama = $req->get('peserta_didik_nama');
            $data->peserta_didik_file = '/uploads/pesertadidik/'.$nama_file;
            $data->peserta_didik_kelas = $req->get('peserta_didik_kelas');
            $data->save();
            return redirect($req->get('redirect')? $req->get('redirect'): 'admin-area/pesertadidik');
		}catch(\Exception $e){
            return redirect()->back()->withInput()->withErrors('Gagal Menyimpan Data. '.$e->getMessage());
        }
    }

	public function hapus(Request $req)
	{
		try{
            $data = PesertaDidik::findOrFail($req->get('id'));
            File::delete(public_path($data->peserta_didik_file));
            $data->delete();
		}catch(\Exception $e){
            return redirect()->back()->withInput()->withErrors('Gagal Menghapus Data. '.$e->getMessage());
		}
	}
}
