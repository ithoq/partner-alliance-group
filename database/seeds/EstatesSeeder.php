<?php

use Illuminate\Database\Seeder;
use Vanguard\Models\EstatesModel as Estates;

class EstatesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $estate = new Estates;
        $estate->estate_name = 'Unknown Estate';
        $estate->save();
    }
}
