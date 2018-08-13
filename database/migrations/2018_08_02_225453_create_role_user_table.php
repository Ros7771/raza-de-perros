<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoleUserTable extends Migration
{
    /**
     * Run the migrations.
     * @return void
     */
    public function up()
    {
        Schema::create('role_user', function (Blueprint $table) {
          $table->unsignedInteger('user_id');
          $table->unsignedInteger('role_id');
            $table->timestamps();
            $table->unique(['user_id', 'role_id']);
          $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
          $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
        });
    }
    /**
       * Reverse the migration
       * @return void
       */
      public function down()
      {
        Schema::table('role_user', function (Blueprint $table) {
            $table->dropForeign('role_user_user_id_foreign');
            $table->dropColumn('user_id');
            $table->dropForeign('role_user_role_id_foreign');
            $table->dropColumn('role_id');
        });
          Schema::dropIfExists('role_user');
      }
}
