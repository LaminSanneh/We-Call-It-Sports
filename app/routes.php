<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return 'Home Controller';
});

Route::get("api/admin/getSportCompetitions/{sport_id}", 'WeCallItSports\Api\Controllers\AdminController@getSportCompetitions');
Route::post("api/admin/uploadArticleImage", array('as' => 'uploadArticleImage', 'uses' => 'WeCallItSports\Api\Controllers\AdminController@uploadArticleImage'));
Route::resource('admin/articles', 'WeCallItSports\Admin\Controllers\ArticleController');

Route::get('football/home', array('as' => 'footballHome', 'uses' => 'WeCallItSports\Football\Controllers\FootballController@index'));
Route::get('football/articles/{id}-{title}', array('as' => 'footballArticle','uses' => 'WeCallItSports\Football\Controllers\FootballController@showArticle'));