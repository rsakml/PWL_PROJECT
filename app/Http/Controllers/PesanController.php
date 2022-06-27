<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Pesanan;
use App\Models\User;
use App\Models\PesananDetails;
use Auth;
use Alert;
use App\Http\Middleware\Authenticate;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use PharIo\Manifest\Author;



class PesanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function indexProduct($id_product)
    {
    	$product = Product::where('id_product', $id_product)->first();

    	return view('pesan.index', compact('product'));
    }
    public function pesan(Request $request, $id_product)
    {	
    	$product= Product::where('id_product', $id_product)->first();
    	$tanggal = Carbon::now();

    	//validasi apakah melebihi stok
    	if($request->jumlah_pesan > $product->stok)
    	{
    		return redirect('pesan/'.$id_product);
    	}

    	//cek validasi
    	$cek_pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status',0)->first();
    	//simpan ke database pesanan
    	if(empty($cek_pesanan))
    	{
    		$pesanan = new Pesanan;
	    	$pesanan->user_id = Auth::user()->id;
	    	$pesanan->tanggal = $tanggal;
	    	$pesanan->status = 0;
	    	$pesanan->jumlah_harga = 0;
	    	$pesanan->save();
    	}
    	

    	//simpan ke database pesanan detail
    	$pesanan_baru = Pesanan::where('user_id', Auth::user()->id)->where('status',0)->first();

    	//cek pesanan detail
    	$cek_pesanan_detail = PesananDetails::where('id_product', $product->id_product)->where('pesanan_id', $pesanan_baru->id)->first();
    	if(empty($cek_pesanan_detail))
    	{
    		$pesanan_detail = new PesananDetails;
	    	$pesanan_detail->id_product = $product->id_product;
	    	$pesanan_detail->pesanan_id = $pesanan_baru->id;
	    	$pesanan_detail->jumlah = $request->jumlah_pesan;
	    	$pesanan_detail->jumlah_harga = $product->harga_jual*$request->jumlah_pesan;
	    	$pesanan_detail->save();
    	}else 
    	{
    		$pesanan_detail = PesananDetails::where('id_product', $product->id_product)->where('pesanan_id', $pesanan_baru->id)->first();

    		$pesanan_detail->jumlah = $pesanan_detail->jumlah+$request->jumlah_pesan;

    		//harga sekarang
    		$harga_pesanan_detail_baru = $product->harga_jual*$request->jumlah_pesan;
	    	$pesanan_detail->jumlah_harga = $pesanan_detail->jumlah_harga+$harga_pesanan_detail_baru;
	    	$pesanan_detail->update();
    	}

    	//jumlah total
    	$pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status',0)->first();
    	$pesanan->jumlah_harga = $pesanan->jumlah_harga+$product->harga_jual*$request->jumlah_pesan;
    	$pesanan->update();
        
        Alert()->success('Pesanan Sukses Masuk Keranjang','Success');
    	return redirect('check-out');

    }

    public function check_out()
    {
        $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status',0)->first();
 	    $pesanan_details = [];
        if(!empty($pesanan))
        {
            $pesanan_details = PesananDetails::where('pesanan_id', $pesanan->id)->get();

        }
        
        return view('pesan.check_out', compact('pesanan', 'pesanan_details'));
    }

    public function delete($id)
    {
        $pesanan_detail = PesananDetails::where('id', $id)->first();

        $pesanan = Pesanan::where('id', $pesanan_detail->pesanan_id)->first();
        $pesanan->jumlah_harga = $pesanan->jumlah_harga-$pesanan_detail->jumlah_harga;
        $pesanan->update();


        $pesanan_detail->delete();

        Alert()->success('Pesanan Sukses Dihapus','Success');
        return redirect('check-out');
    }

    public function konfirmasi()
    {
        $user = User::where('id', Auth::user()->id)->first();

        if(empty($user->alamat))
        {
            alert()->error('Pesanan Sukses Dihapus','Error');
            return redirect('profile');
        }

        if(empty($user->nohp))
        {
          alert()->error('Identitasi Harap dilengkapi', 'Error');
            return redirect('profile');
        }

        $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status',0)->first();
        $pesanan_id = $pesanan->id;
        $pesanan->status = 1;
        $pesanan->update();

        $pesanan_details = PesananDetails::where('pesanan_id', $pesanan_id)->get();
        foreach ($pesanan_details as $pesanan_detail) {
            $product = product::where('id_product', $pesanan_detail->id_product)->first();
            $product->stok = $product->stok-$pesanan_detail->jumlah;
            $product->update();
        }

        alert()->success('Pesanan Sukses Check Out Silahkan Lanjutkan Proses Pembayaran', 'Success');
        return redirect('history/');

    }

    // Untuk halaman admin

    public function index(Request $request)
    {
        //fungsi eloquent menampilkan data menggunakan paginaon
        // $products = Product::orderBy('id_product', 'asc')->paginate(5);
        $products = Product::all();
        return view('order.tampilanawal', compact('products'));

    }
    public function create()
    {
        return view('product.create');
    }
    public function store(Request $request)
    {
        //melakukan validasi data
        $request->validate([ 'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048', 'nama_product' => 'required', 'harga_jual' => 'required|numeric',
        'stok' => 'required|numeric', 
        ]);
        //fungsi eloquent untuk menambah data 
        Product::create($request->all());

        //jika data berhasil ditambahkan, akan kembali ke halaman utama 
        return redirect()->route('product.index')
        ->with('success', 'Product Berhasil Ditambahkan');
    }
    public function show($id_product)
    {
        //menampilkan detail data dengan menemukan/berdasarkan ... product
        $product = Product::find($id_product);
        return view('pesan.index', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_product)
    {
        //menampilkan detail data dengan menemukan berdasarkan id product untuk diedit
        $product = Product::find($id_product);
        return view('product.edit', compact('product'));


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
        //melakukan validasi data
        $request->validate([ 'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048', 'nama_product' => 'required', 'harga_jual' => 'required|numeric',
        'stok' => 'required|numeric', 
        ]);

        //fungsi eloquent untuk mengupdate data inputan kita 
        Product::find($id_product)->update($request->all());

        //jika data berhasil diupdate, akan kembali ke halaman utama 
        return redirect()->route('product.index')
        ->with('success', 'Product Berhasil Diupdate');


    }

    public function destroy($id_product)
    {
        //fungsi eloquent untuk menghapus data 
        Product::find($id_product)->delete();
        return redirect()->route('product.index')
        -> with('success', 'Product Berhasil Dihapus');

    }
}
?>