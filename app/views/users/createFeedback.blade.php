@extends('layouts.master', ['title' => 'แก้ไขข้อมูลส่วนตัว'])

@section('content')
	<h1 class="line">แก้ไขข้อมูลส่วนตัว</h1>
	@include('layouts.error')
	{{ Form::model($user, array('action' => array('UsersController@doProfile', $user->id), 'class' => 'form-horizontal')) }}
		@include('users.form')
		{{ Form::hidden('username', null) }}
		<div class="form-group">
			<label for="password" class="col-sm-3 control-label">เปลี่ยนรหัสผ่าน</label>
			<div class="col-sm-3">
				{{ Form::password('password', ['class' => 'form-control', 'placeholder' => '******']) }}
			</div>
			<div class="col-sm-6 help-text">รหัสผ่านต้องเป็นตัว a-z และ 0-9 ผสมกันยาว 6-20 ตัวอักษรเท่านั้น</div>
		</div><!--form-group-->
		<div class="form-group">
			<label for="password_confirmation" class="col-sm-3 control-label" style="padding-left:0">ยืนยันรหัสผ่าน</label>
			<div class="col-sm-3">
				{{ Form::password('password_confirmation', ['class' => 'form-control', 'placeholder' => '******']) }}
			</div>
			<div class="col-sm-6 help-text">ใส่รหัสผ่านเหมือนกับด้านบน</div>
		</div><!--form-group-->
		<div class="form-group">
			<div class="col-sm-offset-3 col-sm-8">
				<button type="submit" class="btn btn-primary">ปรับปรุงข้อมูล</button>
			</div>
		</div>
	{{ Form::close() }}
@stop
@section('sidebar')
	@include('sidebars.personal')
@stop