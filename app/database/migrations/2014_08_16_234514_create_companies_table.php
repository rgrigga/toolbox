<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCompaniesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function(Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('brand');
			$table->string('phone');
            $table->string('email');
			$table->text('description');
			$table->string('slogan');
			$table->string('image');
			$table->string('menus');
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
        Schema::drop('companies');
    }

}
