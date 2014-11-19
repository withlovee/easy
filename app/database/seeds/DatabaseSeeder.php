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
    // $this->call('BidManagersTableSeeder');
    // $this->call('ItemTableSeeder');
    // $this->call('AdministratorsTableSeeder');
    // $this->call('SupportTicketsTableSeeder');
    // $this->call('ItemQuestionsTableSeeder');
    // $this->call('TransactionsTableSeeder');
    // $this->call('FeedbacksTableSeeder');

  }

}

class UsersTableSeeder extends Seeder {

  public function run()
  {
    $names = ['ณัฐพล','ขวัญฤทัย','ณสกล','ปริยวิศว์','ปิยวัฒน์','พนิดา','วิภาวี'];
    $surnames = ['พัฒนาวิจิตร','ทิพยศักดิ์','พงศ์กอปรสกล','จาตุกัญญาประทีป','เลิศวิทยากำจร','นิ่มนวล','ไตรรัตนาภา'];
    $addressess = ['12/23 ถนนพระราม 1 เขตปทุมวัน กรุงเทพฯ 10100',
                    'ดาวอังคาร',
                    '198 อาคาร U-Center ซอยจุฬา 42 แขวงวังใหม่ เขตปทุมวัน กรุงเทพมหานคร 10330',
                    '888/135 Hive Sathorn คลองสาน 10600',
                    '',
                    '112 ถนนสมเด็จเจ้าพระยา แขวงคลองสาน เขตคลองสาน กรุงเทพฯ 10600',
                    'Villa 35, Street No. 16, Community 366 Umm Suqeim 3, P.O. Box 51844 Dubai, United Arab Emirates'];
    $countries = ['TH','MARS','TH','TH','TH','TH','UAE'];
    $telephones = ['0850615555','02536711','087567566','0850504040','0815566777','081234356','0850615555'];
    $usernames = ['nuttt','quanruthai','nasakol','pariyawit','lkumjorn','cppanida','withlovee'];
    $emails = ['nuttt.p@gmail.com','Quanruthai.t@gmail.com','nasakol@gmail.com','pariyawit.jat@gmail.com','plkumjorn@gmail.com','cp.panida@gmail.com','vibhavee.t@gmail.com'];
    $passwords = ['1234','1234','1234','1234','1234','1234','1234'];
    $password_confirmations = ['1234','1234','1234','1234','1234','1234','1234'];
    $confirmeds = [true,true,true,true,true,true,true];
    $confirmation_codes = [md5(uniqid(mt_rand(), true)),md5(uniqid(mt_rand(), true)),md5(uniqid(mt_rand(), true)),md5(uniqid(mt_rand(), true)),md5(uniqid(mt_rand(), true)),md5(uniqid(mt_rand(), true)),md5(uniqid(mt_rand(), true))];
    $roles = ['Seller','Seller','Seller','Buyer','Buyer','Buyer','Buyer'];
    
    for ($i=0; $i <=6 ; $i++) { 
      $user = new User;  
      $user->name = $names[$i];
      $user->surname = $surnames[$i];
      $user->address = $addressess[$i];
      $user->country = $countries[$i];
      $user->telephone = $telephones[$i];
      $user->username = $usernames[$i];
      $user->email = $emails[$i];
      $user->password = $passwords[$i];
      $user->password_confirmation = $password_confirmations[$i];
      $user->confirmed = $confirmeds[$i];
      $user->confirmation_code = $confirmation_codes[$i];
      $user->role = $roles[$i];
      
      if(! $user->save()) {
        Log::info('Unable to create user '.$user->username, (array)$user->errors());
      } else {
        Log::info('Created user "'.$user->username.'" <'.$user->email.'>');
      }
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

class ItemsTableSeeder extends Seeder{
  public function run(){
    
    $item = new Item;
    $item->name='ที่ชาร์ตแบตสำรองสีชมพูแบบพวงกุญแจ 2600mAh';
    $item->picture='http://alicecat.biz/img/p/96-300-thickbox.jpg';
    $item->price=1250;
    $item->brand='ASDFEECCD';
    $item->model='CD012-33321';
    $item->volumn='2600mAh';
    $item->property='เรียกกันอีกชื่อง่ายๆคือ one touch silicone stand เพียงแค่กดเบาๆก็สามารถ งอและวางบนนิ้วมือหรือตั้งเพื่อดูได้ บอกเลยว่าน่ารักสุดๆ ไม่มีนี่พลาดมากอะ !!!ไอเท็มเพื่อเพิ่มลูกเล่นในการถ่ายภาพด้วยเลนส์เสริมสำหรับติดโทรศัพท์มือถือ สามารถถ่ายภาพแบบมุมกว้าง, กลมนูนแบบฟิชอาย หรือขยายเพื่อถ่ายระยะใกล้ได้ง่ายดายจากโทรศัพท์มือถือของคุณ ใช้ได้กับทุกรุ่นและยี่ห้อ...ห้ามพลาดนะคะ!';
    $item->quantity=7;
    $item->quality='ดีมาก';
    $item->returnPolicy='สามารถส่งคืนได้';
    $item->returnFee=50;
    $item->shipping= json_encode(array(
      'แบบด่วน' => '100',
      'แบบมาตรฐาน' => '50',
      'แบบประหยัด' => '30'
    ));
    $item->tax=7;
    $item->others='ห่อของขวัญฟรี';
    $item->type='direct';
    $item->endDateTime=null;
    $item->bidManagerId=null;
    $item->sellerId=7;
    $item->save();

    $item2=new Item;
    $item2->name='ที่วาง-ที่จับ มือถืออเนกประสงค์';
    $item2->picture='http://photo.oempromo.com/Prod_936/Folding-Cell-Phone-Holder_16780815.jpg';
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
    $item->shipping= json_encode(array(
      'แบบด่วน' => '100',
      'แบบมาตรฐาน' => '50',
      'แบบประหยัด' => '30'
    ));
    $item2->tax=7;
    $item2->others='ห่อของขวัญ';
    $item2->type='auction';
    $item2->endDateTime=date('d/m/Y',strtotime("30/11/2014"));
    $item2->bidManagerId=1;
    $item2->sellerId=6;
    $item2->save();

    $rilakkuma=new Item;
    $rilakkuma->name='ตุ๊กตาหมี ริลัคคุมะ';
    $rilakkuma->picture='http://g.lnwfile.com/ltvarq.jpg';
    $rilakkuma->price=490;
    $rilakkuma->brand='San-X';
    $rilakkuma->model='rilakkuma';
    $rilakkuma->volumn='';
    $rilakkuma->property='ตุ๊กตาหมี  ริลัคคุมะ rilakkuma ถือช่อดอกไม้ 12นิ้ว';
    $rilakkuma->size='';
    $rilakkuma->quantity=1;
    $rilakkuma->quality='';
    $rilakkuma->defect='';
    $rilakkuma->returnPolicy='ASDFEECCD';
    $rilakkuma->returnFee=50;
    $rilakkuma->shipping='แบบด่วน: 100 บาท<br>แบบมาตรฐาน: 50 บาท<br>แบบประหยัด: 30 บาท</td>';
    $rilakkuma->tax=7;
    $rilakkuma->others='ห่อของขวัญ';
    $rilakkuma->type='direct';
    $rilakkuma->endDateTime=null;
    $rilakkuma->bidManagerId=null;
    $rilakkuma->sellerId=6;
    $rilakkuma->save();
  }
}

class AdministratorsTableSeeder extends Seeder {

  public function run()
  {
    $admin = new Administrator;
    $admin->username = 'admin';
    $admin->password = sha1('1234');

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


class TransactionsTableSeeder extends Seeder{

  public function run(){
    $item = Item::where('id','>','0')->firstOrFail();
    $buyer = User::where('role', '=', 'Buyer')->firstOrFail();
    if($item && $buyer){
      // Transaction for DirectBuyItem
      $transaction = new Transaction;
      $transaction->amount = 1;
      $transaction->price = $item->price;
      $transaction->shipping = 'ปกติ';
      $transaction->shippingCost = 50;
      $transaction->status = 'payment_waiting';
      $transaction->buyerId = $buyer->id;
      $transaction->sellerId = $item->seller->id;
      $transaction->itemId = $item->id;
      $transaction->save();

      // Paid Transaction for DirectBuyItem
      $transaction = new Transaction;
      $transaction->amount = 1;
      $transaction->price = $item->price;
      $transaction->shipping = 'ปกติ';
      $transaction->shippingCost = 50;
      $transaction->status = 'paid';
      $transaction->buyerId = $buyer->id;
      $transaction->sellerId = $item->seller->id;
      $transaction->itemId = $item->id;
      $transaction->save();

    }
  }

}

class FeedbacksTableSeeder extends Seeder{
  public function run(){
    $feedback = new Feedback;
    $feedback->senderId = 1;
    $feedback->receiverId = 2;
    $feedback->transactionId = 1;
    $feedback->content = 'เยี่ยมมากๆ';
    $feedback->score = 5;
    if(! $feedback->save()) {
      Log::info('Unable to create feedback');
    } else {
      Log::info('Created feedback >>'.$feedback->content);
    }

    $feedback = new Feedback;
    $feedback->senderId = 3;
    $feedback->receiverId = 2;
    $feedback->transactionId = 2;
    $feedback->content = 'กากมากๆ';
    $feedback->score = 2;
    if(! $feedback->save()) {
      Log::info('Unable to create feedback');
    } else {
      Log::info('Created feedback >>'.$feedback->content);
    }
  }
}
