<?php

use Illuminate\Database\Seeder;
use Vanguard\Models\NewsModel as News;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $news = new News;
        $news->news_title = 'Unknown News';
        $news->news_content = 'Unavailable';
        $news->save();
    }
}
