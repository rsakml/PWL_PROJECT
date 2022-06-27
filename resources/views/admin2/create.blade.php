@extends('admin.layout') @section('content') <div class="container mt-5">
        <div class="row justify-content-center align-items-center">
            <div class="card" style="width: 24rem;">
                <div class="card-header"> Tambah Data Transaksi Penjualan </div>
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
                    <form method="post" action="{{ route('admin2.store') }}" id="myForm" enctype="multipart/form-data">
                        @csrf 
                        <div class="form-group"> <label for="tanggal">Tanggal</label>
                            <input type="date" name="tanggal" class="form-control" id="tanggal"
                                aria-describedby="password">
                        </div>
                        <div class="form-group"> <label for="status">Status</label> <input type="status" name="status"
                                class="form-control" id="status" aria-describedby="status"> </div>
                        <div class="form-group"> <label for="jumlah_harga">Jumlah Harga</label> <input type="jumlah_harga"
                                name="jumlah_harga" class="form-control" id="jumlah_harga" aria-describedby="jumlah_harga">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
</div> @endsection
