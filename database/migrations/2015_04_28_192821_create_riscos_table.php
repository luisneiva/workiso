<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRiscosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('riscos', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('ativo_id')->unsigned();
			$table->text('vulnerabilidade');
			$table->text('ameaca');
			$table->text('consequencia')->nullable();
			$table->enum('probabilidade', ['1','2','3','4']);
			$table->enum('impacto', ['1','2','3','4','5']);
			$table->timestamps();

			$table->foreign('ativo_id')->references('id')->on('ativos');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('riscos');
	}

}
