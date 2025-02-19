<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CmsController;
use App\Http\Controllers\DonasiController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [CmsController::class,'coba'])->name('coba');
Route::get('/about-us', function(){
    return view('about-us');
})->name('about-us');


Route::post('/donation/store', [CmsController::class, 'storeDonation'])->name('donation.store');
Route::get('/documentasi-donasi/{id}', [CmsController::class,'DokumentasiDonasi'])->name('documentasi_donasi');


Route::get('/donasi/transaksi', [DonasiController::class, 'index'])->name('donasi.transaksi');
Route::get('/detail_donasi/{id}', [DonasiController::class,'detailDonasi'])->name('detail_donasi');
