<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;

    protected $table = 'peminjaman';
    protected $primaryKey = 'peminjaman_id';

    protected $fillable = ['peminjaman_user_id', 'peminjaman_status', 'peminjaman_notes'];

    public function user()
    {
        return $this->belongsTo(User::class, 'peminjaman_user_id');
    }

    public function details()
    {
        return $this->hasMany(PeminjamanDetail::class, 'detail_peminjaman_id', 'peminjaman_id');
    }
}
