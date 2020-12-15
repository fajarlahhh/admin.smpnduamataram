<?php

namespace App\Http\Controllers;

use App\Models\Halaman;
use App\Models\Fasilitas;
use Illuminate\Http\Request;

class DataController extends Controller
{
    //
    public function sarpras(Request $req)
    {
        return view('frontend.pages.data.sarpras', [
            'data' => Fasilitas::all(),
            'kategori' => Fasilitas::select('fasilitas_kategori')->groupBy('fasilitas_kategori')->get()
        ]);
    }

    public function denah(Request $req)
    {
        return view('frontend.pages.data.denah', [
            'data' => Halaman::where('halaman_jenis', 'denahsekolah')->first()
        ]);
    }
}
