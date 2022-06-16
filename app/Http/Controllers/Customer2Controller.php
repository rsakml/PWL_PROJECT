<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customer = Customer::orderBy('id_customer', 'asc')->paginate(5);
        return view('customer.index', ['customer' => $customer]);

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
        //melakukan validasi data
        $request->validate([
            'id_customer' => 'required',
            'foto' => 'required|file|image|mimes:jpeg,png,jpg|max:1024',
            'nama' => 'required',
            'jenisKelamin' => 'required',
            'kelas' => 'required',
            'jurusan' => 'required',
            'no_handphone' => 'required',
            'email' => 'required',
            ]);

            $customer = new Customer;
            $customer->id_customer = $request->get('id_customer');
            $customer->foto = $request->file('foto')->store('images', 'public');
            $customer->nama = $request->get('nama');
            $customer->jenisKelamin = $request->get('jenisKelamin');
            $customer->alamat = $request->get('alamat');
            $customer->noTelp = $request->get('noTelp');
            $customer->save();
    
            //jika data berhasil ditambahkan, akan kembali ke halaman utama
            return redirect()->route('customer.index')
            ->with('success', 'Customer Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $nim
     * @return \Illuminate\Http\Response
     */
    public function show($id_customer)
    {
     
        $customer = Customer::find($id_customer);
        return view('customer.detail', ['Customer' => $customer]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $nim
     * @return \Illuminate\Http\Response
     */
    public function edit($id_customer)
    {
        $customer = Customer::find($id_customer);
        return view('customer.edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $nim
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $nim)
    {
        //melakukan validasi data
        $request->validate([
            'id_customer' => 'required',
            'foto' => 'required|file|image|mimes:jpeg,png,jpg|max:1024',
            'nama' => 'required',
            'jenisKelamin' => 'required',
            'kelas' => 'required',
            'jurusan' => 'required',
            'no_handphone' => 'required',
            'email' => 'required',
            ]);

            $customer = new Customer;
            $customer->nim = $request->get('id_customer');
            if($customer->foto && file_exists(storage_path('app/public/'. $customer->foto))){
                \Storage::delete('public/'. $customer->foto);
            }
            $image_name = $request->file('foto')->store('images', 'public');
            $customer->nama = $request->get('nama');
            $customer->foto = $image_name;
            $customer->tglLahir = $request->get('tglLahir');
            $customer->jurusan = $request->get('jurusan');
            $customer->no_handphone = $request->get('no_handphone');
     
        
    
            //fungsi eloquent untuk update data dengan relasi belongsTo
            $mahasiswa->kelas()->associate($kelas);
            $mahasiswa->save();

        //jika data berhasil diupdate, akan kembali ke halaman utama
            return redirect()->route('mahasiswa.index')
            ->with('success', 'Mahasiswa Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $nim
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