<?php

use anlutro\cURL\cURL;

class ArticleTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$curl = new cURL;
		$url = 'http://www.filltext.com/?rows=500&title={lorem|7}&text={lorem|400}&summary={lorem|25}&publisher_id={randomNumber|10}&status_id={randomNumber|2}&number_of_views={randomNumber|10000000}&competition_id={randomNumber|153}';
		// $url = 'http://www.filltext.com/?rows=100&title={lorem|7}&text={lorem|400}&summary={lorem|25}&publisher_id={randomNumber|10}&status_id={randomNumber|2}&created_at={date}&updated_at={date}';
		$data = $curl->get($url);
		$articles = json_decode($data, true);

		if(count($articles) > 0){
			DB::table('articles')->truncate();
			// Uncomment the below to run the seeder
			// DB::table('articles')->insert($articles);
			// $articles =  json_decode(file_get_contents(__DIR__.'/seed_files/Articles.json'), true);
			foreach($articles as $article){
				// SInce webservice starts counting at 0
				$article['status_id'] += 1;
				$article['competition_id'] += 1;

				$int= mt_rand(1262055681,time());
				$article['created_at'] = date('Y-m-d H:i:s',$int);
				$int= mt_rand(1262055681,time());
				$article['updated_at'] = date('Y-m-d H:i:s',$int);
				if($article['status_id'] == 3){
					$int= mt_rand(1262055681,time());
					$article['published_at'] = date('Y-m-d H:i:s',$int);
				}
				Article::create($article);
			}
		}

	}

}