@extends('layouts.master')

@section('content')
<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
            <h4 class="header-title">Data Penjualan</h4>
            <p class="card-title-desc">
                {{-- <a class="btn btn-primary waves-effect waves-light" href="javascript:void(0)">
                    <i class="mdi mdi-plus-box-multiple-outline"></i>
                    Tambah Penjualan Baru
                </a>&nbsp; --}}
                <form action="{{ url('/app/penjualan/import') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <label for="formFileTransaksi" class="form-label">Import excel</label>
                    <input class="form-control" type="file" name="file_excel" id="formFileTransaksi" required>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
                {{-- <a class="btn btn-primary waves-effect waves-light" href="javascript:void(0)">
                    <i class="mdi mdi-plus-box-multiple-outline"></i>
                    
                    Import Penjualan
                </a> --}}
            </p>

            <div class="table-responsive">
                <table class="table mb-0 table-hover" id="tblDataPenjualan">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>No Faktur</th>
                            <th>Total Produk</th>
                            <th>Total Qt</th>
                            <th>Total Harga</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($dataPenjualan as $penjualan)
                        <tr>
                            <td>{{ $loop -> iteration }}</td>
                            <td>F-{{ $penjualan -> no_faktur }}</td>
                            <td>{{ $penjualan -> hitungTransaksi($penjualan -> no_faktur) }}</td>
                            <td>{{ $penjualan -> hitungTotalQt($penjualan -> no_faktur) }}</td>
                            <td>Rp. {{ number_format($penjualan -> getTotalHarga($penjualan -> no_faktur)) }}</td>
                            <td>
                                <a class="btn btn-primary btn-sm waves-effect waves-light" href="{{ url('/app/penjualan/detail',$penjualan ->no_faktur)}}">
                                    <i class="mdi mdi-folder-edit-outline"></i>
                                    Detail
                                </a>&nbsp;
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>
    <hr class="m-5" />
@endsection
