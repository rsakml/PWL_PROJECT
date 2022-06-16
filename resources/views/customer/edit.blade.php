@extends('admin.layout') @section('content') <div class="container mt-5">
        <div class="row justify-content-center align-items-center">
            <div class="card" style="width: 24rem;">
                <div class="card-header"> Edit Data Customer </div>
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
                        @endif <form method="post" action="{{ route('customer.update', $customer->id_customer) }}" id="myForm"
                            enctype="multipart/form-data">
                            @csrf @method('PUT')
                            <div class="form-group"> <label for="id_customer">Id Customer</label> <input type="text" name="id_customer"
                                    class="form-control" id="id_customer" value="{{ $customer->id_customer }}" aria-describedby="id_customer">
                            </div>
                            <div class="form-group"> <label for="foto">Foto</label> <input type="file" name="foto"
                                    class="form-control" id="foto" value="{{ $customer->foto }}"
                                    aria-describedby="foto"><img width="150" height="100"
                                    src="{{ asset('storage/' . $customer->foto) }}"> </div>
                            </div>
                            <div class="form-group"> <label for="nama">Nama</label> <input type="nama" name="nama"
                                    class="form-control" id="nama" value="{{ $customer->nama }}"
                                    aria-describedby="nama"> </div>
                            <div class="form-group"> <label for="jenisKelamin">jenisKelamin</label> <input
                                    type="jenisKelamin" name="jenisKelamin" class="form-control" id="jenisKelamin"
                                    value="{{ $customer->jenisKelamin }}" aria-describedby="jenisKelamin"> </div>
                            <div class="form-group"> <label for="alamat">Alamat</label> <input
                                    type="alamat" name="alamat" class="form-control" id="alamat"
                                    value="{{ $customer->alamat }}" aria-describedby="alamat"> </div>
                            <div class="form-group"> <label for="noTelp">No Telp</label> <input type="noTelp" name="noTelp"
                                class="form-control" id="noTelp" value="{{ $customer->noTelp }}"
                                    aria-describedby="noTelp"> </div> <button type="submit"
                                class="btn btn-primary">Submit</button>
                        </form>
                </div>
            </div>
        </div>
</div> @endsection
