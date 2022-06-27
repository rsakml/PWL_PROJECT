@extends('admin.layout') @section('content')
    <div class="container mt-5">
        <div class="row justify-content-center align-items-center">
            <div class="card" style="width: 24rem;">
                <div class="card-header"> Detail Transaksi Pembelian </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><b>Id Pembelian: </b>{{ $pembelian->id_pembelian }}</li>
                        <li class="list-group-item"><b>Nama Supplier: </b>{{ $pembelian->nama_supplier }}</li>
                        <li class="list-group-item"><b>Alamat: </b>{{ $pembelian->alamat }}</li>
                        <li class="list-group-item"><b>No Hp: </b>{{ $pembelian->nohp}}</li>
                        <li class="list-group-item"><b>Nama Bahan: </b>{{ $pembelian->nama_bahan }}</li>
                        <li class="list-group-item"><b>Jumlah: </b>{{ $pembelian->jumlah }}</li>
                        <li class="list-group-item"><b>Harga: </b>{{ $pembelian->harga }}</li>
                    </ul>
                </div> <a class="btn btn-success mt-3" href="{{ route('admin3.index') }}">Kembali</a>
            </div>
        </div>
    </div>
@endsection