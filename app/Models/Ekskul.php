<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ekskul extends Model
{
    use HasFactory;
    protected $table = 'ekskul';
    protected $primaryKey = 'ekskul_id';
    public $timestamps = false;
}
