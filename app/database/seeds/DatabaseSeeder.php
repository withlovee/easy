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

		//$this->call('UsersTableSeeder');
    //$this->call('AdministratorsTableSeeder');
    $this->call('SupportTicketsTableSeeder');
	}

}

class UsersTableSeeder extends Seeder {

  public function run()
  {
    $user = new User;
    $user->username = 'buyer1';
    $user->email = 'buyer1@easy.com';
    $user->password = '1234';
    $user->password_confirmation = '1234';
    $user->role = 'Buyer';
    $user->confirmation_code = md5(uniqid(mt_rand(), true));
    $user->confirmed = true;

    if(! $user->save()) {
      Log::info('Unable to create user '.$user->username, (array)$user->errors());
    } else {
      Log::info('Created user "'.$user->username.'" <'.$user->email.'>');
    }

  }
}


class AdministratorsTableSeeder extends Seeder {

  public function run()
  {
    $admin = new Administrator;
    $admin->username = 'administrator';
    $admin->password = '1234';

    if(! $admin->save()) {
      Log::info('Unable to create admin '.$admin->username, (array)$admin->errors());
    } else {
      Log::info('Created admin "'.$admin->username);
    }


  }
}

class SupportTicketsTableSeeder extends Seeder {

  public function run()
  {
    $ticket = new SupportTicket;
    $ticket->reporterId = User::where('id','>','0')->firstOrFail()->id;
    $ticket->reporteeId = User::where('id','>','0')->firstOrFail()->id;
    $ticket->administratorId = Administrator::where('id','>','0')->firstOrFail()->id;
    $ticket->title = 'I have Problem';
    $ticket->content = 'CONTENT CONTENT';
    $ticket->answer = 'ANSWER THIS IS';
    $ticket->answered_at = '';

    if(! $ticket->save()) {
      Log::info('Unable to create ticket '.$ticket->title, (array)$ticket->errors());
    } else {
      Log::info('Created ticket >>'.$ticket->title);
    }

  }
}