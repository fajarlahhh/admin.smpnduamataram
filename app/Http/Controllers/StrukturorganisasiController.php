<?php

namespace App\Http\Controllers;

use App\Models\StrukturOrganisasi;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class StrukturorganisasiController extends Controller
{
    //
    public function index(Request $req)
	{
        $data = StrukturOrganisasi::where(function($q) use ($req){
            $q->where('struktur_organisasi_pejabat', 'like', '%'.$req->cari.'%')->where('struktur_organisasi_jabatan', 'like', '%'.$req->cari.'%');
        })->paginate(10);
        $data->appends([$req->cari]);
        return view('backend.pages.profil.strukturorganisasi.index', [
            'data' => $data,
            'i' => ($req->input('page', 1) - 1) * 10,
            'cari' => $req->cari,
        ]);
    }

	public function tambah(Request $req)
	{
        return view('backend.pages.profil.strukturorganisasi.form', [
            'back' => Str::contains(url()->previous(), ['admin-area/strukturorganisasi/tambah', 'admin-area/strukturorganisasi/edit'])? '/admin-area/strukturorganisasi': url()->previous(),
            'jabatan' => [
                'Kepala Sekolah',
                'Kepala Komite',
                'Waka Kehumasan',
                'Waka Kesiswaan',
                'Waka Kurikulum',
                'Waka Sarpras',
                'Kepala Perpustakaan',
                'Kepala Lab. TIK',
                'Kepala Lab. IPA'
            ],
            'aksi' => 'Tambah'
        ]);
    }

	public function simpan(Request $req)
	{
        $req->validate([
            'struktur_organisasi_jabatan' => 'required',
            'struktur_organisasi_pejabat' => 'required'
        ]);

        try{
            if ($req->get('ID')) {
                $data = StrukturOrganisasi::findOrFail($req->get('ID'));
                $data->struktur_organisasi_jabatan = $req->get('struktur_organisasi_jabatan');
                $data->struktur_organisasi_pejabat = $req->get('struktur_organisasi_pejabat');
                $data->struktur_organisasi_pejabat_nip = $req->get('struktur_organisasi_pejabat_nip');
                $data->struktur_organisasi_urutan = $req->get('struktur_organisasi_urutan');

                if($req->file('struktur_organisasi_foto')){
                    File::delete(public_path($data->struktur_organisasi_foto));
                    $file = $req->file('struktur_organisasi_foto');

                    $ext = $file->getClientOriginalExtension();
                    $nama_file = time().Str::random().".".$ext;
                    $file->move(public_path('uploads/strukturorganisasi'), $nama_file);
                    $data->struktur_organisasi_foto = '/uploads/strukturorganisasi/'.$nama_file;
                }

                $data->save();
            }else{
                $file = $req->file('struktur_organisasi_foto');

                $ext = $file->getClientOriginalExtension();
                $nama_file = time().Str::random().".".$ext;
                $file->move(public_path('uploads/strukturorganisasi'), $nama_file);

                $data = new StrukturOrganisasi();
                $data->struktur_organisasi_jabatan = $req->get('struktur_organisasi_jabatan');
                $data->struktur_organisasi_pejabat = $req->get('struktur_organisasi_pejabat');
                $data->struktur_organisasi_pejabat_nip = $req->get('struktur_organisasi_pejabat_nip');
                $data->struktur_organisasi_urutan = $req->get('struktur_organisasi_urutan');
                $data->struktur_organisasi_foto = '/uploads/strukturorganisasi/'.$nama_file;
                $data->save();
            }
            return redirect($req->get('redirect')? $req->get('redirect'): 'admin-area/strukturorganisasi');
		}catch(\Exception $e){
            return redirect()->back()->withInput()->withErrors('Gagal Menyimpan Data. '.$e->getMessage());
        }
    }

	public function edit(Request $req)
	{
        return view('backend.pages.profil.strukturorganisasi.form', [
            'data' => StrukturOrganisasi::findOrFail($req->get('id')),
            'back' => Str::contains(url()->previous(), ['admin-area/strukturorganisasi/tambah', 'admin-area/strukturorganisasi/edit'])? '/admin-area/strukturorganisasi': url()->previous(),
            'jabatan' => [
                'Kepala Sekolah',
                'Kepala Komite',
                'Waka Kehumasan',
                'Waka Kesiswaan',
                'Waka Kurikulum',
                'Waka Sarpras',
                'Kepala Perpustakaan',
                'Kepala Lab. TIK',
                'Kepala Lab. IPA'
            ],
            'aksi' => 'Edit'
        ]);
    }

	public function hapus(Request $req)
	{
		try{
            $data = StrukturOrganisasi::findOrFail($req->get('id'));
            File::delete(public_path($data->struktur_organisasi_foto));
            $data->delete();
		}catch(\Exception $e){
            return redirect()->back()->withInput()->withErrors('Gagal Menghapus Data. '.$e->getMessage());
		}
	}
}
