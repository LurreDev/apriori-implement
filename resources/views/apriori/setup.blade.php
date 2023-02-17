@extends('layouts.master')

@section('content')
<div class="col-lg-12">
<div class="row" id="divDataMentor">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">Setup nilai support & confidence</div>
            <form action="{{ url('/app/apriori/analisa/proses')}}" method="POST">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label>Nama Penguji</label>
                        <input type="text" class="form-control" name="nama" readonly value="{{ auth()->user()->nama}}">
                    </div>
                    <div class="form-group">
                        <label for="company">Min. Support</label> <small>Semakin rendah nilai support akan semakin banyak proses yang mengakibatkan proses apriori menjadi lama</small>
                        <select class="form-control" name="support">
                            <?php
                            $x = 1;
                            for ($x; $x <= 100; $x++) { ?>
                                <option value="<?= $x; ?>"><?= $x; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="company">Min. Confidence</label>
                        <select class="form-control" name="confidence">
                            <?php
                            $x = 1;
                            for ($x; $x <= 100; $x++) { ?>
                                <option value="<?= $x; ?>"><?= $x; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Mulai Analisa Penjualan</button>
                    </div>
                </div>

            </form>
            

        </div>

    </div>
</div>
@endsection
 