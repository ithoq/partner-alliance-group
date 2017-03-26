<?php

use Illuminate\Database\Seeder;
use Vanguard\Models\NewsCategoriesModel as Categories;

class NewsCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = new Categories;
        $category->category_name = 'Unknown Category';
        $category->save();
    }
}
