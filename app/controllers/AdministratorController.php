<?php

class AdministratorController extends BaseController {


  public function login() {
    return View::make();
  }

  public function doLogin() {


    // if already have session
    if(Session::has('admin')) {
      // redirect to somewhere
      Redirect::to('/')->with('message', 'เข้าสู่ระบบผู้ดูแลระบบสำเร็จแล้ว');
    } 

    // Check for POST request 
    if(Input::has('username') && Input::has('password')) {
      $username = Input::get('username');
      $password = Input::get('password');

      $admin = Administrator::where('username', '=', $username)
                            ->where('password', '=', Hash::make($password))
                            ->first();

      if($admin) {
        Session::put('admin', $admin->id);
        // redirect to main page
        Redirect::to('/')->with('message', 'เข้าสู่ระบบผู้ดูแลระบบสำเร็จแล้ว');
      } else {
        //redirect to somewhere with error
        Redirect::to('admin/login')->with('message', 'ชื่อผู้ใช้หรือรหัสผ่านผิดพลาด');
      }
    } else {
      // redirect to somewhere
      Redirect::to('admin/login');
    }
  }

  public function doLogout() {
    Session::forget('admin');
    // redirect to login page
    Redirect::to('admin/login')->with('message', 'ออกจากระบบสำเร็จแล้ว');
  }

}