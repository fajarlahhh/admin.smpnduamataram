<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mapel extends Model
{
    use HasFactory;

    protected $table = 'mapel';
    protected $primaryKey = 'mapel_id';
    public $timestamps = false;

    public function tenaga_pendidik()
    {
        return $this->hasMany('App\Models\TenagaPendidik', 'mapel_id', 'mapel_id');
    }
}
