<?php 

/**
* 
*/
class Sport extends Eloquent
{
	public function competitions(){
		return $this->hasMany('Competition');
	}
}
