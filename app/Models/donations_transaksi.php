<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class donations_transaksi extends Model
{
    use HasFactory;

    protected $fillable = [
        'donation_id',
        'jumlah_donasi',
        'nama',
        'image',
        'status',
    ];

  

    // Relasi ke donation
    public function donation()
    {
        return $this->belongsTo(donations::class);
    }
}
