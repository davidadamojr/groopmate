<?php

use Illuminate\Database\Migrations\Migration;

class CreateQuizquestionsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quiz_questions', function($table) {
            $table->increments('id');
            $table->string('text', 250);
            $table->integer('quiz_id')->index();
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
        Schema::drop('quiz_questions');
    }

}