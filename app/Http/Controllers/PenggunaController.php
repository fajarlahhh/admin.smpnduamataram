<?php

namespace App\Http\Controllers;

use App\Models\Pengguna;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;

class PenggunaController extends Controller
{
    //
	public function __construct()
	{
        $this->middleware('auth');
	}

	public function index(Request $req)
	{
        $data = Pengguna::where('pengguna_id', 'like', '%'.$req->cari.'%')->where('pengguna_nama', 'like', '%'.$req->cari.'%')->paginate(10);
        $data->appends([$req->cari]);
        return view('backend.pages.pengguna.index', [
            'data' => $data,
            'i' => ($req->input('page', 1) - 1) * 10,
            'cari' => $req->cari
        ]);
    }


	public function tambah()
	{
        return view('backend.pages.pengguna.form', [
            'back' => Str::contains(url()->previous(), ['admin-area/pengguna/tambah', 'admin-area/pengguna/edit'])? '/admin-area/pengguna': url()->previous(),
            'aksi' => 'Tambah'
        ]);
	}

	public function simpan(Request $req)
	{
        $req->validate([
            'pengguna_id' => 'required',
            'pengguna_nama' => 'required'
        ]);

		try{
            if($req->get('ID')){
                DB::transaction(function() use($req){
                    $pengguna = Pengguna::findOrFail($req->get('ID'));
                    if ($req->get('pengguna_sandi')) {
                        $pengguna->pengguna_sandi = Hash::make($req->get('pengguna_sandi'));
                    }
                    $pengguna->pengguna_id = $req->get('pengguna_id');
                    $pengguna->pengguna_nama = $req->get('pengguna_nama');
                    $pengguna->save();
                });
            }else{
                DB::transaction(function() use($req){
                    $pengguna = new Pengguna();
                    $pengguna->pengguna_nama = $req->get('pengguna_nama');
                    $pengguna->pengguna_id = $req->get('pengguna_id');
                    $pengguna->pengguna_sandi = Hash::make($req->get('pengguna_sandi'));
                    $pengguna->save();
                });
            }
			return redirect($req->get('redirect')? $req->get('redirect'): 'admin-area/pengguna');
		}catch(\Exception $e){
            return redirect()->back()->withInput()->withErrors('Gagal Menyimpan Data. '.$e->getMessage());
		}
	}

	public function edit(Request $req)
	{
        return view('backend.pages.pengguna.form', [
            'data' => Pengguna::findOrFail($req->id),
            'back' => Str::contains(url()->previous(), 'admin-area/pengguna/edit')? '/admin-area/pengguna': url()->previous(),
            'aksi' => 'Edit'
        ]);
	}

	public function ganti_sandi(Request $req)
	{
        $req->validate([
            'pengguna_sandi_baru' => 'required',
            'pengguna_sandi_lama' => 'required',
        ]);
		try{
			$pengguna = Pengguna::findOrFail(Auth::id());
			if($pengguna){
				if(!Hash::check($req->get('pengguna_sandi_lama'), $pengguna->pengguna_sandi)){
                    return redirect()->back()->withErrors('Ganti Kata Sandi Gagal. Kata sandi lama salah');
				}
			}else{
				return redirect()->back()->withErrors('Ganti Kata Sandi Gagal. Data pengguna tidak ditemukan');
			}
			$pengguna->pengguna_sandi = Hash::make($req->get('pengguna_sandi_baru'));
			$pengguna->save();
			return redirect()->back();
		}catch(\Exception $e){
			return redirect()->back()->withErrors('Ganti Kata Sandi Gagal. '. $e->getMessage());
		}
	}

	public function hapus(Request $req)
	{
		try{
            $pengguna = Pengguna::findOrFail($req->get('id'))->delete();
		}catch(\Exception $e){
            return redirect('pengguna')->withErrors('Gagal Menghapus Data. '.$e->getMessage());
		}
	}
}
