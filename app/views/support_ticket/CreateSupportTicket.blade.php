@extends('layouts.master', ['title' => 'จัดการข้อร้องเรียน'])
@section('content')
				<h1 class="line">ร้องเรียนปัญหา</h1>
				<form class="form-horizontal" role="form" method="POST" action="{{{ URL::to('supportticket') }}}">
					<input type="hidden" name="success" value="1">
					<?php if(isset($_GET['success'])): ?>
					<div class="alert alert-success" role="alert">
						<p>ข้อร้องเรียนถูกส่งไปเรียบร้อยแล้ว ให้รอติดต่อกลับจากผู้ดูแลระบบทางอีเมล์ภายใน 14 วันค่ะ</p>
					</div>
					<?php endif; ?>
					<div class="form-group">
						<label for="inputEmail3" class="col-sm-3 control-label">ผู้ร้องเรียน</label>
						<div class="col-sm-4">
							<input type="name" class="form-control" placeholder="ชื่อจริง" value="{{ Auth::user()->username }}" disabled>
						</div>
					</div><!--form-group-->
					<div class="form-group">
						<label for="inputEmail3" class="col-sm-3 control-label">ร้องเรียนผู้ใช้ชื่อ</label>
						<div class="col-sm-4">
							{{ Form::select('reporteeId', $list_users, null, ['class' => 'form-control', 'required' => 'required']) }}
						</div>
					</div><!--form-group-->
					<div class="form-group">
						<label for="inputEmail3" class="col-sm-3 control-label">หัวข้อ</label>
						<div class="col-sm-8">
							{{ Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'หัวข้อของปัญหาที่พบ', 'required' => 'required']) }}
						</div>
					</div><!--form-group-->
					<div class="form-group">
						<label for="inputEmail3" class="col-sm-3 control-label">รายละเอียดของปัญหา</label>
						<div class="col-sm-8">
							{{ Form::textarea('content', null, ['class' => 'form-control', 'cols' => 30, 'rows' => 5, 'placeholder' => 'กรุณาระบุปัญหาอย่างละเอียด', 'required' => 'required']) }}
						</div>
					</div><!--form-group-->
					<div class="form-group">
						<div class="col-sm-offset-3 col-sm-8">
							<button type="submit" class="btn btn-primary">ร้องเรียน</button>
						</div>
					</div>
				</form>
@stop
@section('sidebar')
				<a href="reports.php" type="button" class="create-btn btn btn-warning btn-lg btn-block">
					<span class="glyphicon glyphicon-arrow-left"></span>
					กลับ
				</a>
				<h3>คำเตือน</h3>
				<div class="box small-text">
					<p>หากท่านได้รับ e-mail ติดต่อเข้ามาแบบแปลกๆ จากชาวต่างชาติ โดยส่วนใหญ่อาจเป็นไนจีเรีย ยูเครน หรือมาเลเซีย ให้ท่านระวังไว้ว่าอาจจะเป็นแก๊งค์มิจฉาชีพ โดยสินค้าส่วนใหญ่ที่เป็นกลุ่มเป้าหมายของมิจฉาชีพจะเป็นสินค้าไอที เช่น กล้องถ่ายรูป notebook โทรศัพท์มือถือ หรืออาจจะเป็นรถยนต์</p>
				</div>
@stop