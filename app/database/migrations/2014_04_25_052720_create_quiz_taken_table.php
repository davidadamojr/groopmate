<?php

use Illuminate\Database\Migrations\Migration;

class CreateQuiztakenTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quiz_taken', function($table) {
            $table->increments('id');
            $table->integer('quiz_id')->index();
            $table->integer('user_id')->index();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('quiz_taken');
    }

}