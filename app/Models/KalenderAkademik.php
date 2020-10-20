<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KalenderAkademik extends Model
{
    use HasFactory;
    protected $table = 'kalender_akademik';
    protected $primaryKey = 'kalender_akademik_id';
    public $timestamps = false;
}
