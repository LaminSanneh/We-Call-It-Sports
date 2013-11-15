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
		return $this->belongsTo('Competition');
	}

	public function images(){
		return $this->hasMany('Image');
	}

	public function status(){
		return $this->hasOne('ArticleStatus');
	}	
}