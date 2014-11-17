<!--
/*

เรียน คุณ  <ชื่อ> <นามสกุล>
ขอบคุณที่เข้าร่วมการประมูลสินค้า เลขที่สินค้า ##### ชื่อสินค้า
ขณะนี้ คุณแพ้การประมูล
ราคาสินค้า ณ เวลา ##.## วัน/เดือน/ปี คือ ###.## 
สิ้นสุดการประมูล ณ เวลา ##.## วัน/เดือน/ปี คือ ###.## 

คุณสามารถปรับเปลี่ยนราคาการประมูลได้เพื่อเป็นผู้ชนะได้ที่ : <link>


*/

  /**
   * Send email to tell user that he is outbidded.
   * @param String $email 
   * @param String $username 
   * @param String $fullname 
   * @param Array $args Array of parameters required. id, name, currentBid,
   * currentBidTimestamp, endAuctionTimestamp, and itemLink is required as a key-value of array.
   * @return type
   */

   -->


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
</head>
<body>

<?php setlocale(LC_ALL, "th_TH"); ?>

เรียน คุณ  {{ $fullName }}<br><br>
ขอบคุณที่เข้าร่วมการประมูลสินค้า<br>
เลขที่สินค้า #{{ $id }} ชื่อสินค้า <strong>{{ $name }}</strong><br><br>
<strong>ขณะนี้ คุณแพ้การประมูล</strong><br><br>
ราคาสินค้า ณ {{ strftime("%e %B %Y %R", $currentBidTimestamp) }} คือ <strong>{{ $currentBid }}</strong> <br>
สิ้นสุดการประมูล ณ {{ strftime("%e %B %Y %R", $endAuctionTimestamp) }} <br>

คุณสามารถปรับเปลี่ยนราคาการประมูลได้เพื่อเป็นผู้ชนะได้ที่<br>
{{ $itemLink }}

  
</body>
</html>