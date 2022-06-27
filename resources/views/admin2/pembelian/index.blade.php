@extends('admin.layout')
 @section('content')
 
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-center mt-2">
                <Center>Daftar Transaksi Pembelian</Center>
            </div>
            <div class="float-right my-2">
                <a class="btn btn-success" href="{{ route('admin3.create') }}"> Input Data</a>
            </div>
            <br>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
        @endif 
        <table class="table table-striped table-hover">
            <tr>
                <th>Id</th>
                <th>Nama Supplier</th>
                <th>Alamat</th>
                <th>No Hp</th>
                <th>Nama Bahan</th>
                <th>Jumlah</th>
                <th>Harga</th>
                <th wid_pembelianth="280px">Action</th>
            </tr>
            @foreach ($pembelian as $p)
                <tr>
                    <td>{{ $p->id_pembelian }}</td>
                    <td>{{ $p->nama_supplier }}</td>
                    <td>{{ $p->alamat }}</td>
                    <td>{{ $p->nohp }}</td>
                    <td>{{ $p->nama_bahan }}</td>
                    <td>{{ $p->jumlah }}</td>
                    <td>{{ $p->harga }}</td>
                    <td>
                        <form action="{{ route('admin3.destroy', $p->id_pembelian) }}" method="POST"> <a
                                class="btn btn-info" href="{{ route('admin3.show', $p->id_pembelian) }}">Show</a>
                                <a class="btn btn-primary" href="{{ route('admin3.edit', $p->id_pembelian) }}">Edit</a>
                            @csrf
                             @method('DELETE') <button type="submit" class="btn btn-danger"
                             onclick="return confirm('Anda yakin akan menghapus data ?');">Delete</button> </form>
                    </td>
                </tr>
            @endforeach 
        </table>
        <br>
        {{$pembelian->links()}}
    @endsection