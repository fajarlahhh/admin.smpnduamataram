<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PesertaDidik extends Model
{
    use HasFactory;
    protected $table = 'peserta_didik';
    protected $primaryKey = 'peserta_didik_id';
    public $timestamps = false;
}
