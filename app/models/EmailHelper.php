<?php

class EmailHelper extends Eloquent {

  function sendUserValidationEmail($username, $fullName, $email, $validationLink) {

    $data = array('username' => $username, 'validationLink' => $validationLink);

    Mail::send('emails.UserValidation', $data, function($message) use ($email, $fullName){
      $message->to($email,  $fullName)->subject('โปรดยืนยันการสมัครสมาชิกของคุณ');
    });

  }



}