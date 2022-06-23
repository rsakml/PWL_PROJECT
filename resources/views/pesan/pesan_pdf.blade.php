<!DOCTYPE html>
<html>

<head>
    <title>Mencetak Resi Pesanan</title>
</head>

<style>
    table,
    th,
    td {
        border: 1px solid black;
        border-collapse: collapse;
    }
</style>

<body>
    <center>
        <h2>Detail Pesanan</h2>
    </center>
    <br>
    {{-- <b>Nama:</b> {{ $customer->nama }}<br> --}}

    <br><br><br>
    <table class="table table-bordered" width="700px">
        <tr>
            <th>No</th>
            <th>Gambar</th>
            <th>Nama product</th>
            <th>Jumlah</th>
            <th>Harga</th>
            <th>Total Harga</th>
        </tr>
        @foreach ($pesanan_details as $pesanan_detail)
            <tr>
                <td>{{ $pesanan_detail->product->foto }}</td>
                <td align="center">{{ $pesanan_detail->product->nama_product }}</td>
                <td align="center">{{ $pesanan_detail->jumlah }}</td>
                <td align="center">{{ number_format($pesanan_detail->product->harga) }}</td>
                <td align="center">{{ number_format($pesanan_detail->jumlah_harga) }}</td>
            </tr>
        @endforeach
    </table>
</body>

</html>