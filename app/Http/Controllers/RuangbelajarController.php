<?php

namespace App\Http\Controllers;

use App\Models\Video;
use App\Models\Posting;
use Illuminate\Http\Request;

class RuangbelajarController extends Controller
{
    //
    public function jadwal(Request $req)
    {
        return view('frontend.pages.ruangbelajar.jadwal', [
            'data' => Posting::where('posting_jenis', 'jadwalbelajar')->get()
        ]);
    }

    public function modul($kelas)
    {
        return view('frontend.pages.ruangbelajar.modul', [
            'data' => Posting::where('posting_jenis', 'modulbelajar')->where('posting_kriteria', strtoupper($kelas))->get(),
            'kelas' => strtoupper($kelas)
        ]);
    }

    public function video($kelas)
    {
        return view('frontend.pages.ruangbelajar.video', [
            'data' => Video::where('video_kriteria', $kelas)->get(),
            'kelas' => strtoupper($kelas)
        ]);
    }

    public function informasi(Request $req)
    {
        return view('frontend.pages.ruangbelajar.informasi', [
            'data' => Posting::where('posting_jenis', 'informasi')->get()
        ]);
    }
}
