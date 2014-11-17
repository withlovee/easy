<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
</head>
<body>

<?php setlocale(LC_ALL, "th_TH"); ?>

เรียน คุณ {{ $fullName }}
เลขที่ใบเรียกเก็บเงิน : {{ $invoiceId}}
วันที่สั่งซื้อ : {{ $purchaseTimestamp}}

ขอขอบคุณที่สั่งซื้อสินค้ากับเรา รายการสั่งซื้อของท่าน

รายการสั่งซื้อ
เลขที่สินค้า  : {{ $item->itemId }}
ชื่อสินค้า  : {{ $item->itemName}}
จำนวน   : <quantity>
ราคา    : <price>
ราคาจัดส่ง 
ยอดรวม  : <total>

ที่อยู่จัดส่ง : <Address>
ที่อยู่ส่งใบเสร็จ <Address>



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