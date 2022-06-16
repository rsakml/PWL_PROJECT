<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pesanan;
use App\Models\Product;

class PesananDetails extends Model
{
    use HasFactory;

    protected $table = 'pesanan_details';
    protected $primaryKey = 'id';

    protected $fillable = [
        'jumlah',
        'jumlah_harga'
    ];

    public function product() 
	{
         return $this->belongsTo(Product::class,'id_product');
	}
    

    public function pesanan()
	{
	      return $this->belongsTo(Pesanan::class,'pesanan_id', 'id');
	}
}