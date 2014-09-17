<?php

class UsersController extends BaseController {
	public function __construct() {
		parent::__construct();
		$this->beforeFilter('csrf', array('on' => 'post'));
	}

	public function getNewaccount() {
		return View::make('users.newaccount');
	}

	public function postCreate() {
		$validator = Validator::make(Input::all(), Users::$rules);

		if ($validator->passes()) {
			$user = new User;
			$user->firstname = Input::get('firstname');
			$user->lastname = Input::get('lastname');
			$user->email = Input::get('email');
			$user->password = Hash::make(Input::get('password'));
			$user->telephone = Input::get('telephone');
			$user->save();

			return Redirect::to('users/signin')
				->with('message', 'Obrigado por ter criado uma conta. Por favor entre com os seus dados');
		}

		return Redirect::to('users/newaccount')
			->with('message', 'Alguma coisa está errada')
			->withErrors($validator)
			->withInput();
	}

	public function getSignin() {
		return View::make('users.signin');
	}

	public function postSignin() {
		if (Auth::attempt(array('email'=>Input::get('email'), 'password' => Input::get('password')))) {
			return Redirect::to('/')->with('message', 'Obrigado pelo login!');
		}

		return Redirect::to('users/signin')->with('message', 'O seu email/password estão incorrectos');
	}

	public function getSignout() {
		Auth::logout();
		return Redirect::to('users/signin')->with('message', 'You have been signed out');
	}
}
