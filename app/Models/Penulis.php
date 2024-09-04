<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penulis extends Model
{
    use HasFactory;
    protected $table = 'penulis';
    protected $primaryKey = 'penulis_id';
    public $timestamps = false;
    protected $fillable = [
        'penulis_nama',
        'penulis_desc',

    ];
}
