<?php

return array(

    'username' => 'ชื่อผู้ใช้',
    'password' => 'รหัสผ่าน',
    'password_confirmation' => 'ยืนยันรหัสผ่าน',
    'e_mail' => 'อีเมล์',
    'username_e_mail' => 'ชื่อผู้ใช้หรืออีเมล์',

    'signup' => array(
        'title' => 'สมัครสมาชิก',
        'desc' => 'สมัครเพื่อเป็นสมาชิกใหม่',
        'confirmation_required' => 'เราจะส่งเมล์ไปเพื่อยืนยันการสมัครสมาชิก',
        'submit' => 'สมัครสมาชิก',
    ),

    'login' => array(
        'title' => 'เข้าสู่ระบบ',
        'desc' => 'ใส่ชื่อผู้ใช้และรหัสผ่านเพื่อเข้าสู่ระบบ',
        'forgot_password' => '(ลืมรหัสผ่าน)',
        'remember' => 'เข้าสู่ระบบตลอดไป',
        'submit' => 'เข้าสู่ระบบ',
    ),

    'forgot' => array(
        'title' => 'ลืมรหัสผ่าน',
        'submit' => 'ต่อไป',
    ),

    'alerts' => array(
        'account_created' => 'สมัครสมาชิกเรียบร้อยแล้ว',
        'instructions_sent'       => 'กรุณาเช็คอีเมล์เพื่อรับรหัสยืนยันการสมัครสมาชิก',
        'too_many_attempts' => 'มีการกดเข้ารู่ระบบมากเกินไป กรุณาลองใหม่ภายหลัง',
        'wrong_credentials' => 'ใส่ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง',
        'not_confirmed' => 'คุณยังไม่ได้ยืนยันการสมัครสมาชิก กรุณาเช็คอีเมล์',
        'confirmation' => 'ยืนยันสมาชิกเรียบร้อยแล้ว คุณสามารถเข้าสู่ระบบได้',
        'password_confirmation' => 'รหัสผ่านที่ใส่ไม่ตรงกัน', 
        'wrong_confirmation' => 'รหัสยืนยันสมาชิกไม่ถูกต้อง',
        'password_forgot' => 'ส่งอีเมล์ตั้งรหัสผ่านใหม่ไปทางอีเมล์ของคุณแล้ว กรุณาเช็คอีเมล์',
        'wrong_password_forgot' => 'ไม่พบผู้ใช้นี้',
        'password_reset' => 'เปลี่ยนรหัสผ่านเรียบร้อยแล้ว',
        'wrong_password_reset' => 'รหัสผ่านไม่ถูกต้อง กรุณาลองอีกครั้ง',
        'wrong_token' => 'รหัสเพื่อเปลี่ยนรหัสผ่านไม่ถูกต้อง',
        'duplicated_credentials' => 'ชื่อผู้ใช้หรืออีเมล์นี้ได้ถูกใช้ไปแล้ว กรุณาใช้ชื่ออื่น',
    ),

    'email' => array(
        'account_confirmation' => array(
            'subject' => 'ยืนยันการสมัครสมาชิก',
            'greetings' => 'สวัสดีคุณ :name',
            'body' => 'กรุณาคลิกลิงก์ด้านล่างเพื่อยืนยันการสมัครสมาชิก',
            'farewell' => 'ขอบคุณครับ',
        ),

        'password_reset' => array(
            'subject' => 'ตั้งรหัสผ่านใหม่',
            'greetings' => 'สวัสดีคุณ :name',
            'body' => 'กรุณาคลิกลิงก์ด้านล่างเพื่อเปลี่ยนรหัสผ่านใหม่',
            'farewell' => 'ขอบคุณครับ',
        ),
    ),

);
