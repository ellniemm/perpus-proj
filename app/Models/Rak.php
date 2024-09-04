<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rak extends Model
{
    use HasFactory;
    protected $table = 'rak';
    protected $primaryKey = 'rak_id';
    public $timestamps = false;
    protected $fillable = [
        'rak_nama',
        'rak_lokasi',

    ];
}
