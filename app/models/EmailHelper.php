<?php

class EmailHelper extends Eloquent {

  function sendUserValidationEmail($email, $username, $fullName, $validationLink) {

    $data = array(
        'email' => $email,
        'username' => $username,
        'fullName' => $fullName,
        'validationLink' => $validationLink
      );

    Mail::queue('emails.UserValidation', $data, function($message) use ($data){
      $message->to($data['email'],  $data['fullName'])->subject('โปรดยืนยันการสมัครสมาชิกของคุณ');
    });


  }



}