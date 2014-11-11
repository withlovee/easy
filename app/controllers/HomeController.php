<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function showWelcome()
	{
		// var_dump(Auth::user());
		$data['price'] = Price::graph('CPF', 'price');
		return View::make('hello', $data);
		// $results = DB::select('select * from test where id = ?', array(2));
		// var_dump($results);
		// return '';
	}

}
