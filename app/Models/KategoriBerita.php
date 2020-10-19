<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriBerita extends Model
{
    use HasFactory;

    protected $table = 'kategori_berita';
    protected $primaryKey = 'kategori_berita_id';
    public $timestamps = false;

    public function berita()
    {
        return $this->hasMany('App\Models\Berita', 'kategori_berita_id', 'kategori_berita_id');
    }
}
