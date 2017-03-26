<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call(CountriesSeeder::class);
        $this->call(RolesSeeder::class);
        $this->call(PermissionsSeeder::class);
        $this->call(UserSeeder::class);
        
        # Custom Tables
        $this->call(DownloadsSeeder::class);
        $this->call(DownloadTypesSeeder::class);
        $this->call(EstatesSeeder::class);
        $this->call(NewsSeeder::class);
        $this->call(NewsCategoriesSeeder::class);
        $this->call(PropertiesSeeder::class);

        Model::reguard();
    }
}
