<?php

use Illuminate\Database\Seeder;

class InformacionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Premiacion.informacion')->insert([
            'informacion' => 'HOLA HOLA HOLA',
            'firma_1'   => 'VACIO',
            'firma_2'   => 'VACIO',
            'firma_3'   => 'VACIO',
            'cargo_1'   => 'VACIO',
            'cargo_2'   => 'VACIO',
            'cargo_3'   => 'VACIO'
        ]);
    }
}
