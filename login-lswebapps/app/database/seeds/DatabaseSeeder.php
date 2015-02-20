<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

<<<<<<< HEAD:laravel-main/app/database/seeds/DatabaseSeeder.php
		// $this->call('UserTableSeeder');
=======
		$this->call('SeedUsersTableTableSeeder');
>>>>>>> 4de509ec21d91523de9e487260e18792c6b26a25:login-lswebapps/app/database/seeds/DatabaseSeeder.php
	}

}
