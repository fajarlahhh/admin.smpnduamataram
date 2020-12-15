<?php

namespace App\Http\Controllers;

use App\Models\Profil;
use App\Models\TataUsaha;
use Illuminate\Http\Request;
use App\Models\KalenderAkademik;
use App\Models\StrukturOrganisasi;
use Illuminate\Support\Facades\DB;

class ProfilController extends Controller
{
    //

    public function profilkepsek (Request $req)
    {
        return view('frontend.pages.profil.profilkepsek',[
            'data' => Profil::where('profil_jenis', 'Kepala Sekolah')->first(),
            'struktur' => StrukturOrganisasi::where('struktur_organisasi_jabatan', 'Kepala Sekolah')->first()
        ]);
    }
    public function sejarah (Request $req)
    {
        return view('frontend.pages.profil.sejarah',[
            'data' => Profil::where('profil_jenis', 'Sejarah Sekolah')->first()
        ]);
    }
    public function visimisi (Request $req)
    {
        return view('frontend.pages.profil.visimisi',[
            'data' => Profil::where('profil_jenis', 'Visi Misi')->first()
        ]);
    }
    public function komite (Request $req)
    {
        return view('frontend.pages.profil.komite',[
            'data' => Profil::where('profil_jenis', 'Komite Sekolah')->first()
        ]);
    }
    public function kalender (Request $req)
    {
        return view('frontend.pages.profil.kalender',[
            'data' => KalenderAkademik::whereRaw(DB::raw('year(kalender_akademik_mulai)='.date('Y')))->orderBy('kalender_akademik_mulai')->get()
        ]);
    }
    public function tu (Request $req)
    {
        return view('frontend.pages.profil.tu',[
            'data' => TataUsaha::orderBy('tata_usaha_urutan')->get()
        ]);
    }
    public function struktur (Request $req)
    {
        return view('frontend.pages.profil.struktur',[
            'data' => StrukturOrganisasi::orderBy('struktur_organisasi_urutan')->get()
        ]);
    }
}
