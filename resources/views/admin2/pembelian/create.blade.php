@extends('admin.layout') @section('content') <div class="container mt-5">
        <div class="row justify-content-center align-items-center">
            <div class="card" style="width: 24rem;">
                <div class="card-header"> Tambah Data Pembelian </div>
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
                    
                    <form method="post" action="{{ route('admin3.store') }}" id="myForm" enctype="multipart/form-data">
                        @csrf <div class="form-group"> <label for="id_pembelian">Id
                                pembelian</label> <input type="text" name="id_pembelian" class="form-control"
                                id="id_pembelian" aria-describedby="id"> </div>
                        <div class="form-group"> <label for="nama_supplier">Nama Supplier</label>
                            <input type="nama_supplier" name="nama_supplier" class="form-control" id="nama_supplier"
                                aria-describedby="nama_supplier">
                        </div>
                        <div class="form-group"> <label for="alamat">Alamat</label> <input type="alamat" name="alamat"
                                class="form-control" id="alamat" aria-describedby="alamat"> </div>
                        <div class="form-group"> <label for="nohp">No Hp</label> <input type="nohp" name="nohp"
                                class="form-control" id="nohp" aria-describedby="nohp"> </div>
                        <div class="form-group"> <label for="nama_bahan">Nama Bahan</label> <input type="nama_bahan"
                                name="nama_bahan" class="form-control" id="nama_bahan" aria-describedby="nama_bahan">
                        </div>
                        <div class="form-group"> <label for="jumlah">Jumlah</label> <input type="jumlah" name="jumlah"
                                class="form-control" id="jumlah" aria-describedby="jumlah"> </div>
                        <div class="form-group"> <label for="harga">Harga</label> <input type="harga" name="harga"
                                class="form-control" id="harga" aria-describedby="harga"> </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
</div> @endsection
