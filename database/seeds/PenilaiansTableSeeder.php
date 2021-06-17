<?php

use Illuminate\Database\Seeder;

class PenilaiansTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $penilaians=[
            [
                'id_santri'       => '1',
                'kode_nilai' => '20200617#1',
                'id_kategori' => '1',
                'keterangan'     =>'bagus',
            ],
            [
                'id_santri'       => '2',
                'kode_nilai' => '20200617#2',
                'id_kategori' => '3',
                'keterangan'     => 'sangat bagus',
            ]
        ];
        DB::table('penilaians')->insert($penilaians);
    }
}
