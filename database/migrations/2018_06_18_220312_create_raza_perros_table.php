<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRazaPerrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('raza_perros', function (Blueprint $table) {
          $table->increments('id');
           $table->string('nombre', 100);
           $table->text('descripcion');
           $table->integer('alturaInicial');
           $table->integer('alturaFinal');
           //Asociarlo con un usuario
            $table->unsignedInteger('user_id');
           $table->timestamps();
           $table->integer('tamano_id')->unsigned();
           $table->foreign('tamano_id')->references('id')->on('tamanos')->onDelete('cascade');
           $table->foreign('user_id')->
                       references('id')->
                       on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('raza_perros', function (Blueprint $table) {
          $table->dropForeign('raza_perros_tamanos_id_foreign');
          $table->dropColumn('tamanos_id');
        });

        Schema::dropIfExists('raza_perros');
    }
}
