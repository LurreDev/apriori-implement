@extends('layouts.master')

@section('before-content')
    <form action="{{ route('produk.search') }}" method="GET">
        <div class="container-xxl container-p-y">
            <div class="row">
                <div class="col-4">
                    <input type="text" name="nama_produk" class="form-control mb-2 border-2"
                        placeholder="Cari Nama Produk..." value="{{ request('nama_produk') }}" />
                </div>
                <div class="col-6">
                    <button type="submit" class="btn btn-primary" name="search">Cari</button>
                </div>
                @if (auth()->user()->role === 'admin')
                    <div class="col">
                        <a href="{{ route('produk.create') }}" class="btn btn-warning">Tambah</a>
                    </div>
                @endif
            </div>
        </div>
    </form>
@endsection

@section('content')
    <!-- Basic Bootstrap Table -->
    @if(Auth::user()->role == 'admin')

    <div class="card">
        <h5 class="card-header bg-primary text-white">Data Produk</h5>
        <div class="table-responsive" style="box-shadow: 0 0 4px  gray;">
            <table class="table-hover table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Foto</th>
                        <th>Nama Produk</th>
                        <th class="text-end">Harga</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @forelse($produks as $produk)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                @if ($produk->gambar==0)
                                <img src="https://solusiskripsi.my.id/asset_front/img/logo.png"
                                style="width: 100px; height : 100px">
                                @else
                                <img src="{{Storage::url("$produk->gambar") }}"
                                style="width: 100px; height : 100px">
                                @endif
                            </td>
                            <td>
                                <i class="fab fa-angular fa-lg text-danger me-3"></i>
                                {{ $produk->nama_produk }}
                            </td>
                            <td class="text-end">
                                <span>Rp. {{ number_format($produk['harga'], 0, ',', '.') }}</span>
                               
                                
                                <a class="btn btn-primary m-2" href="{{ route('produk.edit', $produk->id) }}">
                                    <i class="bx bx-edit-alt me-1 text-white"></i>
                                </a>
                                    <form method="POST" action="{{ route('produk.destroy', $produk->id) }}"
                                        onsubmit="return confirm('Yakin ingin menghapus' . $produk['nama_produk'] . '?')">
                                        @csrf @method('DELETE')
                                        <button class="btn btn-danger" type="submit">
                                            <i class="bx bx-trash me-1 text-white"></i>
                                        </button>
                                    </form>

                            </td>
                        </tr>
                        @empty
                        <div class="alert alert-warning" role="alert">
                            <strong>Tidak ada product</strong>
                        </div>
                        @endforelse
                </tbody>
            </table>
        </div>
    </div>
    @endif

    <!--/ Basic Bootstrap Table -->
    <hr class="m-5" />
    @if(Auth::user()->role == 'user')

    <div class="row">
        @forelse($produks as $produk)
    <div class="col-lg-4 col-md-4 col-sm-6 p-2">
        <div class="card " style="width: 18rem;">
            @if ($produk->gambar==0)
            <img src="https://cdn3.iconfinder.com/data/icons/start-up-4/44/box-512.png"
          class="card-img-top" >
            @else
            <img src="{{Storage::url("$produk->gambar") }}"
          class="card-img-top" >
            @endif
            {{-- <img src="{{ Str::contains($produk->gambar, 'pixabay') ? $produk->gambar : asset($produk->gambar)}}" alt="..."> --}}
            <div class="card-body">
              <h5 class="card-title">{{ $produk->nama_produk }}</h5>
              {{-- <p class="card-text">Rp. {{ number_format($produk['harga'], 0, ',', '.') }}</p> --}}
              <p   class="btn btn-primary">Rp. {{ number_format($produk['harga'], 0, ',', '.') }}</p>
            </div>
          </div>
    </div>
    @empty
    <div class="alert alert-warning" role="alert">
        <strong>Tidak ada product</strong>
    </div>
    @endforelse
    </div>
    @endif

@endsection
