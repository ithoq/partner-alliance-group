<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePropertiesModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('property_estate')->default(1);
            $table->string('property_lot_number')->default('Unavailable');
            $table->string('property_street')->default('Unavailable');
            $table->string('property_suburb')->default('Unavailable');
            $table->string('property_price')->default('Unavailable');
            $table->integer('property_design')->default(1);
            $table->string('property_size')->default('Unavailable');
            $table->string('property_land')->default('Unavailable');
            $table->string('property_bed')->default('Unavailable');
            $table->string('property_bath')->default('Unavailable');
            $table->string('property_car')->default('Unavailable');
            $table->string('property_titled')->default('Unavailable');
            $table->string('property_status')->default('available');
            $table->boolean('is_published')->default('0');
            $table->softDeletes();
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
        Schema::dropIfExists('properties');
    }
}
