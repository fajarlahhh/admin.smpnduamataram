<?php

namespace App\Http\Controllers;

use App\Models\Posting;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PostingController extends Controller
{
    //
    public function informasi(Request $req)
	{
        $data = Posting::where(function($q) use ($req){
            $q->where('posting_judul', 'like', '%'.$req->cari.'%');
        })->paginate(10);
        $data->appends([$req->cari]);
        return view('backend.pages.ruangbelajar.informasi.index', [
            'data' => $data,
            'i' => ($req->input('page', 1) - 1) * 10,
            'cari' => $req->cari,
        ]);
    }

    public function modulbelajar(Request $req)
	{
        $data = Posting::where(function($q) use ($req){
            $q->where('posting_judul', 'like', '%'.$req->cari.'%');
        })->where('posting_jenis', 'modulbelajar')->paginate(10);
        $data->appends([$req->cari]);
        return view('backend.pages.ruangbelajar.modulbelajar.index', [
            'data' => $data,
            'i' => ($req->input('page', 1) - 1) * 10,
            'cari' => $req->cari,
        ]);
    }

    public function jadwalbelajar(Request $req)
	{
        $data = Posting::where(function($q) use ($req){
            $q->where('posting_judul', 'like', '%'.$req->cari.'%');
        })->where('posting_jenis', 'jadwalbelajar')->paginate(10);
        $data->appends([$req->cari]);
        return view('backend.pages.ruangbelajar.jadwalbelajar.index', [
            'data' => $data,
            'i' => ($req->input('page', 1) - 1) * 10,
            'cari' => $req->cari,
        ]);
    }

	public function tambah_informasi(Request $req)
	{
        return view('backend.pages.ruangbelajar.informasi.form', [
            'back' => url()->previous(),
            'aksi' => 'Tambah'
        ]);
    }

	public function edit_informasi(Request $req)
	{
        return view('backend.pages.ruangbelajar.informasi.form', [
            'data' => Posting::findOrFail($req->get('id')),
            'back' => url()->previous(),
            'aksi' => 'Edit'
        ]);
    }

	public function tambah_jadwalbelajar(Request $req)
	{
        return view('backend.pages.ruangbelajar.jadwalbelajar.form', [
            'back' => url()->previous(),
            'aksi' => 'Tambah'
        ]);
    }

	public function edit_jadwalbelajar(Request $req)
	{
        return view('backend.pages.ruangbelajar.jadwalbelajar.form', [
            'data' => Posting::findOrFail($req->get('id')),
            'back' => url()->previous(),
            'aksi' => 'Edit'
        ]);
    }

	public function tambah_modulbelajar(Request $req)
	{
        return view('backend.pages.ruangbelajar.modulbelajar.form', [
            'back' => url()->previous(),
            'kelas' => ['VII', 'VIII', 'IX'],
            'aksi' => 'Tambah'
        ]);
    }

	public function edit_modulbelajar(Request $req)
	{
        return view('backend.pages.ruangbelajar.modulbelajar.form', [
            'data' => Posting::findOrFail($req->get('id')),
            'kelas' => ['VII', 'VIII', 'IX'],
            'back' => url()->previous(),
            'aksi' => 'Edit'
        ]);
    }

	public function simpan(Request $req)
	{
        $req->validate([
            'posting_judul' => 'required'
        ]);

        try{
            if ($req->get('ID')) {
                $data = Posting::findOrFail($req->get('ID'));
                $data->posting_judul = $req->get('posting_judul');
                $data->posting_uraian = $req->get('posting_uraian');
                $data->posting_jenis = $req->get('posting_jenis');
                $data->posting_kriteria = $req->get('posting_kriteria');

                if($req->file('posting_file')){
                    File::delete(public_path($data->posting_file));
                    $file = $req->file('posting_file');

                    $ext = $file->getClientOriginalExtension();
                    $nama_file = time().Str::random().".".$ext;
                    $file->move(public_path('uploads/posting'), $nama_file);
                    $data->posting_file = '/uploads/posting/'.$nama_file;
                }

                $data->save();
            }else{
                $data = new Posting();
                $file = $req->file('posting_file');
                if($file){
                    $ext = $file->getClientOriginalExtension();
                    $nama_file = time().Str::random().".".$ext;
                    $file->move(public_path('uploads/posting'), $nama_file);
                    $data->posting_file = '/uploads/posting/'.$nama_file;
                }

                $data->posting_jenis = $req->get('posting_jenis');
                $data->posting_judul = $req->get('posting_judul');
                $data->posting_uraian = $req->get('posting_uraian');
                $data->posting_kriteria = $req->get('posting_kriteria');
                $data->save();
            }
            return redirect($req->get('redirect')? $req->get('redirect'): 'dashboard');
		}catch(\Exception $e){
            return redirect()->back()->withInput()->withErrors('Gagal Menyimpan Data. '.$e->getMessage());
        }
    }

	public function hapus(Request $req)
	{
		try{
            $data = Posting::findOrFail($req->get('id'));
            File::delete(public_path($data->posting_file));
            $data->delete();
		}catch(\Exception $e){
            return redirect()->back()->withInput()->withErrors('Gagal Menghapus Data. '.$e->getMessage());
		}
	}
}
