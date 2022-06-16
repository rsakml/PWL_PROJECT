<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //fungsi eloquent menampilkan data menggunakan paginaon
        $supplier = Supplier::orderBy('id', 'asc')->paginate(5);
        return view('supplier.index', compact('supplier'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('supplier.create');
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
        $request->validate([  'nama' => 'required', 'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'kategori' => 'required', 'email' => 'required',
        ]);
        //fungsi eloquent untuk menambah data 
        $gambar = $request->file('gambar')->store('images', 'public');
        //fungsi eloquent untuk menambah data 
        Supplier::create([
            'nama' => $request->nama,
            'kategori' => $request->kategori,
            'email' => $request->email,
            'gambar' => $gambar
        ]);

        //jika data berhasil ditambahkan, akan kembali ke halaman utama 
        return redirect()->route('supplier.index')
        ->with('success', 'supplier Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //menampilkan detail data dengan menemukan/berdasarkan id supplier
        $supplier = Supplier::find($id);
        return view('supplier.detail', compact('supplier'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //menampilkan detail data dengan menemukan berdasarkan id supplier untuk diedit
        $supplier = Supplier::find($id);
        return view('supplier.edit', compact('supplier'));
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
        $supplier = Supplier::findOrFail($id);
        $request->validate([  'nama' => 'required', 'gambar' => 'required',
        'kategori' => 'required', 'email' => 'required',
        ]);

        //fungsi eloquent untuk mengupdate data inputan kita 
        $gambar = $request->file('gambar')->store('images','public');
        $supplier->update([
            'nama' => $request->nama,
            'kategori' => $request->kategori,
            'email' => $request->email,
            'gambar' => $gambar
        ]);
        $supplier->save();
        //jika data berhasil diupdate, akan kembali ke halaman utama 
        return redirect()->route('supplier.index')
        ->with('success', 'supplier Berhasil Diupdate');
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
        Supplier::find($id)->delete();
        return redirect()->route('supplier.index')
        -> with('success', 'supplier Berhasil Dihapus');
    }
}
