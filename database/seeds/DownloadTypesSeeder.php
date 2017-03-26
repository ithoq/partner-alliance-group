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
        
        # Seed Data
        $seed = [
            'Unknown Type',
            'Colour Schemes',
            'Facades',
            'Forms',
            'House Brochures',
            'Interior Images',
            'Other',
        ];
        
        # Loop
        foreach($seed as $item) {
            
            $type = new Types;
            $type->type_name = $item;
            $type->save();
            
        }
    }
}
