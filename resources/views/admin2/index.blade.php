@extends('admin.layout')
 @section('content')
 
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-center mt-2">
                <Center>Daftar Transaksi Penjualan</Center>
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
                <th>Tanggal</th>
                <th>Status</th>
                <th>Jumlah Harga</th>
                <th width="280px">Action</th>
            </tr>
            @foreach ($pesanan as $p)
                <tr>
                    <td>{{ $p->id }}</td>
                    <td>{{ $p->tanggal }}</td>
                    <td>{{ $p->status }}</td>
                    <td>{{ $p->jumlah_harga }}</td>
                    <td>
                        <form action="{{ route('admin2.destroy', $p->id) }}" method="POST"> <a
                                class="btn btn-info" href="{{ route('admin2.show', $p->id) }}">Show</a>
                                <a class="btn btn-primary" href="{{ route('admin2.edit', $p->id) }}">Edit</a>
                            @csrf
                             @method('DELETE') <button type="submit" class="btn btn-danger"
                             onclick="return confirm('Anda yakin akan menghapus data ?');">Delete</button> </form>
                    </td>
                </tr>
            @endforeach 
        </table>
        <br>
        {{$pesanan->links()}}
    @endsection