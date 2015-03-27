<?php
echo("Dharmaraj is a good girl");
use Illuminate\Database\Seeder;
use App\posts1 as posts1;


class posts1TableSeeder extends Migration {

public function run() {
        // clear table
        posts1::truncate();
        // add 1st rows
        posts1::create( [
            'url' => 'news-url' ,
            'description' => 'News Headline' ,
            'status' => 'The Story' ,
        ] );
        // add 2nd row
        posts1::create( [
            'url' => 'second-url' ,
            'description' => 'Second Headline' ,
            'status' => 'Second Story' ,
        ] );
    }
	
  }


?>