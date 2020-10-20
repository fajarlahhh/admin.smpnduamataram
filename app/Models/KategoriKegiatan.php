<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriKegiatan extends Model
{
    use HasFactory;
    protected $table = 'kategori_kegiatan';
    protected $primaryKey = 'kategori_kegiatan_id';
    public $timestamps = false;

    public function kegiatan()
    {
        return $this->hasMany('App\Models\Kegiatan', 'kategori_kegiatan_id', 'kategori_kegiatan_id');
    }
}
