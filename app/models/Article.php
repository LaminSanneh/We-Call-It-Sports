<?php

/**
* 
*/
class Article extends Eloquent
{

	public $guarded = array('id', 'created_at', 'updated_at');

	public function publisher(){
		return $this->belongsTo('User');
	}

	public function competition(){
		$this->belongsTo('Competition');
	}

	public function images(){
		$this->hasMany('Image');
	}

	public function status(){
		$this->hasOne('ArticleStatus');
	}	
}