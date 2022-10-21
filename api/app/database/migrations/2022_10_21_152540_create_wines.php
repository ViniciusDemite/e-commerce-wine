<?php

use Leaf\Database;
use Illuminate\Database\Schema\Blueprint;

class CreateWines extends Database
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!static::$capsule::schema()->hasTable('wines')) :
            static::$capsule::schema()->create('wines', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name');
                $table->float('weight')->unsigned();
                $table->foreignId('type_id')->constrained('wine_types');
                $table->timestamps();
            });
        endif;

        // you can now build your migrations with schemas
        // Schema::build(static::$capsule, dirname(__DIR__) . '/Schema/wines.json');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        static::$capsule::schema()->dropIfExists('wines');
    }
}
