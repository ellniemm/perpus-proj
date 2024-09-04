<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penerbit extends Model
{
    use HasFactory;
    protected $table = 'penerbit';
    protected $primaryKey = 'penerbit_id';
    public $timestamps = false;
    protected $fillable = [
        'penerbit_nama',
        'penerbit_desc',

    ];
}
