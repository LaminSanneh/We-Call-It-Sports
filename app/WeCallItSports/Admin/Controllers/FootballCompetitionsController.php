<?php namespace WeCallItSports\Admin\Controllers;

use WeCallItSports\Controllers\BaseController;

use \View as View;
use \Competition as Competition;
use \Country as Country;
use \Sport as Sport;
use \Input as Input;
use \Redirect as Redirect;
use WeCallItSports\Admin\Constants\ViewNames as ViewNames;


class FootballCompetitionsController extends BaseController {

    function __construct()
    {
        $sports = Sport::lists('local_name','id');
        $countries = Country::lists('name','id');
        View::composer(array(ViewNames::$footballcompetitions_partials_form_body), function($view) use($sports){
            $view->with('sports', $sports);
        });

        View::composer(array(ViewNames::$footballcompetitions_partials_form_body), function($view) use($countries){
            $view->with('countries', $countries);
        });

    }

    public function index(){

        $competitions = Competition::all();

        return View::make(ViewNames::$footballcompetitions_index, compact('competitions'));

    }

    public function edit($id){

        $competition = Competition::findOrFail($id);

        return View::make(ViewNames::$footballcompetitions_edit, array('competition' => $competition));
    }

} 