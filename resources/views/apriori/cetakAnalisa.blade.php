<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <h2>Hasil analisa apriori</h2>
            <p>
                Waktu Pengujian : {{ $dataPengujian -> created_at }}<br/>
                Nama Penguji : {{ $dataPengujian -> nama_penguji }}
            </p>
        </div>
        <div class="row">
                <p class="card-title-desc">
                <h5>Pola hasil analisa</h5>
                </p>
                <div class="table-responsive">
                    <table class="table mb-0 table-hover table-bordered" id="tblPolaHasil">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Pola</th>
                                <th>Confidence</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($dataMinConfidence as $is)
                        <tr>
                            <td>{{ $loop -> iteration }}</td>
                            <td>
                                Apabila pelanggan membeli <b>{{ $is -> dataProduk($is -> kd_barang_a) -> nama_produk }}</b>, 
                                maka pelanggan juga akan membeli <b>{{ $is -> dataProduk($is -> kd_barang_b) -> nama_produk }}</b>
                            </td>
                            <td>{{ $is -> support }} %</td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
    
        </div>
    </div>
    
</body>
</html>