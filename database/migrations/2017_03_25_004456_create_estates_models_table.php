<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEstatesModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estates', function (Blueprint $table) {
            $table->increments('id');
            $table->string('estate_name')->default('Unavailable');
            $table->string('estate_address')->default('Unavailable');
            $table->string('estate_suburb')->default('Unavailable');
            $table->string('estate_state')->default('Unavailable');
            $table->string('estate_website')->default('Unavailable');
            $table->string('estate_profile')->default('Unavailable');
            $table->string('estate_research')->default('Unavailable');
            $table->string('estate_map')->default('Unavailable');
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
        Schema::dropIfExists('estates');
    }
}
