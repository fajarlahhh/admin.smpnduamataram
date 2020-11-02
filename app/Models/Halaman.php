<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Halaman extends Model
{
    use HasFactory;
    protected $table = 'halaman';
    protected $primaryKey = 'halaman_jenis';
    public $timestamps = false;
    protected $keyType = 'string';
}
