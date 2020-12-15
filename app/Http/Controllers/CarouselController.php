<?php

namespace App\Http\Controllers;

use App\Models\Carousel;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CarouselController extends Controller
{
    //
    public function index(Request $req)
	{
        $data = Carousel::where(function($q) use ($req){
            $q->where('carousel_judul', 'like', '%'.$req->cari.'%')->where('carousel_uraian', 'like', '%'.$req->cari.'%');
        })->paginate(10);
        $data->appends([$req->cari]);
        return view('backend.pages.carousel.index', [
            'data' => $data,
            'i' => ($req->input('page', 1) - 1) * 10,
            'cari' => $req->cari,
        ]);
    }

	public function tambah(Request $req)
	{
        return view('backend.pages.carousel.form', [
            'back' => Str::contains(url()->previous(), ['carousel/tambah', 'carousel/edit'])? '/carousel': url()->previous(),
            'aksi' => 'Tambah'
        ]);
    }

	public function simpan(Request $req)
	{
        $req->validate([
            'carousel_judul' => 'required'
        ]);

        try{
            $file = $req->file('carousel_gambar');

            $ext = $file->getClientOriginalExtension();
            $nama_file = time().Str::random().".".$ext;
            $file->move(public_path('uploads/carousel'), $nama_file);

            $data = new Carousel();
            $data->carousel_judul = $req->get('carousel_judul');
            $data->carousel_uraian = $req->get('carousel_uraian');
            $data->carousel_gambar = '/uploads/carousel/'.$nama_file;
            $data->save();
            return redirect($req->get('redirect')? $req->get('redirect'): 'carousel');
		}catch(\Exception $e){
            return redirect()->back()->withInput()->withErrors('Gagal Menyimpan Data. '.$e->getMessage());
        }
    }

	public function hapus(Request $req)
	{
		try{
            $data = Carousel::findOrFail($req->get('id'));
            File::delete(public_path($data->carousel_gambar));
            $data->delete();
		}catch(\Exception $e){
            return redirect()->back()->withInput()->withErrors('Gagal Menghapus Data. '.$e->getMessage());
		}
	}
}
