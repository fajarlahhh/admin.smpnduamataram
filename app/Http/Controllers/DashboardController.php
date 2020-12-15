<?php

namespace App\Http\Controllers;

use App\Models\Video;
use App\Models\Berita;
use App\Models\Profil;
use App\Models\Kegiatan;
use Illuminate\Http\Request;
use App\Models\StrukturOrganisasi;

class DashboardController extends Controller
{
    //
    public function index(Request $req)
    {
        return view('backend.pages.dashboard.index');
    }

    public function frontend(Request $req)
    {
        return view('frontend.pages.beranda.index', [
            'profil' => Profil::where('profil_jenis', 'Kepala Sekolah')->first(),
            'kepalasekolah' => StrukturOrganisasi::where('struktur_organisasi_jabatan', 'Kepala Sekolah')->first(),
            'kegiatan' => Kegiatan::with('kategori')->orderBy('kegiatan_id')->limit(3)->get(),
            'berita' => Berita::with('kategori')->orderBy('berita_id', 'desc')->limit(3)->get(),
            'video' => Video::orderBy('video_id', 'desc')->limit(3)->get()
        ]);
    }
}
