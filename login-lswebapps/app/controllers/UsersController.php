<?php

class UsersController extends BaseController {

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

	public function getloginForm()
	{
		return View::make('users.login');
	}

	public function handleLogin()
	{
		$data = Input::only(['email', 'password']);

		if(Auth::attempt(['email' => $data['email'], 'password' => $data['password']])){
			return Redirect::to('/');
		}

		return Redirect::route('loginForm')->withInput();
	}

	public function profile()
	{
		return View::make('users.profile');
	}

	public function logout()
	{
		if(Auth::check()){
			Auth::logout();
		}
		return Redirect::route('login');
	}

	public function register()
	{
		return View::make('users.register');
	}

	public function store()
	{
		$data = Input::only(['first_name','last_name','email','password']);

		$newUser = User::create($data);
		if($newUser){
			Auth::login($newUser);
			return Redirect::route('profile');
		}

		return Redirect::route('user.create')->withInput();
	}
}
