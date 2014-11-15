<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
</head>
<body>
  การสมัครของคุณใกล้เสร็จสมบูรณ์<br>
  <br>
  Username ของคุณคือ <strong>{{ $username }}</strong><br>
  <br>
  โปรดกดลิงค์ด้านล่างเพื่อยืนยันการสมัคร<br>

  <a href="{{ $validationLink }}" target="_blank">{{ $validationLink }}</a>
</body>
</html>