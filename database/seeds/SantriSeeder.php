<?php

use Illuminate\Database\Seeder;

class SantriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $santris=[
            [
                'nama'   => 'andihoerudin',
                'alamat' => 'cibinog bogor',
                'nis'    => '065115114',
                'foto'   =>'foto'
            ],
            [
                'nama'   => 'hoerudin',
                'alamat' => 'bogor',
                'nis'    => '065115115',
                'foto'   =>'foto hoerudin'
            ],
        ];
        DB::table('santris')->insert($santris);
    }
}
