<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PeminjamanDetail extends Model
{
    use HasFactory;

    protected $table = 'peminjaman_detail';
    protected $primaryKey = 'detail_id';
    protected $fillable = ['detail_buku_id', 'detail_peminjaman_id', 'quantity'];

    public function peminjaman()
    {
        return $this->belongsTo(Peminjaman::class, 'detail_peminjaman_id');
    }

    public function buku()
    {
        return $this->belongsTo(Buku::class, 'detail_buku_id', 'buku_id');
    }
}
