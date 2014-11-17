@extends('layouts.master', ['title' => 'Dashboard'])
@section('content')
	<div class="row item-header">
		<div class="col-sm-2">
			<a href="detail.php">
				<img src="img/powerbank.jpg" class="img-responsive">
			</a>						
		</div>
		<!-- /.col-sm-6 -->
		<div class="col-sm-10">
			<h2>
				ที่ชาร์ตแบตสำรองสีชมพูแบบพวงกุญแจ 2600mAh
			</h2>
			<br>
			<dl class="dl-horizontal">
				<dt>ประเภทสินค้า</dt>
				<dd>สินค้าขายโดยตรง</dd>
				<dt>ซื้อเมื่อวันที่</dt>
				<dd>1/11/2014</dd>
				<dt>ผู้ขาย</dt>
				<dd><a href="">veevee</a> (<a href="report.php">ร้องเรียน</a>)</dd>
				<dt>จำนวน</dt>
				<dd>1 ชิ้น</dd>
				<dt>ราคาสินค้า</dt>
				<dd>1,250 บาท</dd>
				<dt>รูปแบบการจัดส่ง</dt>
				<dd>แบบธรรมดา (50 บาท)</dd>
				<dt>ราคารวม</dt>
				<dd>1,323 บาท</dd>
				<dt>สถานะ</dt>
				<dd><span href="#" class="btn btn-warning" role="button" disabled="disabled"><i class="glyphicon glyphicon-time"></i> รอจัดส่ง</span></dd>
			</dl>
			<nav>
				<ul class="pager">
					<li class="prev"><a href="transactions.php">ย้อนกลับ</a></li>
				</ul>
			</nav>
		</div>
		<!-- /.col-sm-6 -->
	</div>
	<!-- /.row -->
@stop
@section('sidebar')
	@include('sidebars.personal')
@stop
