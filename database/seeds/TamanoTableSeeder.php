<?php

use Illuminate\Database\Seeder;

class TamanoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $Tamano= new \App\Tamano();
        $Tamano->nombre = 'toy';
        $Tamano->save();

        $Tamano= new \App\Tamano();
        $Tamano->nombre = 'pequeño';
        $Tamano->save();

        $Tamano= new \App\Tamano();
        $Tamano->nombre = 'mediano';
        $Tamano->save();

        $Tamano= new \App\Tamano();
        $Tamano->nombre = 'grande';
        $Tamano->save();

        $Tamano= new \App\Tamano();
        $Tamano->nombre = 'gigante';
        $Tamano->save();
    }
}
