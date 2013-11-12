<?php namespace WeCallItSports\Football\Controllers;

use WeCallItSports\Controllers\BaseController;

use \View as View;

use \Article as Article;

/**
* 
*/
class FootballController extends BaseController
{
	
	public function index(){
		
		$football = \Sport::where("local_name", "=", "football")->select("id")->first();


		$latest_football_articles = \DB::table('articles')
												->join('competitions', 'articles.competition_id', "=", 'competitions.id')
												->whereIn('competitions.sport_id', array($football->id))
												->orderBy('articles.published_at')
												->take(3)
												->select('articles.id', 'articles.title')
												->get();

		$latest_premier_league_articles = \DB::table('articles')
												->join('competitions', 'articles.competition_id', "=", 'competitions.id')
												->where('competitions.name', '=', 'Barclays Premier League')
												->orderBy('published_at', 'DESC')
												->take(3)
												->select('articles.id', 'articles.title')
												->get();

		$latest_la_liga_articles = \DB::table('articles')
												->join('competitions', 'articles.competition_id', "=", 'competitions.id')
												->where('competitions.name', '=', 'Spanish Primera DivisiÃ³n')
												->orderBy('published_at', 'DESC')
												->take(3)
												->select('articles.id', 'articles.title')
												->get();

		$latest_serie_a_articles = \DB::table('articles')
												->join('competitions', 'articles.competition_id', "=", 'competitions.id')
												->where('competitions.name', '=', 'Italian Serie A')
												->orderBy('published_at', 'DESC')
												->take(3)
												->select('articles.id', 'articles.title')
												->get();

		$latest_bundesliga_articles = \DB::table('articles')
												->join('competitions', 'articles.competition_id', "=", 'competitions.id')
												->where('competitions.name', '=', 'German Bundesliga')
												->orderBy('published_at', 'DESC')
												->take(3)
												->select('articles.id', 'articles.title')
												->get();

		// echo "<h2>World</h2>";
		// print_r($latest_football_articles);

		// echo "<h2>Premier League</h2>";
		// print_r($latest_premier_league_articles);

		// echo "<h2>La Liga</h2>";
		// print_r($latest_la_liga_articles);

		// echo "<h2>Serie A</h2>";
		// print_r($latest_serie_a_articles);

		// echo "<h2>Bundesliga</h2>";
		// print_r($latest_bundesliga_articles);

		$view_data = array('latest_premier_league_articles' => $latest_premier_league_articles,
													'latest_bundesliga_articles' => $latest_bundesliga_articles,
													'latest_football_articles' => $latest_football_articles,
													'latest_serie_a_articles' => $latest_serie_a_articles,
													'latest_la_liga_articles' => $latest_la_liga_articles);

		return View::make('football.index', $view_data);
	}


	public function showArticle($id, $title){

		$football = \Sport::where("local_name", "=", "football")->select("id")->first();

		$latest_popular_articles = \DB::table('articles')
												->join('competitions', 'articles.competition_id', "=", 'competitions.id')
												->whereIn('competitions.sport_id', array($football->id))
												->orderBy('articles.number_of_views', 'DESC')
												->take(3)
												->select('articles.id', 'articles.title')
												->get();

		$article = Article::find($id);

		return View::make('football.article', compact('article', 'latest_popular_articles'));
	}
}