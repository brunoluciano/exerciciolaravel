<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFksToFuncionarios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('funcionarios', function (Blueprint $table) {
            $table->unsignedBigInteger('cargo_id')->after('nome');
            $table->unsignedBigInteger('level_id')->after('cargo_id');
            $table->foreign('cargo_id')->references('id')->on('cargos');
            $table->foreign('level_id')->references('id')->on('levels');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('funcionarios', function (Blueprint $table) {
            $table->dropColumn('cargo_id');
            $table->dropColumn('level_id');
            $table->dropForeign('cargo_id');
            $table->dropForeign('level_id');
        });
    }
}
