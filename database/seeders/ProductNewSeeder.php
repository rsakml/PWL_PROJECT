<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductNewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product')->insert([
            [
                'id_product' => '1',
                'foto' => 'arrivals1.png',
                'nama_product' => 'Wooden Chair',
                'merk' => 'iFurn Holic',
                'harga_beli' => '500000',
                'harga_jual' => '650000',
                'stok' => '5'

            ],
            [
                'id_product' => '2',
                'foto' => 'arrivals2.png',
                'nama_product' => 'Single Armchair',
                'merk' => 'iFurn Holic',
                'harga_beli' => '600000',
                'harga_jual' => '800000',
                'stok' => '5'

            ],
            [
                'id_product' => '3',
                'foto' => 'arrivals3.png',
                'nama_product' => 'Wooden Armchair',
                'merk' => 'iFurn Holic',
                'harga_beli' => '300000',
                'harga_jual' => '400000',
                'stok' => '5'

            ],
            [
                'id_product' => '4',
                'foto' => 'arrivals4.png',
                'nama_product' => 'Stylish Chair',
                'merk' => 'iFurn Holic',
                'harga_beli' => '800000',
                'harga_jual' => '1000000',
                'stok' => '5'

            ],
            [
                'id_product' => '5',
                'foto' => 'arrivals5.png',
                'nama_product' => 'Modern Chair',
                'merk' => 'iFurn Holic',
                'harga_beli' => '950000',
                'harga_jual' => '1200000',
                'stok' => '5'

            ],
            [
                'id_product' => '6',
                'foto' => 'arrivals6.png',
                'nama_product' => 'Mapple Wood Dinning Table',
                'merk' => 'iFurn Holic',
                'harga_beli' => '1000000',
                'harga_jual' => '1400000',
                'stok' => '5'

            ],
            [
                'id_product' => '7',
                'foto' => 'arrivals7.png',
                'nama_product' => 'Arm Chair',
                'merk' => 'iFurn Holic',
                'harga_beli' => '650000',
                'harga_jual' => '900000',
                'stok' => '5'

            ],
            [
                'id_product' => '8',
                'foto' => 'arrivals8.png',
                'nama_product' => 'Wooden Bed',
                'merk' => 'iFurn Holic',
                'harga_beli' => '900000',
                'harga_jual' => '1400000',
                'stok' => '5'

            ],
            [
                'id_product' => '9',
                'foto' => 'f1.jpg',
                'nama_product' => 'Designed Sofa',
                'merk' => 'iFurn Holic',
                'harga_beli' => '1200000',
                'harga_jual' => '1600000',
                'stok' => '5'

            ],
            [
                'id_product' => '10',
                'foto' => 'f2.jpg',
                'nama_product' => 'Dinning Table',
                'merk' => 'iFurn Holic',
                'harga_beli' => '1500000',
                'harga_jual' => '2000000',
                'stok' => '5'

            ],
            [
                'id_product' => '11',
                'foto' => 'f3.jpg',
                'nama_product' => 'Chair And Table',
                'merk' => 'iFurn Holic',
                'harga_beli' => '780000',
                'harga_jual' => '1000000',
                'stok' => '5'

            ],
            [
                'id_product' => '12',
                'foto' => 'f4.jpg',
                'nama_product' => 'Modern Arm Chair',
                'merk' => 'iFurn Holic',
                'harga_beli' => '2300000',
                'harga_jual' => '2990000',
                'stok' => '5'

            ]
        ]);
    }
}
