<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('customer')->insert([
            [
                'id_customer' => '123',
                'foto' => 'p1.png',
                'nama' => 'Dea Nada',
                'jenisKelamin' => '1',
                'alamat' => 'Jember',
                'noTelp' => '088167563456'
            ],
            [
                'id_customer' => '124',
                'foto' => 'p2.png',
                'nama' => 'Sezha Dwi',
                'jenisKelamin' => '0',
                'alamat' => 'Mojokerto',
                'noTelp' => '088167563457'
            ],
            [
                'id_customer' => '125',
                'foto' => 'p3.png',
                'nama' => 'Lisa Ayu',
                'jenisKelamin' => '1',
                'alamat' => 'Mojokerto',
                'noTelp' => '088167563411'
            ],
            [
                'id_customer' => '126',
                'foto' => 'p4.png',
                'nama' => 'Dina P.',
                'jenisKelamin' => '1',
                'alamat' => 'Jogja',
                'noTelp' => '085814523455'
            ],
            [
                'id_customer' => '127',
                'foto' => 'p5.png',
                'nama' => 'Zahra Nisva',
                'jenisKelamin' => '1',
                'alamat' => 'Jogja',
                'noTelp' => '086741323321'
            ],
            [
                'id_customer' => '128',
                'foto' => 'p6.png',
                'nama' => 'Daffa R',
                'jenisKelamin' => '0',
                'alamat' => 'Jombang',
                'noTelp' => '088167563123'
            ]

        ]);
    }
}
