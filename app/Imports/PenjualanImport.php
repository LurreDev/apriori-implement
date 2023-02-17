<?php

namespace App\Imports;

use App\Models\M_Penjualan;
use App\Models\M_Produk;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PenjualanImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {    
        $namaProduk = $row['nama_produk'];
        $dataProduk = M_Produk::where('nama_produk', $namaProduk) -> first();
        return new M_Penjualan([
            'kd_penjualan' => Str::uuid(),
            'no_faktur' => $row['no_faktur'],
            'kd_barang' => $dataProduk['kd_produk'],
            'qt' => $row['qt']
        ]);
    }
}
