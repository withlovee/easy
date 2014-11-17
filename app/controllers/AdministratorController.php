<?php

class AdministratorController extends BaseController {


  public function login() {
    return View::make('admin.login');
  }

  public function doLogin() {


    // if already have session
    if(Session::has('admin')) {
      return Redirect::to('/')->with('notice', 'เข้าสู่ระบบผู้ดูแลระบบสำเร็จแล้ว');
    } 

    // Check for POST request 
    if(Input::has('username') && Input::has('password')) {
      $username = Input::get('username');
      $password = Input::get('password');

      $admin = Administrator::where('username', '=', $username)
                            ->where('password', '=', sha1($password))
                            ->first();

      if($admin) {
        Session::put('admin', $admin->id);
        return Redirect::to('/')->with('notice', 'เข้าสู่ระบบผู้ดูแลระบบสำเร็จแล้ว');
      } else {
        return Redirect::to('admin/login')->with('error', 'ชื่อผู้ใช้หรือรหัสผ่านผิดพลาด');
      }
    } else {
      return Redirect::to('admin/login');
    }
  }

  public function doLogout() {
    Session::forget('admin');
    // redirect to login page
    return Redirect::to('admin/login')->with('message', 'ออกจากระบบสำเร็จแล้ว');
  }

}