<?php

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
         $this->call(UsersTableSeeder::class);
         $this->call(SantriSeeder::class);
         $this->call(KategoriSeeder::class);
         $this->call(PenilaiansTableSeeder::class);
    }
}
