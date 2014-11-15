<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
</head>
<body>

เรียน คุณ {{ $fullName }}<br><br>
ขอขอบคุณที่สมัครสมาชิก Electronic Auction System (EASY)<br>
ชื่อผู้ใช้งานของคุณคือ:  <strong>{{ $username }}</strong><br><br>
กรุณาคลิกที่ลิงก์ด้านล่างเพื่อ Activate Username/Password และจัดการประวัติส่วนตัวของคุณเพิ่มเติม<br>
<a href="{{ $validationLink }}" target="_blank">{{ $validationLink }}</a>
  
</body>
</html>