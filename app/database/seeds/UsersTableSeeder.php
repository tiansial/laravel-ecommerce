<?php

class UsersTableSeeder extends Seeder {
	public function run() {
		$user = new User;
		$user->firstname = 'Tiago';
		$user->lastname = 'Almeida';
		$user->email = 'bomdia@tiansial.com';
		$user->password = Hash::make('tiago123');
		$user->telephone = '12345678';
		$user->admin = 1;
		$user->save();
	}
}
