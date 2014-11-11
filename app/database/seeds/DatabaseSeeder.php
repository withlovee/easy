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

		$this->call('UsersTableSeeder');
	}

}

class UsersTableSeeder extends Seeder {

  public function run()
  {
    $user = new User;
    $user->username = 'admin';
    $user->email = 'admin@easy.com';
    $user->password = '1234';
    $user->role = 'Admin';
    $user->password_confirmation = '1234';
    $user->confirmation_code = md5(uniqid(mt_rand(), true));
    $user->confirmed = true;

    if(! $user->save()) {
      Log::info('Unable to create user '.$user->username, (array)$user->errors());
    } else {
      Log::info('Created user "'.$user->username.'" <'.$user->email.'>');
    }

  }
}