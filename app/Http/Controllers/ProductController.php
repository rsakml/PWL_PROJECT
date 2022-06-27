<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Product::orderBy('id_product', 'asc')->paginate(5);
        return view('product.index', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'nama_product' => 'required',
            'merk' => 'required',
            'harga_beli' => 'required|numeric',
            'harga_jual' => 'required|numeric',
            'stok' => 'required|numeric',
        ]);

        $foto = $request->file('foto')->store('images', 'public');

        Product::create([
            'id_product' => $request->id_customer,
            'foto' => $foto,
            'nama_product' => $request->nama_product,
            'merk' => $request->merk,
            'harga_beli' => $request->harga_beli,
            'harga_jual' => $request->harga_jual,
            'stok' => $request->stok
        ]);

        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('product.index')
            ->with('success', 'Product Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_product)
    {
        //menampilkan detail data dengan menemukan/berdasarkan id_product
        $Product = Product::find($id_product);
        return view('product.detail', compact('Product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_product)
    {
        //menampilkan detail data dengan menemukan berdasarkan id_product untuk diedit
        $Product = Product::find($id_product);
        return view('product.edit', compact('Product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_product)
    {
        $product = Product::findOrFail($id_product);
        $request->validate([
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'nama_product' => 'required',
            'merk' => 'required',
            'harga_beli' => 'required|numeric',
            'harga_jual' => 'required|numeric',
            'stok' => 'required|numeric',
        ]);

        $foto = $request->file('foto')->store('images', 'public');

        $product->update([
            'foto' => $foto,
            'merk' => $request->merk,
            'harga_beli' => $request->harga_beli,
            'harga_jual' => $request->harga_jual,
            'stok' => $request->stok
        ]);
        $product->save();

        //jika data berhasil diupdate, akan kembali ke halaman utama
        return redirect()->route('product.index')
            ->with('success', 'Product Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_product)
    {
        //fungsi eloquent untuk menghapus data
        Product::find($id_product)->delete();
        return redirect()->route('product.index')
            ->with('success', 'Product Berhasil Dihapus');
    }
}
