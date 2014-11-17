@extends('layouts.master', ['title' => 'Create a New User'])

@section('header-buttons')
	<div class="btn-group right">
		{{ HTML::link('users', 'Back', array('class' => 'btn btn-default')) }}
	</div>
@stop

@section('content')
	<h1 class="line">สมัครสมาชิก</h1>
	@include('layouts.error')
	<form class="form-horizontal" role="form" method="POST" action="{{{ URL::to('users') }}}" accept-charset="UTF-8">
		<input type="hidden" name="_token" value="{{{ Session::getToken() }}}">
		@include('users.form')
		<div class="form-group">
			<label for="username" class="col-sm-3 control-label">ชื่อประจำตัวผู้ใช้</label>
			<div class="col-sm-3">
				{{ Form::text('username', null, ['class' => 'form-control', 'placeholder' => 'myuserid', 'required' => 'required']) }}
			</div>
			<div class="col-sm-6 help-text">ชื่อต้องเป็นตัว a-z และ 0-9 ผสมกันยาว 6-20 ตัวอักษรเท่านั้น</div>
		</div><!--form-group-->
		<div class="form-group">
			<label for="password" class="col-sm-3 control-label">รหัสผ่าน</label>
			<div class="col-sm-3">
				{{ Form::password('password', ['class' => 'form-control', 'placeholder' => '******', 'required' => 'required']) }}
			</div>
			<div class="col-sm-6 help-text">รหัสผ่านต้องเป็นตัว a-z และ 0-9 ผสมกันยาว 6-20 ตัวอักษรเท่านั้น</div>
		</div><!--form-group-->
		<div class="form-group">
			<label for="password_confirmation" class="col-sm-3 control-label" style="padding-left:0">ยืนยันรหัสผ่าน</label>
			<div class="col-sm-3">
				{{ Form::password('password_confirmation', ['class' => 'form-control', 'placeholder' => '******', 'required' => 'required']) }}
			</div>
			<div class="col-sm-6 help-text">ใส่รหัสผ่านเหมือนกับด้านบน</div>
		</div><!--form-group-->
		<div class="form-group">
			<label for="role" class="col-sm-3 control-label">สมัครเป็น</label>
			<div class="col-sm-3">
				{{ Form::select('role', array('' => 'กรุณาเลือก', 'Seller' => 'ผู้ขาย', 'Buyer' => 'ผู้ซื้อ'), null, ['class' => 'form-control', 'required' => 'required']) }}
			</div>
			<div class="col-sm-6 help-text">เลือกว่าจะสมัครเป็นผู้ซื้อหรือผู้ขาย</div>
		</div><!--form-group-->
		<div class="form-group">
			<div class="col-sm-offset-3 col-sm-10">
				<div class="checkbox">
					<label>
						{{ Form::checkbox('agree', '1', null, ['required' => 'required']) }} ฉันอ่านและยอมรับ<strong>เงื่อนไขในการใช้งาน</strong>
					</label>
				</div>
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-offset-3 col-sm-8">
				<button type="submit" class="btn btn-primary">สมัครสมาชิก</button>
			</div>
		</div>
	</form>
@stop
@section('sidebar')
	<h3>เงื่อนไขในการใช้งาน</h3>
	<div class="box small-text">
		<ol>
			<li>ขอสงวนสิทธิให้เฉพาะผู้ใช้บริการที่ลงทะเบียนเป็นสมาชิกออนไลน์สามารถสั่งซื้อสินค้าและ/หรือบริการ หรือร่วมทำกิจกรรมต่างๆที่จัดขึ้นในเว็บไซต์ อาทิเช่น การประมูล</li>
			<li>ผู้ใช้บริการจะต้องให้ข้อมูลส่วนบุคคลของตนเองอย่างถูกต้อง สมบูรณ์ และทันสมัย (update) ที่สุด</li>
			<li>ผู้ใช้บริการตกลงจะรักษา login name และรหัสผ่านไว้เป็นความลับ</li>
			<li>ในกรณีผู้ใช้บริการใช้สิทธิไปในทางที่ก่อให้เกิดความเสียหายต่อผู้ใช้บริการอื่นใด ผู้ใช้บริการตกลงที่จะรับผิดชอบต่อความเสียหายดังกล่าวที่เกิดขึ้นเต็มจำนวน</li>
			<li>สำหรับสมาชิกออนไลน์ที่มีอายุต่ำกว่า 18 ปี การทำธุรกรรมใดๆที่เกี่ยวข้องกับการเงินเช่น สั่งซื้อสินค้าออนไลน์ หรือเข้าร่วมทำการประมูลจะต้องได้รับความเห็นชอบ จากผู้ปกครองก่อนทุกครั้ง</li>
		</ol>
	</div>
@stop

<form method="POST" action="{{{ URL::to('users') }}}" accept-charset="UTF-8">
	<input type="hidden" name="_token" value="{{{ Session::getToken() }}}">
	<fieldset class="form-horizontal">
		@include('users.form')
		<div class="form-group">
			<label for="role" class="col-sm-2 control-label">Role</label>
			<div class="col-sm-3">
				{{ Form::select('role', array('User' => 'User', 'Admin' => 'Admin'), null, ['class' => 'form-control']) }}
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
				<button type="submit" class="btn btn-primary">{{{ Lang::get('confide::confide.signup.submit') }}}</button>
			</div>
		</div>

	</fieldset>
</form>
@stop