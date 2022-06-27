@extends('admin.layout') @section('content') <div class="container mt-5">
        <div class="row justify-content-center align-items-center">
            <div class="card" style="width: 24rem;">
                <div class="card-header"> Edit Data Transaksi Pembelian </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger"> <strong>Whoops!</strong> There were some problems with your
                            input.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form method="post" action="{{ route('admin3.update', $pembelian->id_pembelian) }}" id="myForm"
                        enctype="multipart/form-data">
                        @csrf @method('PUT')
                        <div class="form-group"> <label for="nama_supplier">Nama Supplier</label> <input
                                type="nama_supplier" name="nama_supplier" class="form-control" id="nama_supplier"
                                value="{{ $pembelian->nama_supplier }}" aria-describedby="nama_supplier"> </div>
                        <div class="form-group"> <label for="alamat">Alamat</label> <input type="alamat" name="alamat"
                                class="form-control" id="alamat" value="{{ $pembelian->alamat }}"
                                aria-describedby="alamat"> </div>
                        <div class="form-group"> <label for="nohp">No Hp</label> <input type="nohp" name="nohp"
                                class="form-control" id="nohp" value="{{ $pembelian->nohp }}"
                                aria-describedby="nohp"> </div>
                        <div class="form-group"> <label for="nama_bahan">Nama Bahan</label> <input type="nama_bahan"
                                name="nama_bahan" class="form-control" id="nama_bahan"
                                value="{{ $pembelian->nama_bahan }}" aria-describedby="nama_bahan"> </div>
                        <div class="form-group"> <label for="jumlah">Jumlah</label> <input type="jumlah" name="jumlah"
                                class="form-control" id="jumlah" value="{{ $pembelian->jumlah }}"
                                aria-describedby="jumlah"> </div>
                        <div class="form-group"> <label for="harga">Harga</label> <input type="harga" name="harga"
                                class="form-control" id="harga" value="{{ $pembelian->harga }}"
                                aria-describedby="harga"> </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
</div> @endsection
