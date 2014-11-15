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
    $item->itemId='2';
    $item->itemName='ที่วาง-ที่จับ มือถืออเนกประสงค์';
    $item->picture='https://fbexternal-a.akamaihd.net/safe_image.php?d=AQBWUBt17aRrtrfk&w=254&h=133&url=https%3A%2F%2Fwww.facebook.com%2Fads%2Fimage%2F%3Fd%3DAQIvvP7Lj_5Kh5fEBjh3saMkiuYeBfZV_mahnynb5pd0f7fOPJ4e2omGytmBSKBP4Omo_TuR4AsHvFjMs4qCk5nKIyjhOMWgs5j7s_YONSynC0dutPEJXMqIEHaro06oUilGMv5l6OLs60K3Of_e8eme&cfs=1';
    $item->price=145;
    $item->brand='ASDFEECCD';
    $item->model='CD012-33321';
    $item->volumn='';
    $item->property='เรียกกันอีกชื่อง่ายๆคือ one touch silicone stand เพียงแค่กดเบาๆก็สามารถ งอและวางบนนิ้วมือหรือตั้งเพื่อดูได้ บอกเลยว่าน่ารักสุดๆ ไม่มีนี่พลาดมากอะ !!!ไอเท็มเพื่อเพิ่มลูกเล่นในการถ่ายภาพด้วยเลนส์เสริมสำหรับติดโทรศัพท์มือถือ สามารถถ่ายภาพแบบมุมกว้าง, กลมนูนแบบฟิชอาย หรือขยายเพื่อถ่ายระยะใกล้ได้ง่ายดายจากโทรศัพท์มือถือของคุณ ใช้ได้กับทุกรุ่นและยี่ห้อ...ห้ามพลาดนะคะ!';
    $item->size='';
    $item->quantity=1;
    $item->quality='';
    $item->defect='';
    $item->returnPolicy='ASDFEECCD';
    $item->returnFee=50;
    $item->shipping='แบบด่วน: 100 บาท<br>แบบมาตรฐาน: 50 บาท<br>แบบประหยัด: 30 บาท</td>';
    $item->tax=7;
    $item->others='ห่อของขวัญ';
    $item->type='auction';
    $item->endDateTime=date('d/m/Y',strtotime("30/11/2014"));
    $item->bidManagerId=1;
    $item->save();
  }
}