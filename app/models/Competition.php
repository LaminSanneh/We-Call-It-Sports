<?php 

/**
* 
*/
class Competition extends Eloquent
{
	public function sport(){
		return $this->belongsTo('Sport');
	}

	public function country(){
		return $this->belongsTo('Country');
	}

	public function articles(){
		return $this->belongsToMany('Article');
	}
}
