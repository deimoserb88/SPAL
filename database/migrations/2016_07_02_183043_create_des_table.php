<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('des', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_deleg')->unsigned();
            $table->string('plant',4)->unique();            
            $table->string('nomplant',100);
            $table->string('siglas',10);            
            $table->timestamps();

            $table->foreign('id_deleg')
                    ->references('id')->on('deleg');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('des');
    }
}
