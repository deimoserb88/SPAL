<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEncuestasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('encuesta', function (Blueprint $table) {
            $table->increments('id');
            $table->tinyInteger('ver')->default(0)->unsigned();
            $table->date('feap');
            $table->integer('id_deleg')->unsigned();
            $table->string('plant',4);
            $table->integer('id_programa')->unsigned();
            $table->tinyInteger('gene1')->unsigned();
            $table->tinyInteger('gene2')->unsigned();
            $table->tinyInteger('gene3')->unsigned();
            $table->tinyInteger('gene4')->unsigned();
            $table->tinyInteger('gene5')->unsigned();
            $table->tinyInteger('ipa1')->unsigned();
            $table->tinyInteger('ipa2')->unsigned();
            $table->tinyInteger('ipa3')->unsigned();
            $table->tinyInteger('ipa4')->unsigned();
            $table->tinyInteger('ipa5')->unsigned();
            $table->tinyInteger('en1')->unsigned();
            $table->tinyInteger('en2')->unsigned();
            $table->tinyInteger('en3')->unsigned();
            $table->tinyInteger('en4')->unsigned();
            $table->tinyInteger('en5')->unsigned();
            $table->tinyInteger('cp1')->unsigned();
            $table->tinyInteger('cp2')->unsigned();
            $table->tinyInteger('cp3')->unsigned();
            $table->tinyInteger('cp4')->unsigned();
            $table->tinyInteger('cp5')->unsigned();
            $table->text('pa1');
            $table->text('pa2');
            $table->text('pa3');
            $table->text('pa4');
            $table->text('pa5');
            $table->text('coment');
            $table->timestamps();

            $table->foreign('id_programa')
                  ->references('id')->on('programa');
            
            $table->foreign('plant')
                  ->references('plant')->on('des');
                  

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('encuesta');
    }
}
