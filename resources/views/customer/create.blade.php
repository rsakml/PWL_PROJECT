@extends('admin.layout') @section('content') <div class="container mt-5">
        <div class="row justify-content-center align-items-center">
            <div class="card" style="width: 24rem;">
                <div class="card-header"> Tambah Data Customer </div>
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
                        @endif <form method="post" action="{{ route('customer.store') }}" id="myForm"
                            enctype="multipart/form-data"> @csrf <div class="form-group"> <label for="id_customer">Id
                                    Customer</label> <input type="text" name="id_customer" class="form-control"
                                    id="id_customer" aria-describedby="id"> </div>
                            <div class="form-group"> <label for="foto">Foto</label> <input type="file" name="foto"
                                    class="form-control" id="foto" aria-describedby="foto"> </div>
                            <div class="form-group"> <label for="nama">Nama</label>
                                <input type="nama" name="nama" class="form-control" id="nama" aria-describedby="password">
                            </div>
                            <div class="form-group"> <label for="jenisKelamin">Jenis Kelamin</label> <input
                                    type="jenisKelamin" name="jenisKelamin" class="form-control" id="jenisKelamin"
                                    aria-describedby="jenisKelamin"> </div>
                            <div class="form-group"> <label for="alamat">Alamat</label> <input type="alamat"
                                    name="alamat" class="form-control" id="alamat" aria-describedby="alamat"> </div>
                            <div class="form-group"> <label for="noTelp">No Telp</label> <input type="noTelp" name="noTelp"
                                    class="form-control" id="noTelp" aria-describedby="noTelp"> </div> <a class="btn btn-success mt-3" href="{{ route('customer.index') }}">Kembali</a>
                                     <button type="submit"
                                class="btn btn-primary">Submit</button>
                        </form>
                </div>
            </div>
        </div>
</div> @endsection
