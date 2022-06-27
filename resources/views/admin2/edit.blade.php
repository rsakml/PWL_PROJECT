@extends('admin.layout') @section('content')
    <div class="container mt-5">
        <div class="row justify-content-center align-items-center">
            <div class="card" style="width: 24rem;">
                <div class="card-header"> Edit Transaksi Penjualan</div>
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
                        @endif <form method="post" action="{{route('admin2.update', $pesanan->id) }}" id="myForm">
                            @csrf @method('PUT')
                            <div class="form-group"> <label for="id">Id</label> <input type="text" name="id"
                                    class="form-control" id="id" value="@if($pesanan->status == 0)
                                    Sudah Pesan & Belum dibayar
                                    @else
                                    Sudah dibayar 
                                    @endif " aria-describedby="id">
                            </div>
                            <div class="form-group"> <label for="tanggal">tanggal</label> <input type="date"
                                name="tanggal" class="form-control" id="tanggal" value="{{ $pesanan->tanggal }}"
                                aria-describedby="tanggal"> </div>
                            <div class="form-group"> <label for="status">status</label> <input type="status" name="status"
                                    class="form-control" id="status" value="{{ $pesanan->status }}" aria-describedby="status">
                            </div>
                            <div class="form-group"> <label for="jumlah_harga">jumlah_harga</label> <input type="jumlah_harga" name="jumlah_harga"
                                    class="form-control" id="jumlah_harga" value="{{ $pesanan->jumlah_harga }}" aria-describedby="jumlah_harga">
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                </div>
            </div>
        </div>
</div> @endsection
