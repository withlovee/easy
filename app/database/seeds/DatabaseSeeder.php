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
    $this->call('ItemsTableSeeder');
    $this->call('AdministratorsTableSeeder');
    $this->call('SupportTicketsTableSeeder');
    $this->call('ItemQuestionsTableSeeder');
    $this->call('TransactionsTableSeeder');
    $this->call('FeedbacksTableSeeder');

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
    $item->picture='battery1.jpg';
    $item->price=1250;
    $item->brand='ASDFEECCD';
    $item->model='CD012-33321';
    $item->volumn='2600mAh';
    $item->property='Power Bank A5 รุ่นยอดนิยม ขนาดเล็กเท่าพวงกุญแจ ความจุ 2600mAh ขนาดเล็ก น้ำหนักเบา พกสะดวกสุดๆ ไว้ยามฉุกเฉินเป็นทั้งพวงกุญแจและยังมีกลิ่นหอมอีกด้วย สามารถขาร์จ iPhone 4s ได้ 1 รอบ';
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
    $item->sellerId=1;
    $item->save();

    $item2=new Item;
    $item2->name='ที่วาง-ที่จับ มือถืออเนกประสงค์';
    $item2->picture='cell1.jpg';
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
    $item2->shipping= json_encode(array(
      'แบบด่วน' => '100',
      'แบบมาตรฐาน' => '50',
      'แบบประหยัด' => '30'
    ));
    $item2->tax=7;
    $item2->others='ห่อของขวัญ';
    $item2->type='auction';
    $item2->endDateTime=date('d/m/Y',strtotime("30/11/2014"));
    $item2->bidManagerId=1;
    $item2->sellerId=2;
    $item2->save();

    $rilakkuma=new Item;
    $rilakkuma->name='ตุ๊กตาหมี ริลัคคุมะ';
    $rilakkuma->picture='rilak3.jpg';
    $rilakkuma->price=490;
    $rilakkuma->brand='San-X';
    $rilakkuma->model='rilakkuma';
    $rilakkuma->volumn='';
    $rilakkuma->property='ตุ๊กตาหมี  ริลัคคุมะ rilakkuma ถือช่อดอกไม้ 12นิ้ว';
    $rilakkuma->size='120cm';
    $rilakkuma->quantity=4;
    $rilakkuma->quality='';
    $rilakkuma->defect='';
    $rilakkuma->returnPolicy='ASDFEECCD';
    $rilakkuma->returnFee=50;
    $rilakkuma->shipping=json_encode(array(
      'แบบด่วน' => '100',
      'แบบมาตรฐาน' => '50',
      'แบบประหยัด' => '30'
    ));
    $rilakkuma->tax=7;
    $rilakkuma->others='ห่อของขวัญ';
    $rilakkuma->type='direct';
    $rilakkuma->endDateTime=null;
    $rilakkuma->bidManagerId=null;
    $rilakkuma->sellerId=3;
    $rilakkuma->save();

    $rilakkuma=new Item;
    $rilakkuma->name='Rilakkuma ตุ๊กตา ขนาด 50 ซม. - สีน้ำตาล';
    $rilakkuma->picture='rilak2.jpg';
    $rilakkuma->price=239;
    $rilakkuma->brand='San-X';
    $rilakkuma->model='rilakkuma';
    $rilakkuma->volumn='';
    $rilakkuma->property='Rilakkuma ตุ๊กตา ขนาด 50 ซม. - สีน้ำตาล เป็นของเล่นที่คู่กับคนทุกเพศทุกวัยมาอย่างยาวนานและอาจจะนิยมในเด็กน้อยมากที่สุดเพราะเจ้าตุ๊กตารูปทรงต่างๆ นั้นจะทำให้เด็กมีจินตนาการที่กว้างไกลไม่มีที่สิ้นสุดเด็กน้อยสามารถเล่นกับตุ๊กตาได้อย่างสนุกสนานเพลิดเพลินรวมถึงยังทำให้เด็กมีทักษะในการมองเห็นจดจำและการใช้กล้ามเนื้อได้มากยิ่งขึ้นอีกด้วย ';
    $rilakkuma->size='50cm';
    $rilakkuma->quantity=4;
    $rilakkuma->quality='';
    $rilakkuma->defect='';
    $rilakkuma->returnPolicy='ไม่รับเปลี่ยนหรือคืน';
    $rilakkuma->returnFee=50;
    $rilakkuma->shipping=json_encode(array(
      'แบบด่วน' => '100',
      'แบบมาตรฐาน' => '50',
      'แบบประหยัด' => '30'
    ));
    $rilakkuma->tax=7;
    $rilakkuma->others='ห่อของขวัญ';
    $rilakkuma->type='direct';
    $rilakkuma->endDateTime=null;
    $rilakkuma->bidManagerId=null;
    $rilakkuma->sellerId=3;
    $rilakkuma->save();

    $rilakkuma=new Item;
    $rilakkuma->name='Rilakkuma ตุ๊กตาหมอนข้าง - สีน้ำตาล ขนาด 76 ซ.ม.';
    $rilakkuma->picture='rilak1.jpg';
    $rilakkuma->price=299;
    $rilakkuma->brand='San-X';
    $rilakkuma->model='rilakkuma';
    $rilakkuma->volumn='';
    $rilakkuma->property='สะสมก็ได้ โชว์ก็ดี นอนกอดก็นุ่ม มอบเป็นของขวัญก็ถูกใจ ต้องนี่เลย! Rilakkuma ตุ๊กตาหมอนข้าง - สีน้ำตาล ขนาด 76 ซ.ม. ขนาด 76 ซ.ม. ตุ๊กตาหมีริลัคคุมะ ดีไซน์น่ารัก ผลิตจากเนื้อผ้านุ่มพิเศษ ตุ๊กตาที่ให้คุณใช้สะสมก็ได้ โชว์ก็ดี นอนกอดก็นุ่มสบาย ';
    $rilakkuma->size='76 cm';
    $rilakkuma->quantity=0;
    $rilakkuma->quality='';
    $rilakkuma->defect='';
    $rilakkuma->returnPolicy='ไม่รับเปลี่ยนหรือคืน';
    $rilakkuma->returnFee=50;
    $rilakkuma->shipping=json_encode(array(
      'แบบด่วน' => '100',
      'แบบมาตรฐาน' => '50',
      'แบบประหยัด' => '30'
    ));
    $rilakkuma->tax=7;
    $rilakkuma->others='ห่อของขวัญ';
    $rilakkuma->type='direct';
    $rilakkuma->endDateTime=null;
    $rilakkuma->bidManagerId=null;
    $rilakkuma->sellerId=3;
    $rilakkuma->save();
  
    $item = new Item;
    $item->name='Nikon Compact Camera Coolpix L29 - Silver';
    $item->picture='nikon.jpg';
    $item->price=1749;
    $item->brand='Nikon';
    $item->model='Coolpix L29';
    $item->volumn='';
    $item->property='ภาพสวย สร้างได้แค่ปลายนิ้วมือของคุณ ด้วย Nikon Compact Camera Coolpix L29 - Silver ที่ให้คุณใช้งานง่าย พร้อมพร้อมให้คุณได้สรรค์สร้างจินตนาการได้ดั่งใจในแบบที่เป็นคุณ ไม่ว่าจะไปที่ใดในโลกใบนี้ ให้กล้องตัวนี้ไปเป็นเพื่อนคุณ เก็บภาพประทับใจในทุกที่ ที่คุณก้าวเดิน ';
    $item->quantity=3;
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
    $item->sellerId=1;
    $item->save();

    $item = new Item;
    $item->name='Canon PowerShot SX50 HS - Black';
    $item->picture='canon1.jpg';
    $item->price=14790;
    $item->brand='Canon';
    $item->model='PowerShot SX50 HS';
    $item->volumn='';
    $item->property='เก็บภาพและวินาทีประทับใจให้อยู่กับคุณตลอดไปด้วยกล้องดิจิตอลคอมแพค Canon PowerShot SX50 HS – Black กล้องถ่ายรูปอัจฉริยะจากซีรี่ย์ Power Shot มาพร้อมกับฟังก์ชั่นการใช้งานอัจฉริยะ และลูกเล่นต่างๆ มากมาย ให้คุณสนุกไปกับการถ่ายรูปได้อย่างไม่จำกัด พร้อมดีไซน์สวยงาม และหน้าจอ LCD แบบปรับหมุนได้';
    $item->quantity=3;
    $item->quality='ดีมาก';
    $item->returnPolicy='สามารถส่งคืนได้';
    $item->returnFee=50;
    $item->shipping= json_encode(array(
      'แบบด่วน' => '90',
      'แบบมาตรฐาน' => '50',
      'แบบประหยัด' => '30'
    ));
    $item->tax=7;
    $item->others='ห่อของขวัญฟรี';
    $item->type='direct';
    $item->endDateTime=null;
    $item->bidManagerId=null;
    $item->sellerId=1;
    $item->save();
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
