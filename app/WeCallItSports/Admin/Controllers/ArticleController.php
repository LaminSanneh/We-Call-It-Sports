<?php namespace WeCallItSports\Admin\Controllers;

use WeCallItSports\Controllers\BaseController;

use \View as View;
use \Article as Article;
use \Sport as Sport;
use \Input as Input;
use \Redirect as Redirect;

/**
* 
*/
class ArticleController extends BaseController
{
	
	function __construct()
	{
		$sports = Sport::lists('local_name','id');
		View::composer(array('partials._form_body'), function($view) use($sports){
			$view->with('sports', $sports);
		});

	}

	public function index(){

		$articles = Article::all();

		return View::make('article.index', array('articles' => $articles));

	}

	public function create(){

		$article = new Article;

		return View::make('article.create', compact('article','sports'));
	}

	public function store(){
		$article = Article::create(Input::except('sport_id'));

		if($article->id){
			return Redirect::route('admin.articles.index');
		}
		else{
			return Redirect::route('admin.articles.edit', array('article' => $article));
		}
	}

	public function edit($id){

		$article = Article::findOrFail($id);

		return View::make('article.edit', array('article' => $article));
	}

	public function update($id){

		$article = Article::findOrFail($id);

		$article->fill(Input::except('sport_id'));
		$article->save();

		if($article->id){
			return Redirect::route('admin.articles.index');
		}
		else{
			return Redirect::route('admin.articles.edit', array('article' => $article));
		}

	}
}