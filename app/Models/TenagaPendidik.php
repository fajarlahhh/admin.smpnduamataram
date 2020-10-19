<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TenagaPendidik extends Model
{
    use HasFactory;

    protected $table = 'tenaga_pendidik';
    protected $primaryKey = 'tenaga_pendidik_id';
    public $timestamps = false;

    public function mapel()
    {
        return $this->belongsTo('App\Models\Mapel', 'mapel_id', 'mapel_id');
    }
}
