<?php

use Illuminate\Database\Migrations\Migration;

class CreateProfilesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function($table) {
            $table->increments('id');
            $table->integer('user_id')->index();
            $table->string('username', 255);
            $table->string('uid', 255);
            $table->string('access_token', 255);
            $table->string('access_token_secret', 255)->nullable();
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
        Schema::drop('profiles');
    }

}