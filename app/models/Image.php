<?php 

/**
* 
*/
class Image extends Eloquent
{
	public $guarded = array('id', 'created_at', 'updated_at');
	
	public function article(){
		$this->belongsTo('Article');
	}
}