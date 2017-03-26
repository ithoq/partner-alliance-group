<?php

use Illuminate\Database\Seeder;
use Vanguard\Models\DesignsModel as Designs;

class DesignsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $design = new Designs;
        $design->design_name = 'Unknown Design';
        $design->save();
    }
}
