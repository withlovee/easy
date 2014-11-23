<?php

class Administrator extends Eloquent{
	public $timestamps = false;

  public static function findWithUsernameAndPassword($username, $password) {
    $admin = Administrator::where('username', '=', $username)
                            ->where('password', '=', sha1($password))
                            ->first();

    return $admin;
  }



}