<?php

use Illuminate\Database\Migrations\Migration;

class CreateQuizresultsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quiz_results', function($table) {
            $table->increments('id');
            $table->integer('user_id')->index();
            $table->integer('score');
            $table->integer('quiz_id')->index();
            $table->boolean('completed');
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
        Schema::drop('quiz_results');
    }

}