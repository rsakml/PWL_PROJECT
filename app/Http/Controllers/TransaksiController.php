<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use App\Models\PesananDetails;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //fungsi eloquent menampilkan data menggunakan paginaon
        $pesanan = Pesanan::orderBy('tanggal', 'desc')->paginate(5);
        return view('admin2.index', compact('pesanan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin2.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //melakukan validasi data
        $request->validate([ 'tanggal' => 'required', 'status' => 'required', 'jumlah_harga' => 'required|numeric'
        ]);
        //fungsi eloquent untuk menambah data 
        Pesanan::create($request->all());

        //jika data berhasil ditambahkan, akan kembali ke halaman utama 
        return redirect()->route('admin2.index')
        ->with('success', 'Menu Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         //menampilkan detail data dengan menemukan/berdasarkan ... Menu
         $pesanan = Pesanan::where('id', $id)->first();
         $pesanan_details = PesananDetails::where('pesanan_id', $pesanan->id)->get();
     
         return view('admin2.detail', compact('pesanan','pesanan_details'));
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
        return view('admin2.edit', compact('pesanan'));

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
        $request->validate([ 'tanggal' => 'required', 'status' => 'required', 'jumlah_harga' => 'required|numeric'
        ]);

        //fungsi eloquent untuk mengupdate data inputan kita 
        Pesanan::find($id)->update($request->all());

        //jika data berhasil diupdate, akan kembali ke halaman utama 
        return redirect()->route('admin2.index')
        ->with('success', 'Menu Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //fungsi eloquent untuk menghapus data 
        Pesanan::find($id)->delete();
        return redirect()->route('admin2.index')
        -> with('success', 'Menu Berhasil Dihapus');
    }
}
?>
