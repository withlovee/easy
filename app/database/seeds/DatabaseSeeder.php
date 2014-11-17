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
    $this->call('BidManagersTableSeeder');
    $this->call('ItemTableSeeder');
    $this->call('AdministratorsTableSeeder');
    $this->call('SupportTicketsTableSeeder');
    $this->call('ItemQuestionsTableSeeder');

  }

}

class UsersTableSeeder extends Seeder {

  public function run()
  {
    for ($i=1; $i <=5  ; $i++) { 
      $user = new User;
      $user->username = 'buyer'.$i;
      $user->email = 'buyer'.$i.'@easy.com';
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

  



class BidManagersTableSeeder extends Seeder{
  public function run(){
    $bidManager = new BidManager;
    $bidManager->currentBid = 0;
    $bidManager->save();
    $bidManager = new BidManager;
    $bidManager->currentBid = 0;
    $bidManager->save();
  }
}

class ItemTableSeeder extends Seeder{
  public function run(){
    $item = new Item;
    $item->itemId='1';
    $item->itemName='ที่ชาร์ตแบตสำรองสีชมพูแบบพวงกุญแจ 2600mAh';
    $item->picture=null;
    $item->price=1250;
    $item->brand='ASDFEECCD';
    $item->model='CD012-33321';
    $item->volumn='2600mAh';
    $item->property='เรียกกันอีกชื่อง่ายๆคือ one touch silicone stand เพียงแค่กดเบาๆก็สามารถ งอและวางบนนิ้วมือหรือตั้งเพื่อดูได้ บอกเลยว่าน่ารักสุดๆ ไม่มีนี่พลาดมากอะ !!!ไอเท็มเพื่อเพิ่มลูกเล่นในการถ่ายภาพด้วยเลนส์เสริมสำหรับติดโทรศัพท์มือถือ สามารถถ่ายภาพแบบมุมกว้าง, กลมนูนแบบฟิชอาย หรือขยายเพื่อถ่ายระยะใกล้ได้ง่ายดายจากโทรศัพท์มือถือของคุณ ใช้ได้กับทุกรุ่นและยี่ห้อ...ห้ามพลาดนะคะ!';
    $item->quantity=1;
    $item->quality='ดีมาก';
    $item->returnPolicy='สามารถส่งคืนได้';
    $item->returnFee=50;
    $item->shipping='แบบด่วน: 100 บาท<br>แบบมาตรฐาน: 50 บาท<br>แบบประหยัด: 30 บาท</td>';
    $item->tax=7;
    $item->others='ห่อของขวัญฟรี';
    $item->type='direct';
    $item->endDateTime=null;
    $item->bidManagerId=null;
    $item->save();
    $item2=new Item;
    $item2->itemId='2';
    $item2->itemName='ที่วาง-ที่จับ มือถืออเนกประสงค์';
    $item2->picture='https://fbexternal-a.akamaihd.net/safe_image.php?d=AQBWUBt17aRrtrfk&w=254&h=133&url=https%3A%2F%2Fwww.facebook.com%2Fads%2Fimage%2F%3Fd%3DAQIvvP7Lj_5Kh5fEBjh3saMkiuYeBfZV_mahnynb5pd0f7fOPJ4e2omGytmBSKBP4Omo_TuR4AsHvFjMs4qCk5nKIyjhOMWgs5j7s_YONSynC0dutPEJXMqIEHaro06oUilGMv5l6OLs60K3Of_e8eme&cfs=1';
    $item2->price=145;
    $item2->brand='ASDFEECCD';
    $item2->model='CD012-33321';
    $item2->volumn='';
    $item2->property='เรียกกันอีกชื่อง่ายๆคือ one touch silicone stand เพียงแค่กดเบาๆก็สามารถ งอและวางบนนิ้วมือหรือตั้งเพื่อดูได้ บอกเลยว่าน่ารักสุดๆ ไม่มีนี่พลาดมากอะ !!!ไอเท็มเพื่อเพิ่มลูกเล่นในการถ่ายภาพด้วยเลนส์เสริมสำหรับติดโทรศัพท์มือถือ สามารถถ่ายภาพแบบมุมกว้าง, กลมนูนแบบฟิชอาย หรือขยายเพื่อถ่ายระยะใกล้ได้ง่ายดายจากโทรศัพท์มือถือของคุณ ใช้ได้กับทุกรุ่นและยี่ห้อ...ห้ามพลาดนะคะ!';
    $item2->size='';
    $item2->quantity=1;
    $item2->quality='';
    $item2->defect='';
    $item2->returnPolicy='ASDFEECCD';
    $item2->returnFee=50;
    $item2->shipping='แบบด่วน: 100 บาท<br>แบบมาตรฐาน: 50 บาท<br>แบบประหยัด: 30 บาท</td>';
    $item2->tax=7;
    $item2->others='ห่อของขวัญ';
    $item2->type='auction';
    $item2->endDateTime=date('d/m/Y',strtotime("30/11/2014"));
    $item2->bidManagerId=1;
    $item2->save();
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
    for ($i=1; $i <4 ; $i++) { 
      $ticket = new SupportTicket;    
      $ticket->reporterId = User::where('id','>=',$i)->firstOrFail()->id;
      $ticket->reporteeId = User::where('id','>=',$i+1)->firstOrFail()->id;
      $ticket->administratorId = Administrator::where('id','>','0')->firstOrFail()->id;
      $ticket->title = 'I have Problem No.'.$i;
      $ticket->content = 'CONTENT CONTENT No.'.$i;
      $ticket->answer = 'ANSWER THIS IS No.'.$i;
      $ticket->answered_at = '';

      if(! $ticket->save()) {
        Log::info('Unable to create ticket '.$ticket->title, (array)$ticket->errors());
      } else {
        Log::info('Created ticket >>'.$ticket->title);
      }
    }
  }
}

class ItemQuestionsTableSeeder extends Seeder{
  public function run(){
    $itemQ=new ItemQuestion;
    $itemQ->content = 'มีสีอะไรบ้าง';
    $itemQ->answer='สีเขียว ฟ้า ชมพู';
    $itemQ->userId=1;
    $itemQ->itemId=1;
    if(! $itemQ->save()) {
      Log::info('Unable to create item Question');
    } else {
      Log::info('Created ticket >>'.$itemQ->content);
    }
    
    $itemQ=new ItemQuestion;
    $itemQ->content = 'มีแบบที่ไม่มีพวงกุญแจหรือไม่';
    $itemQ->answer='ไม่มีค่ะ';
    $itemQ->userId=1;
    $itemQ->itemId=1;
    if(! $itemQ->save()) {
      Log::info('Unable to create item Question');
    } else {
      Log::info('Created ticket >>'.$itemQ->content);
    }

    $itemQ=new ItemQuestion;
    $itemQ->content = 'มีสีเขียวหรือไม่ครับ';
    $itemQ->answer='ไม่มีค่ะ';
    $itemQ->userId=2;
    $itemQ->itemId=2;
    if(! $itemQ->save()) {
      Log::info('Unable to create item Question');
    } else {
      Log::info('Created ticket >>'.$itemQ->content);
    }


  }
}