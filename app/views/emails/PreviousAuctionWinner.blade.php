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
   * @param Array $args Array of parameters required. itemId, itemName, currentBid,
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

<?php setlocale("th_TH"); ?>

เรียน คุณ  {{ $fullName }}<br>
ขอบคุณที่เข้าร่วมการประมูลสินค้า เลขที่สินค้า {{ $idemId }} ชื่อสินค้า {{ $itemName }}
ขณะนี้ คุณแพ้การประมูล
ราคาสินค้า ณ {{ strftime("%e %B %y %R", $currentBidTimestamp) }} คือ {{ $currentBid }} 
สิ้นสุดการประมูล ณ {{ strftime("%e %B %y %R", $endAuctionTimestamp) }}

คุณสามารถปรับเปลี่ยนราคาการประมูลได้เพื่อเป็นผู้ชนะได้ที่
{{ $link }}

  
</body>
</html>