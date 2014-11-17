@extends('layouts.master', ['title' => 'เข้าสู่ระบบสำหรับผู้ดูแลระบบ'])

@section('error')
@stop
@section('wrapper')
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4" id="signin">
            <h2 class="form-signin-heading">เข้าสู่ระบบสำหรับผู้ดูแลระบบ</h2>
            @include('layouts.error')
            <form method="POST" action="{{{ URL::to('/admin/login') }}}" accept-charset="UTF-8" class="form-signin">
                <input type="hidden" name="_token" value="{{{ Session::getToken() }}}">
                <div class="form-group">
                    <label for="email">ชื่อประจำตัว</label>
                    <input class="form-control" tabindex="1" placeholder="your-id" type="text" name="username" id="username" value="{{{ Input::old('email') }}}" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">รหัสผ่าน</label>
                    <a href="{{{ URL::to('/users/forgot_password') }}}" style="display: none;">(ลืมรหัสผ่าน)</a>
                    <input class="form-control" tabindex="2" placeholder="******" type="password" name="password" id="password" required>
                </div>
                <button class="btn btn-lg btn-primary btn-block" type="submit"><span class="glyphicon glyphicon-ok"></span> เข้าสู่ระบบ</button>
            </form>
        </div>
    </div><!--row-->
</div>
<!-- /.container -->

@stop