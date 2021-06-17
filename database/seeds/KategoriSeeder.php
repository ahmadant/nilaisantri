<?php

use Illuminate\Database\Seeder;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kategoris=[
            [
                'nama'=>'Sholat Subuh',
                'bobot'=>'30',
            ],
            [
                'nama'=>'Ngaji Subuh',
                'bobot'=>'50',
            ],
            [
                'nama'=>'Sholat Duha',
                'bobot'=>'10',
            ]
        ];
        DB::table('kategoris')->insert($kategoris);
    }
}
