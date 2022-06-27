<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Pesanan;
use App\Models\User;
use App\Models\PesananDetails;
use Auth;
use Alert;
use Illuminate\Http\Request;
use PDF;

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

    public function indexhistory()
    {
    	$pesanans = Pesanan::where('user_id', Auth::user()->id)->where('status', '!=',0)->get();

    	return view('history.index', compact('pesanans'));
    }

    public function detail($id)
    {
    $pesanan = Pesanan::where('id', $id)->first();
    $pesanan_details = PesananDetails::where('pesanan_id', $pesanan->id)->get();

    return view('history.detail', compact('pesanan','pesanan_details'));
    }

    //////////////////////////////////////Halaman admin//////////////////////////////////////////

    public function index(Request $request)
    {
        //fungsi eloquent menampilkan data menggunakan paginaon
        $pesanan = Pesanan::orderBy('id', 'asc')->paginate(5);
        return view('admin2.index', compact('pesanan'));

    }
    public function create()
    {
        return view('admin2.create');
    }
    public function store(Request $request)
    {
        //melakukan validasi data
        $request->validate([ 'tanggal' => 'required', 'status' => 'required', 'jumlah_harga' => 'required|numeric'
        ]);
        //fungsi eloquent untuk menambah data 
        Pesanan::create($request->all());

        //jika data berhasil ditambahkan, akan kembali ke halaman utama 
        return redirect()->route('admin2.index')
        ->with('success', 'product Berhasil Ditambahkan');
    }
    public function show($id)
    {
        //menampilkan detail data dengan menemukan/berdasarkan ... product
        $pesanan = Pesanan::find($id);
        return view('admin2.detail', compact('pesanan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //menampilkan detail data dengan menemukan berdasarkan Nim product untuk diedit
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
        ->with('success', 'product Berhasil Diupdate');


    }

    public function destroy($id)
    {
        //fungsi eloquent untuk menghapus data 
        Pesanan::find($id)->delete();
        return redirect()->route('admin2.index')
        -> with('success', 'product Berhasil Dihapus');

    }

    
    public function cetak_pdf()
    {
        $pesanan = PesananDetails::all();
        $pdf = PDF::loadview('pesan.pesan_pdf', ['pesanan_details' => $pesanan]);
        return $pdf->stream();
    }
}
?>