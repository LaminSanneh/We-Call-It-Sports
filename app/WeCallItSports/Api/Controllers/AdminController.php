<?php namespace WeCallItSports\Api\Controllers;

use WeCallItSports\Controllers\BaseController;
use \Competition as Competition;
use \Validator as Validator;
use \Response as Response;
use \File as File;
use \Input as Input;
use \Image as Image;

/**
* 
*/
class AdminController extends BaseController
{
	
	function __construct()
	{
		
	}

	public function getSportCompetitions($sport_id){
		return Competition::where("sport_id", "=", $sport_id)->get();
	}

	public function uploadArticleImage(){
		$input = Input::all();

		$article_id = $input['article_id'];

	    $rules = array(
	        'file' => 'image|max:3000',
	    );
	 
	    $validation = Validator::make($input, $rules);
	 
	    if ($validation->fails())
	    {
	        return Response::make($validation->errors->first(), 400);
	    }
	 
	    $file = Input::file('file');
	 
	    // $extension = File::extension($file['name']);
	    $destinationPath = 'uploads/'.sha1(time());
	    $filename = sha1(time().time()).$file->getClientOriginalName();
	 
	    $upload_success = Input::file('file')->move($destinationPath, $filename);
	     
	    if( $upload_success ) {
	    	Image::create(array('url' => $destinationPath, 'name' => $filename, 
	    			'article_id' => $article_id, 'alt' => '', 'image_type_id' => 1));
	        return Response::json('success', 200);
	    } else {
	        return Response::json('error', 400);
	    }
	}
}