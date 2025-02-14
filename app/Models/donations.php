<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class donations extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul',
        'deskripsi',
        'target_donasi',
        'image',
        'nama_bank',
        'nomer_bank',
        'jumlah_terkumpul',
    ];

    

    // Relasi ke donations_transaksis
    public function donationsTransaksis()
    {
        return $this->hasMany(donations_transaksi::class);
    }

   
}
