<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
</head>
<body>

<?php setlocale(LC_ALL, "th_TH"); ?>

<p>
เรียน คุณ {{ $fullName }}<br>
เลขที่ใบเรียกเก็บเงิน : {{ $invoiceId }}<br>
วันที่สั่งซื้อ : {{ $purchaseTimestamp }}
</p>

<p>
คุณได้รับการยืนยันการชำระเงินเรียบร้อย  สินค้าจะถูกส่งตามที่อยู่จัดส่งที่ระบุไว้ภายในเว็บ<br>
<br>
ขอบคุณค่ะ
</p>


<h2>รายการสั่งซื้อ</h2>
<p>
เลขที่สินค้า  : {{ $itemId }}<br>
ชื่อสินค้า  : {{ $itemName}}<br>
จำนวน   : {{ $amount }} ชิ้น<br>
ราคา    : {{ number_format($price) }} บาท<br>
ราคาจัดส่ง : {{ number_format($shippingCost) }} บาท<br>
ยอดรวม  : {{ number_format($total) }} บาท<br>
<br>
ที่อยู่จัดส่ง : {{ $shippingAddress }}<br>
ที่อยู่ส่งใบเสร็จ : {{ $billingAddress }}<br>
</p>

</body>
</html>