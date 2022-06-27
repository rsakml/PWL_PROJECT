@extends('admin.layout') @section('content')
    <div class="container mt-5">
        <div class="row justify-content-center align-items-center">
            <div class="card" style="width: 24rem;">
                <div class="card-header"> Detail Transaksi </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><b>Id: </b>{{ $pesanan->id }}</li>
                        <li class="list-group-item"><b>Tanggal: </b>{{ $pesanan->tanggal }}</li>
                        <li class="list-group-item"><b>Status: </b>{{ $pesanan->status }}</li>
                        <li class="list-group-item"><b>Jumlah Harga: </b>{{ $pesanan->jumlah_harga }}</li>
                    </ul>
                </div> <a class="btn btn-success mt-3" href="{{ route('admin2.index') }}">Kembali</a>
            </div>
        </div>
    </div>
@endsection