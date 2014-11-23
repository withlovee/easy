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
คุณได้รับการชำระเงินแล้ว ดังนี้<br>
</p>


<h2>รายการสั่งซื้อ</h2>
<p>
เลขที่สินค้า  : {{ $itemId }}<br>
ชื่อสินค้า  : {{ $itemName}}<br>
จำนวน   : {{ $amount }}<br>
ราคา    : {{ number_format($price) }}<br>
ราคาจัดส่ง : {{ number_format($shippingCost) }}<br>
ยอดรวม  : {{ number_format($total) }}<br>
<br>
ที่อยู่จัดส่ง : {{ $shippingAddress }}<br>
ที่อยู่ส่งใบเสร็จ : {{ $billingAddress }}<br>
</p>

</body>
</html>