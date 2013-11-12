<?php 

/**
* 
*/
class Country extends Eloquent
{
	public function competitions(){
		return $this->hasMany('Competition');
	}
}
