<?php

use Illuminate\Database\Migrations\Migration;

class CreateQuizoptionsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quiz_options', function($table) {
            $table->increments('id');
            $table->string('text', 100);
            $table->boolean('correct');
            $table->integer('question_id')->index();
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
        Schema::drop('quiz_options');
    }

}