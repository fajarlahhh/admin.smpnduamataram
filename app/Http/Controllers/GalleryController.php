<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class GalleryController extends Controller
{
    //
    public function index(Request $req)
	{
        $file = $req->file? $req->file: 'semua';

        $data = Gallery::where(function($q) use ($req){
            $q->where('gallery_judul', 'like', '%'.$req->cari.'%');
        });

        switch ($file) {
            case 'tampil':
                $data = $data->where('sembunyikan', 0);
                break;
            case 'tersembunyi':
                $data = $data->where('sembunyikan', 1);
                break;
        }

        $data = $data->paginate(12);
        $data->appends([$req->cari, $req->file]);
        return view('backend.pages.datamaster.gallery.index', [
            'data' => $data,
            'cari' => $req->cari,
            'file' => $req->file,
        ]);
    }

	public function tambah(Request $req)
	{
        return view('backend.pages.datamaster.gallery.form', [
            'back' => Str::contains(url()->previous(), ['admin-area/gallery/tambah', 'admin-area/gallery/edit'])? '/admin-area/gallery': url()->previous(),
            'aksi' => 'Tambah'
        ]);
    }

	public function simpan(Request $req)
	{
        $req->validate([
            'gallery_judul' => 'required'
        ]);

        try{
            $file = $req->file('gallery_gambar');

            $ext = $file->getClientOriginalExtension();
            $nama_file = time().Str::random().".".$ext;
            $file->move(public_path('uploads/gallery'), $nama_file);

            $data = new Gallery();
            $data->gallery_judul = $req->get('gallery_judul');
            $data->gallery_gambar = '/uploads/gallery/'.$nama_file;
            $data->sembunyikan = $req->get('sembunyikan')?: 0;
            $data->save();
            return redirect($req->get('redirect')? $req->get('redirect'): 'admin-area/gallery');
		}catch(\Exception $e){
            return redirect()->back()->withInput()->withErrors('Gagal Menyimpan Data. '.$e->getMessage());
        }
    }

	public function hapus(Request $req)
	{
		try{
            $data = Gallery::findOrFail($req->get('id'));
            File::delete(public_path($data->gallery_gambar));
            $data->delete();
		}catch(\Exception $e){
            return redirect()->back()->withInput()->withErrors('Gagal Menghapus Data. '.$e->getMessage());
		}
	}
}
