<?php


/**
 * Class UserTableSeeder
 *
 * To run this class and insert all data into table
 *
 * php artisan db:seed
 *
 */
class SeedUsersTableTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		// DB::table('users')->delete();

		// User::create(array('name' => 'foo', 'email' => 'foo@bar.com'));
		// User::create(array('name' => 'foo2', 'email' => '222foo@bar.com'));

		DB::table('users')->truncate();

		$users = [
			[
				'first_name' => 'testName',
				'last_name' => 'testLastName',
				'email' => 'ttt',
				'password' => Hash::make('ttt')
			],
			[
				'first_name' => 'Fred',
				'last_name' => 'Jackson',
				'email' => 'fred.jackson@gmail.com',
				'password' => Hash::make('fredjackson')
			],
		];

		foreach($users as $user){
			User::create($user);
		}

	}



}
