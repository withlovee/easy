<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
</head>
<body>

<?php setlocale(LC_ALL, "th_TH"); ?>

<p>
เรียน คุณ {{ $fullName }}<br>
เลขที่สินค้า {{ $itemId }}
</p>

<p>
การซื้อขายสำเร็จแล้ว โปรดให้คะแนนความพึงพอใจของคุณที่มีต่อการซื้อขายครั้งนี้ ที่<br>
<a href="{{ $feedbackUrl }}">{{ $feedbackUrl }}</a><br>
<br>
ขอบคุณค่ะ
</p>


</body>
</html>