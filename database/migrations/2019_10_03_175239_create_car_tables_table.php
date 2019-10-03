<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarTablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('car_tables', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('model_id')->unsigned()->index()->nullable();
            $table->foreign('model_id')->references('id')->on('car_model');
            $table->integer('equipment_id')->unsigned()->index()->nullable();
            $table->foreign('equipment_id')->references('id')->on('equipments');
            $table->integer('color_id')->unsigned()->index()->nullable();
            $table->foreign('color_id')->references('id')->on('colors');
            $table->double('price');
            $table->year('year');
            $table->boolean('is_free')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('car_tables');
    }
}
