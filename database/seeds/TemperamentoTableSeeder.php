<?php

use Illuminate\Database\Seeder;

class TemperamentoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $Temperamento= new \App\Temperamento();
        $Temperamento->nombre = 'inteligente';
        $Temperamento->save();

        $Temperamento= new \App\Temperamento();
        $Temperamento->nombre = 'entrenable';
        $Temperamento->save();

        $Temperamento= new \App\Temperamento();
        $Temperamento->nombre = 'energético';
        $Temperamento->save();

        $Temperamento= new \App\Temperamento();
        $Temperamento->nombre = 'amigable';
        $Temperamento->save();

        $Temperamento= new \App\Temperamento();
        $Temperamento->nombre = 'cariñoso';
        $Temperamento->save();

        $Temperamento= new \App\Temperamento();
        $Temperamento->nombre = 'juguetón';
        $Temperamento->save();

        $Temperamento= new \App\Temperamento();
        $Temperamento->nombre = 'alertas';
        $Temperamento->save();

        $Temperamento= new \App\Temperamento();
        $Temperamento->nombre = 'alegre';
        $Temperamento->save();
    }
}
