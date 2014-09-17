<?php

use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('categories', function($table){
			$table->increments('id');
			$table->string('name');
			$table->timestamps();
		});

		Schema::create('products', function($table){
			$table->increments('id');
			$table->integer('category_id')->unsigned();
			$table->foreign('category_id')->references('id')->on('categories');
			$table->string('title');
			$table->text('description');
			$table->decimal('price', 6, 2);
			$table->boolean('availability')->default(1);
			$table->string('image');
			$table->string('image_orig');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('products');
	}

}
