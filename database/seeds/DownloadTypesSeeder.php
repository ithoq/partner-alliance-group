<?php

use Illuminate\Database\Seeder;
use Vanguard\Models\DownloadTypesModel as Types;

class DownloadTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $type = new Types;
        $type->type_name = 'Unknown Type';
        $type->save();
    }
}
