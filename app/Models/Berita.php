<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    use HasFactory;
    protected $table = 'berita';
    protected $primaryKey = 'berita_id';

    public function kategori()
    {
        return $this->belongsTo('App\Models\KategoriBerita', 'kategori_berita_id', 'kategori_berita_id');
    }
}
