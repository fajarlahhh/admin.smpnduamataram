<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
    use HasFactory;
    protected $table = 'kegiatan';
    protected $primaryKey = 'kegiatan_id';
    public $timestamps = false;

    public function kategori()
    {
        return $this->belongsTo('App\Models\KategoriKegiatan', 'kategori_kegiatan_id', 'kategori_kegiatan_id');
    }
}
