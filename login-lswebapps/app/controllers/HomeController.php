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

	public function getIndex()
	{
		return Redirect::to('/login');
	}

	public function getShowWelcome()
	{
		return View::make('hello');
	}

	public function getTest()
	{
		//echo "test";

		return View::make('hello');
	}

	public function getSuccess()
	{
		echo "you're in app";
	}

	public function getFail()
	{
		echo "fail to login";
	}

	public function getLogin()
	{
		return View::make('users.login');
	}

	public function postHandle()
	{
		$data = Input::only(['email', 'password']);

		$validator = Validator::make
		(
			$data,
			[
				'email' => 'required|email',
				'password' => 'required|min:6',
			]
		);

		if($validator->fails())
		{
			return Redirect::to('login')->withErrors($validator)->withInput();
		}

		if(Auth::attempt(['email' => $data['email'], 'password' => $data['password']]))
		{
			// return Redirect::to('/success');
			// return View::make('users.profile');
			return Redirect::to('profile');
		}

		// return Redirect::route('loginForm')->withInput();

		return Redirect::to('/fail');
	}

	public function getLogout()
	{
		if(Auth::check())
		{
			Auth::logout();
		}

		return Redirect::to('/login');
	}

	public function getRegister()
	{
		return View::make('users.register');
	}

	public function postRegister()
	{
		$data = Input::only(['first_name','last_name','email','password']);

		// first part of validation is in js in front end
		// second part of validate if user is in db
		// or second part in ajax in front end while user is typing

		$validator = Validator::make
		(
			$data,
			[
				'first_name' => 'required',
				'last_name' => 'required',
				'email' => 'required|email',
				'password' => 'required|min:5',
			]
		);

		if($validator->fails())
		{
			return Redirect::to('register')->withErrors($validator)->withInput();
		}

		$firstName = $_POST['first_name'];
		$lastName = $_POST['last_name'];
		$email = $_POST['email'];
		$password =  Hash::make($_POST['password']);
		$data = ['first_name' => $firstName, 'last_name' => $lastName, 'email' => $email, 'password' => $password];

		$newUser = User::create($data);

		if($newUser)
		{
			Auth::login($newUser);
			return Redirect::to('profile');
		}

		return Redirect::to('/fail');
		// return Redirect::route('user.create')->withInput();
	}

	public function getProfile()
	{
		return View::make('users.profile');
	}
}
