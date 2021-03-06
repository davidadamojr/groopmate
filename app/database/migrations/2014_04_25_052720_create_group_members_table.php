<?php

use Illuminate\Database\Migrations\Migration;

class CreateGroupmembersTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('group_members', function($table) {
            $table->increments('id');
            $table->integer('group_id')->index();
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
        Schema::drop('group_members');
    }

}