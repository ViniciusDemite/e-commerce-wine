<?php

use Leaf\Database;
use Illuminate\Database\Schema\Blueprint;
use Leaf\Schema;

class CreateUsers extends Database {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()  {
		if (!static::$capsule::schema()->hasTable("users")):
			static::$capsule::schema()->create("users", function (Blueprint $table) {
					$table->increments('id');
				$table->string('username');
				$table->string('full_name');
				$table->string('email')->unique();
				$table->timestamp('email_verified_at')->nullable();
				$table->string('password');
				$table->rememberToken();
				$table->timestamps();
			});
		endif;
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		static::$capsule::schema()->dropIfExists("users");
	}
}
