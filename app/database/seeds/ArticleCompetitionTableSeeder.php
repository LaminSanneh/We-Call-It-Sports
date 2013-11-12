<?php

use anlutro\cURL\cURL;

class ArticleCompetitionTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$curl = new cURL;
		$url = 'http://www.filltext.com/?rows=100&article_id={randomNumber|100}&competition_id={randomNumber|154}';
		// $data = $curl->get($url);
		// $article_competitions = json_decode($data, true);
		$article_competitions = array();

		for($i = 0; $i < 5000; $i++){
			array_push($article_competitions, array(
													'article_id' => rand(1, 500),
													'competition_id' => rand(1, 154)));
		}

		DB::table('article_competition')->truncate();
		DB::table('article_competition')->insert($article_competitions);
	}

}