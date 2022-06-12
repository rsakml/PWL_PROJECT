<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Pesanan;
use App\Models\User;
use App\Models\PesananDetails;
use Auth;
use Alert;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    
    public function index(Request $request)
    {
        //fungsi eloquent menampilkan data menggunakan paginaon
        $pesanan = Pesanan::orderBy('id_product', 'asc')->paginate(5);
        return view('order.index', compact('pesanan'));

    }
    public function create()
    {
        return view('admin.pesancreate');
    }
    public function store(Request $request)
    {
        //melakukan validasi data
        $request->validate([ 'tanggal' => 'required', 'status' => 'required', 'jumlah_harga' => 'required'
        ]);
        //fungsi eloquent untuk menambah data 
        Pesanan::create($request->all());

        //jika data berhasil ditambahkan, akan kembali ke halaman utama 
        return redirect()->route('admin2.index')
        ->with('success', 'Menu Berhasil Ditambahkan');
    }
    public function show($id)
    {
        //menampilkan detail data dengan menemukan/berdasarkan ... Menu
        $pesanan = Pesanan::find($id);
        return view('admin.pesandetail', compact('pesanan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //menampilkan detail data dengan menemukan berdasarkan Nim Menu untuk diedit
        $pesanan = Pesanan::find($id);
        return view('admin.pesanedit', compact('pesanan'));


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //melakukan validasi data
        $request->validate([ 'tanggal' => 'required', 'status' => 'required', 'jumlah_harga' => 'required'
        ]);

        //fungsi eloquent untuk mengupdate data inputan kita 
        Pesanan::find($id)->update($request->all());

        //jika data berhasil diupdate, akan kembali ke halaman utama 
        return redirect()->route('admin2.index')
        ->with('success', 'Menu Berhasil Diupdate');


    }

    public function destroy($id)
    {
        //fungsi eloquent untuk menghapus data 
        Pesanan::find($id)->delete();
        return redirect()->route('admin2.index')
        -> with('success', 'Menu Berhasil Dihapus');

    }
}
?>