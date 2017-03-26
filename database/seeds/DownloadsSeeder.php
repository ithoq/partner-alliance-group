<?php

use Illuminate\Database\Seeder;
use Vanguard\Models\DownloadsModel as Downloads;

class DownloadsSeeder extends Seeder
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
            'Unknown Download',
            'Colour Schemes',
            'Facades',
            'Forms',
            'House Brochures',
            'Interior Images',
            'Other',
        ];
        
        # Loop
        foreach($seed as $item) {
            
            $download = new Downloads;
            $download->download_name = $item;
            $download->save();
            
        }
    }
}
