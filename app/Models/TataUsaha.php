<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TataUsaha extends Model
{
    use HasFactory;
    protected $table = 'tata_usaha';
    protected $primaryKey = 'tata_usaha_id';
    public $timestamps = false;
}
