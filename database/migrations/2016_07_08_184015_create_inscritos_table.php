<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInscritosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inscritos', function (Blueprint $table) {
            $table->increments('id');
            $table->Integer('id_programa')->unsigned();;
            $table->Integer('insc');
            $table->Integer('anio');                  
            $table->timestamps();

            $table->foreign('id_programa')
                  ->references('id')->on('programa')
                  ->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('inscritos');
    }
}
