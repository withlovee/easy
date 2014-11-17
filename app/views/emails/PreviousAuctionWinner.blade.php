<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
</head>
<body>

<?php setlocale(LC_ALL, "th_TH"); ?>

เรียน คุณ  {{ $fullName }}<br><br>
ขอบคุณที่เข้าร่วมการประมูลสินค้า<br>
เลขที่สินค้า #{{ $itemId }} ชื่อสินค้า <strong>{{ $itemName }}</strong><br><br>
<strong>ขณะนี้ คุณแพ้การประมูล</strong><br><br>
ราคาสินค้า ณ {{ strftime("%e %B %Y %R", $currentBidTimestamp) }} คือ <strong>{{ $currentBid }}</strong> <br>
สิ้นสุดการประมูล ณ {{ strftime("%e %B %Y %R", $endAuctionTimestamp) }} <br>

คุณสามารถปรับเปลี่ยนราคาการประมูลได้เพื่อเป็นผู้ชนะได้ที่<br>
{{ $itemLink }}

  
</body>
</html>