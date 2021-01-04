<?php

namespace App\Http\Controllers;

use App\Models\Alumni;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class AlumniController extends Controller
{
    //
    public function frontend(Request $req)
    {
        $data = Alumni::all();
        return view('frontend.pages.datasekolah.alumni', [
            'data' => $data,
            'i' => ($req->input('page', 1) - 1) * 10
        ]);
    }

    public function index(Request $req)
    {
        $data = Alumni::where(function($q) use ($req){
            $q->where('alumni_keterangan', 'like', '%'.$req->cari.'%');
        })->paginate(10);
        $data->appends([$req->cari,$req->kelas]);
        return view('backend.pages.datasekolah.alumni.index', [
            'data' => $data,
            'i' => ($req->input('page', 1) - 1) * 10,
            'cari' => $req->cari,
        ]);
    }

	public function tambah(Request $req)
	{
        return view('backend.pages.datasekolah.alumni.form', [
            'back' => Str::contains(url()->previous(), ['admin-area/alumni/tambah'])? '/admin-area/alumni': url()->previous(),
            'aksi' => 'Tambah'
        ]);
    }

	public function simpan(Request $req)
	{
        $req->validate([
            'alumni_keterangan' => 'required'
        ]);

        try{
            $file = $req->file('alumni_file');

            $ext = $file->getClientOriginalExtension();
            $nama_file = time().Str::random().".".$ext;
            $file->move(public_path('uploads/alumni'), $nama_file);

            $data = new Alumni();
            $data->alumni_keterangan = $req->get('alumni_keterangan');
            $data->alumni_file = '/uploads/alumni/'.$nama_file;
            $data->save();
            return redirect($req->get('redirect')? $req->get('redirect'): 'admin-area/alumni');
		}catch(\Exception $e){
            return redirect()->back()->withInput()->withErrors('Gagal Menyimpan Data. '.$e->getMessage());
        }
    }

	public function hapus(Request $req)
	{
		try{
            $data = Alumni::findOrFail($req->get('id'));
            File::delete(public_path($data->alumni_file));
            $data->delete();
		}catch(\Exception $e){
            return redirect()->back()->withInput()->withErrors('Gagal Menghapus Data. '.$e->getMessage());
		}
	}
}
