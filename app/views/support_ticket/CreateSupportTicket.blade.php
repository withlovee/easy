@extends('layouts.master', ['title' => 'จัดการข้อร้องเรียน'])
@section('content')
				<h1 class="line">ร้องเรียนปัญหา</h1>
				<form class="form-horizontal" role="form" action="reports.php">
					<input type="hidden" name="success" value="1">
					<?php if(isset($_GET['success'])): ?>
					<div class="alert alert-success" role="alert">
						<p>ข้อร้องเรียนถูกส่งไปเรียบร้อยแล้ว ให้รอติดต่อกลับจากผู้ดูแลระบบทางอีเมล์ภายใน 14 วันค่ะ</p>
					</div>
					<?php endif; ?>
					<div class="form-group">
						<label for="inputEmail3" class="col-sm-3 control-label">ผู้ร้องเรียน</label>
						<div class="col-sm-4">
							<input type="name" class="form-control" placeholder="ชื่อจริง" value="nuttapon" disabled>
						</div>
					</div><!--form-group-->
					<div class="form-group">
						<label for="inputEmail3" class="col-sm-3 control-label">ร้องเรียนผู้ใช้ชื่อ</label>
						<div class="col-sm-4">
							<select name="" id="" class="form-control">
								<option value="">เลือกชื่อผู้ใช้</option>
								<option value="">lnwTuiZa</option>
								<option value="">nanasakol</option>
								<option value="">abcabcsdf</option>
								<option value="">plkumjorn</option>
								<option value="">stevejobs</option>
								<option value="">veevee</option>
								<option value="">cppanida</option>
								<option value="">nutbot5555</option>
								<option value="">seller101</option>
							</select>
						</div>
					</div><!--form-group-->
					<div class="form-group">
						<label for="inputEmail3" class="col-sm-3 control-label">หัวข้อ</label>
						<div class="col-sm-8">
							<input type="name" class="form-control" placeholder="หัวข้อของปัญหาที่พบ" required>
						</div>
					</div><!--form-group-->
					<div class="form-group">
						<label for="inputEmail3" class="col-sm-3 control-label">รายละเอียดของปัญหา</label>
						<div class="col-sm-8">
							<textarea name="" id="" cols="30" rows="5" class="form-control" placeholder="กรุณาระบุปัญหาอย่างละเอียด" required></textarea>
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