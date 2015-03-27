<?php

use Illuminate\Database\Seeder;
use App\News as News; // to use Eloquent Model
  
class NewsTableSeeder extends Seeder {
    public function run() {
        // clear table
        News::truncate();
        // add 1st row
        News::create( [
            'url' => 'news-url' ,
            'headline' => 'News Headline' ,
            'story' => 'The Story' ,
        ] );
        // add 2nd row
        News::create( [
            'url' => 'second-url' ,
            'headline' => 'Second Headline' ,
            'story' => 'Second Story' ,
        ] );
    }
}
