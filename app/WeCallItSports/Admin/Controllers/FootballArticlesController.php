<?php namespace WeCallItSports\Admin\Controllers;

use WeCallItSports\Admin\Constants\RouteNames;
use WeCallItSports\Admin\Constants\ArticleStatusIds;
use WeCallItSports\Admin\Constants\SportNamesInDB;
use WeCallItSports\Controllers\BaseController;

use \View as View;
use \Article as Article;
use \ArticleStatus as ArticleStatus;
use \Image as Image;
use \Competition as Competition;
use \Sport as Sport;
use \Input as Input;
use \Redirect as Redirect;
use WeCallItSports\Admin\Constants\ViewNames as ViewNames;


class FootballArticlesController extends BaseController
{
	
	function __construct()
	{

        $football = Sport::where('local_name', '=', SportNamesInDB::$football)->select('id')->first();
		$competitions = Competition::where('sport_id','=', $football->id)->lists('name','id');
        $status_ids = ArticleStatus::lists('name', 'id');
        $articles = \DB::table('articles')->whereNotIn('status_id',array(1))->orderBy('created_at','DESC')->get();
        $deleted_articles = \DB::table('articles')->whereIn('status_id',array(1))->orderBy('created_at','DESC')->get();

		View::composer(array(ViewNames::$footballarticles_partials_form_body), function($view) use($competitions, $football, $status_ids){
			$view->with(array('competitions' => $competitions, 'sport_id' => $football->id, 'status_ids' => $status_ids));
		});

        View::composer(array(ViewNames::$footballarticles_index), function($view) use($articles){
            $view->with(array('articles' => $articles));
        });

        View::composer(array(ViewNames::$footballarticles_deleted_articles), function($view) use($deleted_articles){
            $view->with(array('deleted_articles' => $deleted_articles));
        });
	}

	public function index(){

		return View::make(ViewNames::$footballarticles_index);

	}

	public function create(){

		$article = new Article;

		return View::make(ViewNames::$footballarticles_create, compact('article','sports'));
	}

	public function store(){

        $article = Input::except('sport_id');

        $article['publisher_id'] = 1;

		$article = Article::create($article);

		if($article->id){
			return Redirect::route(RouteNames::$admin_football_article_index);
		}
		else{
			return Redirect::route(RouteNames::$admin_football_article_edit, array('article' => $article));
		}
	}

	public function edit($id){

		$article = Article::findOrFail($id);

        $article_images = Image::where("article_id", "=", $article->id);

		return View::make(ViewNames::$footballarticles_edit, compact('article','article_images'));
	}

	public function update($id){

		$article = Article::findOrFail($id);

		$article->fill(Input::except('sport_id'));
		$article->save();

		if($article->id){
			return Redirect::route(RouteNames::$admin_football_article_index);
		}
		else{
			return Redirect::route(RouteNames::$admin_football_article_edit, array('article' => $article));
		}
	}

    public function destroy($id){

        $deleted_article = Article::find($id);
        $deleted_article->status_id = 1;
        $deleted_article->save();

        return Redirect::route(RouteNames::$admin_football_article_index);
    }

    public function deleted_articles(){

        return View::make(ViewNames::$footballarticles_deleted_articles);
    }

    public function restore_article($id){

        $deleted_article = Article::find($id);
        $deleted_article->status_id = 2;
        $deleted_article->save();
        return Redirect::route(RouteNames::$admin_football_deleted_articles);
    }
}