<?php

namespace App\Http\Controllers;

use App\Models\Pembelian;
use Illuminate\Http\Request;

class PembelianController extends Controller
{
    public function index()
    {
        //fungsi eloquent menampilkan data menggunakan paginaon
        $pembelian = Pembelian::orderBy('id_pembelian', 'asc')->paginate(5);
        return view('admin2.pembelian.index', compact('pembelian'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin2.pembelian.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //melakukan validate data
        $request->validate([ 'nama_supplier' => 'required', 'alamat' => 'required', 'nohp' => 'required|numeric'
        , 'nama_bahan' => 'required', 'jumlah' => 'required|numeric', 'harga' => 'required|numeric'
        ]);
        //fungsi eloquent untuk menambah data 
        Pembelian::create($request->all());

        //jika data berhasil ditambahkan, akan kembali ke halaman utama 
        return redirect()->route('admin3.index')
        ->with('success', 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id_pembelian
     * @return \Illuminate\Http\Response
     */
    public function show($id_pembelian)
    {
         //menampilkan detail data dengan menemukan/berdasarkan ... Data
         $pembelian = Pembelian::where('id_pembelian', $id_pembelian)->first();
         return view('admin2.pembelian.detail', compact('pembelian'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id_pembelian
     * @return \Illuminate\Http\Response
     */
    public function edit($id_pembelian)
    {
        //menampilkan detail data dengan menemukan berdasarkan Nim Data untuk diedit
        $pembelian = Pembelian::find($id_pembelian);
        return view('admin2.pembelian.edit', compact('pembelian'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id_pembelian
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_pembelian)
    {
        //melakukan valid_pembelianasi data
        $request->validate([ 'nama_supplier' => 'required', 'alamat' => 'required', 'nohp' => 'required|numeric'
        , 'nama_bahan' => 'required', 'jumlah' => 'required|numeric', 'harga' => 'required|numeric'
        ]);

        //fungsi eloquent untuk mengupdate data inputan kita 
        Pembelian::find($id_pembelian)->update($request->all());

        //jika data berhasil diupdate, akan kembali ke halaman utama 
        return redirect()->route('admin3.index')
        ->with('success', 'Data Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id_pembelian
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_pembelian)
    {
        //fungsi eloquent untuk menghapus data 
        Pembelian::find($id_pembelian)->delete();
        return redirect()->route('admin3.index')
        -> with('success', 'Data Berhasil Dihapus');
    }
}
?>
