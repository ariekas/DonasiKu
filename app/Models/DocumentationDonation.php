<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\donations;

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
        return $this->belongsTo(donations::class);
    }
}
