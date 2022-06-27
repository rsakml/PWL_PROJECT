@extends('admin.layout')
 @section('content')

 <div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-center mt-2">
            <Center>DATA CUSTOMER</Center>
        </div>
        <br>
        <div class="float-right my-2"> <a class="btn btn-success" href="{{ route('customer.create') }}"> Input
                Data</a>
</div> 
 @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif 
    <table class="table table-striped table-hover">
        <tr>
            <th>Id Customer</th>
            <th>Foto</th>
            <th>Nama Customer</th>
            <th>Jenis Kelamin</th>
            <th>Alamat</th>
            <th>No Telp</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($customer as $c)
            <tr>
                <td>{{ $c->id_customer }}</td>
                <td>{{ $c->nama }}</td>
                <td><img height="200" width="180"  src="{{asset('storage/'.$c->foto)}}"></td>      
                <td>{{ $c->jenisKelamin }}</td>
                <td>{{ $c->alamat }}</td>
                <td>{{ $c->noTelp }}</td>
                <td>
                    <form action="{{ route('customer.destroy', $c->id_customer) }}" method="POST"> <a
                            class="btn btn-primary" href="{{ route('customer.edit', $c->id_customer) }}">Edit</a>
                            <a class="btn btn-info" href="{{ route('customer.show', $c->id_customer) }}">Show</a>
                        @csrf
                         @method('DELETE') <button type="submit" class="btn btn-danger"
                         onclick="return confirm('Anda yakin akan menghapus data ?');">Delete</button> </form>
                </td>
            </tr>
        @endforeach 
    </table>
    <br>
    <br>
    {{$customer -> links()}}
@endsection