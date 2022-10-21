<?php

use Leaf\Database;
use Illuminate\Database\Schema\Blueprint;

class CreateWineTypes extends Database
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!static::$capsule::schema()->hasTable('wine_types')) :
            static::$capsule::schema()->create('wine_types', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name')->unique();
                $table->timestamps();
            });
        endif;

        // you can now build your migrations with schemas
        // Schema::build(static::$capsule, dirname(__DIR__) . '/Schema/wine_types.json');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        static::$capsule::schema()->dropIfExists('wine_types');
    }
}
