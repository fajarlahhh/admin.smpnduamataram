<?php

namespace App\Http\Controllers;

use App\Models\Fasilitas;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class FasilitasController extends Controller
{
    //
    public function index(Request $req)
	{
        $data = Fasilitas::where(function($q) use ($req){
            $q->where('fasilitas_judul', 'like', '%'.$req->cari.'%');
        })->paginate(10);
        $data->appends([$req->cari]);
        return view('backend.pages.datasekolah.fasilitas.index', [
            'data' => $data,
            'i' => ($req->input('page', 1) - 1) * 10,
            'cari' => $req->cari,
        ]);
    }

	public function tambah(Request $req)
	{
        return view('backend.pages.datasekolah.fasilitas.form', [
            'back' => Str::contains(url()->previous(), ['admin-area/fasilitas/tambah', 'admin-area/fasilitas/edit'])? '/admin-area/fasilitas': url()->previous(),
            'aksi' => 'Tambah',
        ]);
    }

	public function simpan(Request $req)
	{
        $req->validate([
            'fasilitas_judul' => 'required'
        ]);

        try{
            $file = $req->file('fasilitas_gambar');

            $ext = $file->getClientOriginalExtension();
            $nama_file = time().Str::random().".".$ext;
            $file->move(public_path('uploads/fasilitas'), $nama_file);

            $data = new Fasilitas();
            $data->fasilitas_judul = $req->get('fasilitas_judul');
            $data->fasilitas_kategori = $req->get('fasilitas_kategori');
            $data->fasilitas_gambar = '/uploads/fasilitas/'.$nama_file;
            $data->save();
            return redirect($req->get('redirect')? $req->get('redirect'): 'admin-area/fasilitas');
		}catch(\Exception $e){
            return redirect()->back()->withInput()->withErrors('Gagal Menyimpan Data. '.$e->getMessage());
        }
    }

	public function hapus(Request $req)
	{
		try{
            $data = Fasilitas::findOrFail($req->get('id'));
            File::delete(public_path($data->fasilitas_gambar));
            $data->delete();
		}catch(\Exception $e){
            return redirect()->back()->withInput()->withErrors('Gagal Menghapus Data. '.$e->getMessage());
		}
	}
}
