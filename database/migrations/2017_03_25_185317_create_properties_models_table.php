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
            $table->string('property_price')->default('Unavailable');
            $table->string('property_design')->default('Unavailable');
            $table->string('property_size')->default('Unavailable');
            $table->string('property_land')->default('Unavailable');
            $table->string('property_bed')->default('Unavailable');
            $table->string('property_bath')->default('Unavailable');
            $table->string('property_car')->default('Unavailable');
            $table->string('property_status')->default('available');
            
            $table->string('land_price')->default('Unavailable');
            $table->string('house_price')->default('Unavailable');
            $table->string('total_price')->default('Unavailable');
             
            $table->string('house_design')->default('Unavailable');
            $table->string('facade')->default('Unavailable');
            $table->string('colour_scheme')->default('Unavailable');
            $table->string('total_area')->default('Unavailable');
            $table->string('width')->default('Unavailable');
            $table->string('depth')->default('Unavailable');
             
            $table->string('contract')->default('Unavailable');
            $table->string('property_titled')->default('Unavailable');
            $table->string('frontage')->default('Unavailable');
            $table->string('approx_rent')->default('Unavailable');
            $table->string('council_rates')->default('Unavailable');
                
            $table->string('file_cover_sheet')->default('Unavailable');
            $table->string('file_land_contract')->default('Unavailable');
            $table->string('file_building_contract')->default('Unavailable');
            $table->string('file_extra_contract_docs')->default('Unavailable');
            $table->string('file_other')->default('Unavailable');
            $table->string('file_colour_scheme')->default('Unavailable');
            $table->string('file_house_brochure')->default('Unavailable');
            $table->string('file_investor_grade_specs')->default('Unavailable');
            
            $table->string('image_facade')->default('Unavailable');
            $table->string('image_floor_plan')->default('Unavailable');
            
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
