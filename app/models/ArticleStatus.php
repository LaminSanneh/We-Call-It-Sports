<?php

/**
* 
*/
class ArticleStatus extends Eloquent
{
	protected $table = "article_statusses";
	
	public function article(){
		$this->belongsToMany('Article');
	}	
}