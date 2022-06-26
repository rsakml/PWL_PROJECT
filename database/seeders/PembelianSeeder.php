<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PembelianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pembelian')->insert([
            [
                'nama_supplier' => 'Nagarey',
                'alamat' => 'Jln.Hayam Wuruk Mojokerto',
                'nohp' => '086754342345',
                'nama_bahan' => 'Kayu Jati',
                'jumlah' => '10',
                'harga' => '70000000',
            ]
        ]);
    }
}
