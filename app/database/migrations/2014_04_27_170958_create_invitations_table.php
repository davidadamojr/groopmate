<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvitationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('invitations', function($table){
			$table->increments('id');
			$table->integer('group_id');
			$table->string('email');
			$table->boolean('accepted')->default(false);
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
		Schema::drop('invitations');
	}

}
