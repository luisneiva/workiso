<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTratamentosTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tratamentos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('risco_id')->unsigned();
            $table->text('tratamento');
            $table->text('controlo')->nullable();
            $table->text('beneficios')->nullable();
            $table->timestamps();

            $table->foreign('risco_id')->references('id')->on('riscos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tratamentos');
    }

}
