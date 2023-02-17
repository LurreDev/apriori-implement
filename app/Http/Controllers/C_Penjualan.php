<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\M_Penjualan;
use App\Imports\PenjualanImport;
use Maatwebsite\Excel\Facades\Excel;
class C_Penjualan extends Controller
{
    public function dataPenjualanPage()
    {
        $dataPenjualan = M_Penjualan::distinct() -> get(['no_faktur']);
        $dr = ['dataPenjualan' => $dataPenjualan];
        return view('transaksi.index2', $dr);

    }
    public function detailPenjualan(Request $request, $kdFaktur)
    {
        $dataPenjualan = M_Penjualan::where('no_faktur', $kdFaktur) -> get();
        $dr = ['kdFaktur' => $kdFaktur, 'dataPenjualan' => $dataPenjualan];
        return view('transaksi.detailPenjualan', $dr);
    }

    public function import(Request $request) 
    {
        Excel::import(new PenjualanImport,request()->file('file_excel') );
        $dataPenjualan = M_Penjualan::distinct() -> get(['no_faktur']);
        $dr = ['dataPenjualan' => $dataPenjualan];
        return view('transaksi.index2', $dr);
    }
}
