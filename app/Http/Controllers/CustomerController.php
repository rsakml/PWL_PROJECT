<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //fungsi eloquent menampilkan data menggunakan paginaon
        $customer = Customer::orderBy('id_customer', 'asc')->paginate(5);
        return view('customer.index', compact('customer'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('customer.create');
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
            'nama' => 'required', 'jenisKelamin' => 'required', 'alamat' => 'required', 'noTelp' => 'required|numeric',
        ]);

        $foto = $request->file('foto')->store('images', 'public');
        //fungsi eloquent untuk menambah data 
        Customer::create([
            'id_customer' => $request->id_customer,
            'foto' => $foto,
            'nama' => $request->nama,
            'jenisKelamin' => $request->jenisKelamin,
            'alamat' => $request->alamat,
            'noTelp' => $request->noTelp
        ]);
        //jika data berhasil ditambahkan, akan kembali ke halaman utama 
        return redirect()->route('customer.index')
            ->with('success', ' Customer Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_customer)
    {
        //menampilkan detail data dengan menemukan/berdasarkan id Employee
        $customer = Customer::find($id_customer);
        return view('customer.detail', compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_customer)
    {
        //menampilkan detail data dengan menemukan berdasarkan id Employee untuk diedit
        $customer = Customer::find($id_customer);
        return view('customer.edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_customer)
    {
        //melakukan validasi data
        $customer = Customer::findOrFail($id_customer);
        $request->validate([
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'nama' => 'required', 'jenisKelamin' => 'required', 'alamat' => 'required', 'noTelp' => 'required|numeric',
        ]);

        $foto = $request->file('foto')->store('images', 'public');
        //fungsi eloquent untuk menambah data 
        $customer->update([
            'foto' => $foto,
            'nama' => $request->nama,
            'jenisKelamin' => $request->jenisKelamin,
            'alamat' => $request->alamat,
            'noTelp' => $request->noTelp
        ]);
        $customer->save();
        //jika data berhasil diupdate, akan kembali ke halaman utama 
        return redirect()->route('customer.index')
            ->with('success', 'Customer Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_customer)
    {
        //fungsi eloquent untuk menghapus data 
        Customer::find($id_customer)->delete();
        return redirect()->route('customer.index')
            ->with('success', 'Customer Berhasil Dihapus');
    }
}