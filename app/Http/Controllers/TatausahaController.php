<?php

namespace App\Http\Controllers;

use App\Models\TataUsaha;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class TatausahaController extends Controller
{
    //
    public function index(Request $req)
	{
        $data = TataUsaha::where(function($q) use ($req){
            $q->where('tata_usaha_pejabat', 'like', '%'.$req->cari.'%')->where('tata_usaha_jabatan', 'like', '%'.$req->cari.'%');
        })->paginate(10);
        $data->appends([$req->cari]);
        return view('backend.pages.profil.tatausaha.index', [
            'data' => $data,
            'i' => ($req->input('page', 1) - 1) * 10,
            'cari' => $req->cari,
        ]);
    }

	public function tambah(Request $req)
	{
        return view('backend.pages.profil.tatausaha.form', [
            'back' => Str::contains(url()->previous(), ['admin-area/tatausaha/tambah', 'admin-area/tatausaha/edit'])? '/admin-area/tatausaha': url()->previous(),
            'jabatan' => [
                'Kepala Tata Usaha Sekolah',
                'Urusan Kepegawaian & Persuratan',
                'Urusan Kesiswaan & Perpustakaan',
                'Urusan Keuangan',
                'Urusan Perlengkapan & Umum'
            ],
            'aksi' => 'Tambah'
        ]);
    }

	public function simpan(Request $req)
	{
        $req->validate([
            'tata_usaha_jabatan' => 'required',
            'tata_usaha_pejabat' => 'required'
        ]);

        try{
            if ($req->get('ID')) {
                $data = TataUsaha::findOrFail($req->get('ID'));
                $data->tata_usaha_jabatan = $req->get('tata_usaha_jabatan');
                $data->tata_usaha_pejabat = $req->get('tata_usaha_pejabat');
                $data->tata_usaha_pejabat_nip = $req->get('tata_usaha_pejabat_nip');

                if($req->file('tata_usaha_foto')){
                    File::delete(public_path($data->tata_usaha_foto));
                    $file = $req->file('tata_usaha_foto');

                    $ext = $file->getClientOriginalExtension();
                    $nama_file = time().Str::random().".".$ext;
                    $file->move(public_path('uploads/tatausaha'), $nama_file);
                    $data->tata_usaha_foto = '/uploads/tatausaha/'.$nama_file;
                }

                $data->save();
            }else{
                $file = $req->file('tata_usaha_foto');

                $ext = $file->getClientOriginalExtension();
                $nama_file = time().Str::random().".".$ext;
                $file->move(public_path('uploads/tatausaha'), $nama_file);

                $data = new TataUsaha();
                $data->tata_usaha_jabatan = $req->get('tata_usaha_jabatan');
                $data->tata_usaha_pejabat = $req->get('tata_usaha_pejabat');
                $data->tata_usaha_pejabat_nip = $req->get('tata_usaha_pejabat_nip');
                $data->tata_usaha_foto = '/uploads/tatausaha/'.$nama_file;
                $data->save();
            }
            return redirect($req->get('redirect')? $req->get('redirect'): 'admin-area/tatausaha');
		}catch(\Exception $e){
            return redirect()->back()->withInput()->withErrors('Gagal Menyimpan Data. '.$e->getMessage());
        }
    }

	public function edit(Request $req)
	{
        return view('backend.pages.profil.tatausaha.form', [
            'data' => TataUsaha::findOrFail($req->get('id')),
            'back' => Str::contains(url()->previous(), ['admin-area/tatausaha/tambah', 'admin-area/tatausaha/edit'])? '/admin-area/tatausaha': url()->previous(),
            'jabatan' => [
                'Kepala Tata Usaha Sekolah',
                'Urusan Kepegawaian & Persuratan',
                'Urusan Kesiswaan & Perpustakaan',
                'Urusan Keuangan',
                'Urusan Perlengkapan & Umum'
            ],
            'aksi' => 'Edit'
        ]);
    }

	public function hapus(Request $req)
	{
		try{
            $data = TataUsaha::findOrFail($req->get('id'));
            File::delete(public_path($data->tata_usaha_foto));
            $data->delete();
		}catch(\Exception $e){
            return redirect()->back()->withInput()->withErrors('Gagal Menghapus Data. '.$e->getMessage());
		}
	}
}
