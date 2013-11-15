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
//Route::resource('admin/articles', 'WeCallItSports\Admin\Controllers\ArticleController');

Route::get('football/home', array('as' => 'footballHome', 'uses' => 'WeCallItSports\Football\Controllers\FootballController@index'));
Route::get('football/articles/{id}-{title}', array('as' => 'footballArticle','uses' => 'WeCallItSports\Football\Controllers\FootballController@showArticle'));

Route::group(array('prefix' => 'admin'), function()
{
//    Articles
    Route::resource('football/articles', 'WeCallItSports\Admin\Controllers\FootballArticlesController');
    Route::get('football/deleted_articles', array('uses' => 'WeCallItSports\Admin\Controllers\FootballArticlesController@deleted_articles', 'as' => 'admin.football.deleted_articles'));
    Route::post('football/restore_article/{id}',array('uses' => 'WeCallItSports\Admin\Controllers\FootballArticlesController@restore_article', 'as' => 'admin.football.restore_article'));

//    Competitions
    Route::resource('football/competitions', 'WeCallItSports\Admin\Controllers\FootballCompetitionsController');

//    Images
    Route::post("image/uploadArticleImage", array('as' => 'admin.images.upload_article_image', 'uses' => 'WeCallItSports\Admin\Controllers\ImageController@uploadArticleImage'));
    Route::post("image/deleteArticleImage/{id}", array('as' => 'admin.images.delete_article_image', 'uses' => 'WeCallItSports\Admin\Controllers\ImageController@deleteArticleImage'));
});