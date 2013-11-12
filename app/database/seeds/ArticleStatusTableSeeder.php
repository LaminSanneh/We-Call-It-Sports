<?php

class ArticleStatusTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('article_statusses')->truncate();

		$article_statusses = array(
			array('name' => 'Deleted'),
			array('name' => 'Draft'),
			array('name' => 'Published')
		);

		// Uncomment the below to run the seeder

		foreach($article_statusses as $article_status){
			ArticleStatus::create($article_status);
		}
		// DB::table('article_statusses')->insert($articles);
	}

}