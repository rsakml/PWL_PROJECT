@extends('admin.layout') @section('content')
    <div class="container mt-5">
        <div class="row justify-content-center align-items-center">
            <div class="card" style="width: 24rem;">
                <div class="card-header"> Detail Customer </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><b>Id Customer: </b>{{ $customer->id_customer }}</li>
                        <li class="list-group-item"><b>Foto: </b><img width="100px" src="{{ asset('storage/' . $customer->foto) }}"></li>
                        <li class="list-group-item"><b>Nama: </b>{{ $customer->nama }}</li>
                        <li class="list-group-item"><b>Jenis Kelamin: </b>{{ $customer->jenisKelamin }}</li>
                        <li class="list-group-item"><b>Alamat: </b>{{ $customer->alamat }}</li>
                        <li class="list-group-item"><b>No Telp: </b>{{ $customer->noTelp}}</li>
                    </ul>
                </div> <a class="btn btn-success mt-3" href="{{ route('customer.index') }}">Kembali</a>
            </div>
        </div>
    </div>
@endsection