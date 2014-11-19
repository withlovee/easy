<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
</head>
<body>

<?php setlocale(LC_ALL, "th_TH"); ?>

เรียน คุณ {{ $fullName }}
เลขที่ใบเรียกเก็บเงิน : {{ $invoiceId }}
วันที่สั่งซื้อ : {{ $purchaseTimestamp }}

คุณได้รับการยืนยันการชำระเงินเรียบร้อย  สินค้าจะถูกส่งตามที่อยู่จัดส่งที่ระบุไว้ภายในเว็บ

ขอบคุณค่ะ

รายการสั่งซื้อ
เลขที่สินค้า  : {{ $itemId }}
ชื่อสินค้า  : {{ $itemName}}
จำนวน   : {{ $amount }}
ราคา    : {{ $price }}
ราคาจัดส่ง : {{ $shippingCost }}
ยอดรวม  : {{ $total }}

ที่อยู่จัดส่ง : {{ $shippingAddress }}
ที่อยู่ส่งใบเสร็จ : {{ $billingAddress }}

</body>
</html>