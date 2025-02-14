<?php

namespace App\Http\Controllers;

use App\Models\donations_transaksi;
use Illuminate\Http\Request;

class DonasiController extends Controller
{
    public function index()
    {
        // Mengambil data dari tabel donations_transaksis dan relasi ke tabel donations
        $transaksi = donations_transaksi::with('donation')->get();

        // Return ke view dengan data transaksi
        return view('data_transaksi', compact('transaksi'));
    }
}
