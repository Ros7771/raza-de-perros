<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRazaperroTemperamentoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('razaperro_temperamento', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('razaperro_id')->unsigned();
            $table->integer('temperamento_id')->unsigned();
            $table->foreign('razaperro_id')->references('id')->on('raza_perros')->onDelete('cascade');
            $table->foreign('temperamento_id')->references('id')->on('temperamentos')->onDelete('cascade');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::table('razaperro_temperamento', function (Blueprint $table) {
        $table->dropForeign('razaperro_temperamento_raza_perros_id_foreign');
        $table->dropColumn('razaperro_id');
        $table->dropForeign('razaperro_temperamento_temperamentos_id_foreign');
        $table->dropColumn('temperamento_id');
        });

        Schema::dropIfExists('razaperro_temperamento');
    }
}
