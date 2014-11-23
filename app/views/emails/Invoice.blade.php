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
@if ($itemType == "direct")
ขอขอบคุณที่สั่งซื้อสินค้ากับเรา รายการสั่งซื้อของท่าน
@elseif ($itemType == "auction")
ยินดีด้วย คุณเป็นผู้ชนะการประมูล
@endif
</p>


<h2>รายการสั่งซื้อ</h2>
<p>
เลขที่สินค้า  : {{ $itemId }}<br>
ชื่อสินค้า  : {{ $itemName}}<br>
จำนวน   : {{ $amount }} ชิ้น<br>
ราคา    : {{ number_format($price,2) }} บาท<br>
ราคาจัดส่ง : {{ number_format($shippingCost,2) }} บาท<br>
ยอดรวม  : {{ number_format($total,2) }} บาท<br>
<br>
ที่อยู่จัดส่ง : {{ $shippingAddress }}<br>
ที่อยู่ส่งใบเสร็จ : {{ $billingAddress }}
</p>

</body>
</html>