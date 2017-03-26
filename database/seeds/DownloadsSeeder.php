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
        $download = new Downloads;
        $download->download_name = 'Unknown Download';
        $download->save();
    }
}
