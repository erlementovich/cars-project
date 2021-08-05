<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarImageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('car_image', function (Blueprint $table) {
            $table->unsignedBigInteger('car_id');
            $table->unsignedBigInteger('image_id');

            $table->primary(['car_id', 'image_id']);
            $table->foreign('car_id')->references('id')->on('cars')->cascadeOnDelete();
            $table->foreign('image_id')->references('id')->on('images')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('car_image');
    }
}
