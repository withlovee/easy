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

  public function run() {
    $user = new User;
    $user->name = 'ณัฐพล';
    $user->surname = 'พัฒนาวิจิตร';
    $user->address = '12/23 ถนนพระราม 1 เขตปทุมวัน กรุงเทพฯ 10100';
    $user->country = 'TH';
    $user->telephone = '0850615555';
    $user->username = 'admin';
    $user->email = 'admin@easy.com';
    $user->password = '1234';
    $user->password_confirmation = '1234';
    $user->confirmed = true;
    $user->confirmation_code = md5(uniqid(mt_rand(), true));
    $user->role = 'ผู้ซื้อ';

    if(! $user->save()) {
      Log::info('Unable to create user '.$user->username, (array)$user->errors());
    } else {
      Log::info('Created user "'.$user->username.'" <'.$user->email.'>');
    }

  }
}