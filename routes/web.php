<?php

use App\Http\Controllers\AlgoritmaController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\C_Penjualan;
use App\Http\Controllers\C_Apriori;
use App\Models\StaticVar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('login');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('search-produk', [ProdukController::class, 'search'])->name('produk.search');
Route::resource('produk', ProdukController::class)->middleware('auth');


// Route::resource('transaksi', TransaksiController::class)->middleware('auth');
 
Route::get('/app/penjualan/data', [C_Penjualan::class, 'dataPenjualanPage'])->middleware('auth');
Route::post('/app/penjualan/import', [C_Penjualan::class, 'import'])->middleware('auth');
Route::get('/app/penjualan/detail/{kdFaktur}', [C_Penjualan::class, 'detailPenjualan'])->middleware('auth');
Route::get('/app/apriori/setup', [C_Apriori::class, 'setupPerhitunganApriori'])->middleware('auth');
Route::get('/app/apriori/riwayatAnalisa', [C_Apriori::class, 'riwayatAnalisa'])->middleware('auth');
Route::post('/app/apriori/analisa/proses', [C_Apriori::class, 'prosesAnalisaApriori'])->middleware('auth');
Route::get('/app/apriori/analisa/hasil/{kdPengujian}', [C_Apriori::class, 'hasilAnalisa'])->middleware('auth');
Route::get('/apriori/analisa/cetak/{kdPengujian}', [C_Apriori::class, 'cetakAnalisa'])->middleware('auth');

// Route::get('transaksi/import', [TransaksiController::class, 'viewImport'])->name('transaksi.import.index')->middleware('auth');
// Route::post('transaksi/import', [TransaksiController::class, 'import'])->name('transaksi.import.store')->middleware('auth');
// Route::resource('transaksi', TransaksiController::class)->middleware('auth');

Route::resource('akun', UserController::class)->middleware('auth');
// Route::resource('cart', CartController::class)->middleware('auth')->except('edit', 'show');
// Route::prefix('algoritma')->name('algoritma.')->group(function () {
//     Route::get('apriori', [AlgoritmaController::class, 'apriori'])->name('apriori')->middleware('auth');
// });

// Route::put('update-confidence', function (Request $request) {
//     StaticVar::first()->update([
//         'min_confidence' => $request->min_confidence,
//         'min_support' => $request->min_support
//     ]);

//     return redirect()->route('transaksi.index');
// })->name('edit-var.update');

// Route::get('edit-confidence', function () {
//     $staticVar = StaticVar::first();

//     return view('edit-confidence', ['staticVar' => $staticVar]);
// })->name('edit-var.index');
