<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        // $this->call(EmployeeSeeder::class);
        // $this->call(SupplierSeeder::class);
        // $this->call(CustomerSeeder::class);
        // $this->call(ProductSeeder::class);
        // $this->call(ProductNewSeeder::class);
        // $this->call(UserSeeder::class);
         $this->call(PembelianSeeder::class);
    }
}
