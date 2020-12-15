<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Berita extends Model
{
    use HasFactory;
    protected $table = 'berita';
    protected $primaryKey = 'berita_id';

    public function kategori()
    {
        return $this->belongsTo('App\Models\KategoriBerita', 'kategori_berita_id', 'kategori_berita_id');
    }

    public function getCreatedAtAttribute($value)
    {
         return Carbon::parse($value)->format('d')." <span>".Carbon::parse($value)->format('M Y')."</span>";
    }

    public function getBeritaIsiSelengkapnyaAttribute()
    {
        if(strpos("{$this->berita_isi}","</p><p>")){
            $berita = explode('</p><p>', "{$this->berita_isi}");
            return $berita[0];
        }else{
            $berita = explode('. ', "{$this->berita_isi}");
            return $berita[0];
        }
    }

    public function getUpdatedAtAttribute($value)
    {
         return Carbon::parse($value)->isoFormat('LLLL');
    }
}
