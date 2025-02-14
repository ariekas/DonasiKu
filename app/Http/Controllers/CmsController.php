<?php

namespace App\Http\Controllers;

use App\Models\donations_transaksi;
use Illuminate\Http\Request;
use App\Models\donations;


class CmsController extends Controller
{
    public function index()
    {
        $donations = donations::all(); // Ambil semua donasi
        return view('welcome', compact('donations'));
        
    }

    public function storeDonation(Request $request)
{
    // Validasi input
    $validated = $request->validate([
        'donation_id' => 'required|exists:donations,id', // Pastikan donation_id valid
        'nama' => 'required|string|max:255',
        'jumlah_donasi' => 'required|numeric|min:1', // Pastikan jumlah donasi valid
        'image' => 'required|image|mimes:jpg,jpeg,png|max:2048', // Validasi bukti transfer (image)
    ]);

    // Menyimpan file gambar bukti transfer
    $imagePath = $request->file('image')->store('image', 'public');

    // Menyimpan transaksi donasi ke dalam database
    $donationTransaction = donations_transaksi::create([
        'nama' => $validated['nama'],
        'donation_id' => $validated['donation_id'],
        'jumlah_donasi' => $validated['jumlah_donasi'],
        'image' => $imagePath, // Simpan path gambar bukti transfer
    ]);

    // Update jumlah terkumpul di tabel donations
    $donation = donations::find($validated['donation_id']);
    $donation->jumlah_terkumpul += $validated['jumlah_donasi'];
    $donation->save();

    // Redirect atau memberi feedback
    return redirect()->route('home');
}

public function coba(){
    return view('coba');
}


}
