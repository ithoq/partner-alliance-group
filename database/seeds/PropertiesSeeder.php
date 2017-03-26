<?php

use Illuminate\Database\Seeder;
use Vanguard\Models\PropertiesModel as Properties;

class PropertiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $property = new Properties;
        $property->save();
    }
}
