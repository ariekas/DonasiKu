<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentationDonation extends Model
{
    use HasFactory;

    protected $fillable = [
        'donation_id',
        'judul',
        'deskripsi',
        'image',
        'jumlah_donasi',
    ];

    public function donation()
    {
        return $this->belongsTo(Donation::class);
    }
}
