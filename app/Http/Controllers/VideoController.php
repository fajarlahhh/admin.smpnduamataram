<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    //
    public function index(Request $req)
	{
        $data = Video::where(function($q) use ($req){
            $q->where('video_judul', 'like', '%'.$req->cari.'%');
        })->paginate(10);
        $data->appends([$req->cari]);
        return view('backend.pages.ruangbelajar.video.index', [
            'data' => $data,
            'i' => ($req->input('page', 1) - 1) * 10,
            'cari' => $req->cari,
        ]);
    }

	public function tambah(Request $req)
	{
        return view('backend.pages.ruangbelajar.video.form', [
            'back' => Str::contains(url()->previous(), ['admin-area/video/tambah', 'admin-area/video/edit'])? '/admin-area/video': url()->previous(),
            'kelas' => ['VII', 'VIII', 'IX'],
            'aksi' => 'Tambah'
        ]);
    }

	public function simpan(Request $req)
	{
        $req->validate([
            'video_judul' => 'required'
        ]);

        try{
            $data = new Video();
            $data->video_judul = $req->get('video_judul');
            $data->video_uraian = $req->get('video_uraian');
            $data->video_link = $req->get('video_link');
            $data->save();
            return redirect($req->get('redirect')? $req->get('redirect'): 'admin-area/video');
		}catch(\Exception $e){
            return redirect()->back()->withInput()->withErrors('Gagal Menyimpan Data. '.$e->getMessage());
        }
    }

	public function hapus(Request $req)
	{
		try{
            $data = Video::findOrFail($req->get('id'))->delete();
		}catch(\Exception $e){
            return redirect()->back()->withInput()->withErrors('Gagal Menghapus Data. '.$e->getMessage());
		}
	}
}
