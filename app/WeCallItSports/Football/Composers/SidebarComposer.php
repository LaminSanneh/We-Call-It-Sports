<?php namespace WeCallItSports\Football\Composers;

use \View as View;

/**
* 
*/
class SidebarComposer
{
	
	function __construct(){
		
	}

	public function compose($view){

		$football = \Sport::where("local_name", "=", "football")->select("id")->first();

		$latest_popular_articles = \DB::table('articles')
												->join('competitions', 'articles.competition_id', "=", 'competitions.id')
												->whereIn('competitions.sport_id', array($football->id))
												->orderBy('articles.number_of_views', 'DESC')
												->take(3)
												->select('articles.id', 'articles.title')
												->get();

		$view->with('latest_popular_articles', $latest_popular_articles);
	}
}