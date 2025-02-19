<?php

namespace App\Http\Controllers;

use App\Models\donations_transaksi;
use App\Models\donations;
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

    public function detailDonasi ($id){
        $donations = donations::get()->where('id', $id);
        // return response()->json($donations);
        return view('detail_donasi', compact('donations'));
    }
}
