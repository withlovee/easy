@extends('layouts.master', ['title' => 'เข้าสู่ระบบ'])

@section('error')
@stop
@section('wrapper')
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4" id="signin">
            <h2 class="form-signin-heading">เข้าสู่ระบบ</h2>
            @if (Session::get('error'))
                <div class="alert alert-danger">{{{ Session::get('error') }}}</div>
            @endif
            @if (Session::get('notice'))
                <div class="alert alert-success">{{ Session::get('notice') }}</div>
            @endif
            <form method="POST" action="{{{ URL::to('/users/login') }}}" accept-charset="UTF-8" class="form-signin">
                <input type="hidden" name="_token" value="{{{ Session::getToken() }}}">
                <div class="form-group">
                    <label for="email">ชื่อประจำตัว</label>
                    <input class="form-control" tabindex="1" placeholder="your-id" type="text" name="email" id="email" value="{{{ Input::old('email') }}}" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">รหัสผ่าน</label>
                    <a href="{{{ URL::to('/users/forgot_password') }}}" style="display: none;">(ลืมรหัสผ่าน)</a>
                    <input class="form-control" tabindex="2" placeholder="******" type="password" name="password" id="password" required>
                </div>
                <div class="form-group">
                    <label for="remember" class="checkbox">เข้าสู่ระบบตลอดไป
                        <input type="hidden" name="remember" value="0">
                        <input type="checkbox" name="remember" id="remember" value="1">
                    </label>
                </div>
                <button class="btn btn-lg btn-primary btn-block" type="submit"><span class="glyphicon glyphicon-ok"></span> เข้าสู่ระบบ</button>
            </form>
        </div>
    </div><!--row-->
</div>
<!-- /.container -->

@stop