<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Buku extends Model
{
    use HasFactory;
    protected $table = 'buku';
    protected $primaryKey = 'buku_id';

    public $timestamps = false;
    protected $fillable = [
        'buku_kategori_id',
        'buku_penerbit_id',
        'buku_rak_id',
        'buku_penulis_id',
        'buku_nama',
        'buku_isbn',
        'buku_stok',
        'buku_deskripsi',
        'buku_img',
    ];

    public static function getAllBuku()
    {
        return self::withRelations()->get();
    }
    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'buku_kategori_id');
    }

    public function penerbit()
    {
        return $this->belongsTo(Penerbit::class, 'buku_penerbit_id');
    }

    public function rak()
    {
        return $this->belongsTo(Rak::class, 'buku_rak_id');
    }

    public function penulis()
    {
        return $this->belongsTo(Penulis::class, 'buku_penulis_id');
    }
}
