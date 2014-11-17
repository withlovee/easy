@extends('layouts.master', ['title' => 'Dashboard'])
@section('content')
	@include('layouts.error')
	<h1 class="line">
		<span class="text-left">
			สินค้าล่าสุด
		</span>
		<span class="right">
			<a href="all.php" class="btn btn-default">ดูสินค้าทั้งหมด &rarr;</a>
		</span><!--text-right-->
		<div class="clear"></div>
	</h1>
	<div class="row item">
		<div class="col-sm-3">
			<a href="detail.php">
				<img src="img/powerbank.jpg" class="img-responsive">
			</a>
		</div>
		<!-- /.col-sm-3 -->
		<div class="col-sm-9">
			<h3><a href="item/1">ที่ชาร์ตแบตสำรองสีชมพูแบบพวงกุญแจ 2600mAh</a></h3>
			<p>เป็นอีกหนึ่งทางเลือกของที่ชาร์ตแบตสำรองขนาดกระทัดรัด สามารถซื้อเป็นของขวัญให้ใครก็ได้ ในราคาเบาๆ อีกทั้งยังสามารถเป็นพวงกุญแจได้ในตัว</p>
			<p>
				<span href="#" class="btn btn-default" role="button" disabled="disabled">1,250 บาท</span>
				<a href="item/1" class="btn btn-primary" role="button">ดูรายละเอียด</a>
			</p>
		</div>
		<!-- /.col-sm-9 -->
	</div>
	<div class="row item">
		<div class="col-sm-3">
			<a href="detail-auction.php">
				<img src="img/holder.jpg" class="img-responsive">
			</a>
		</div>
		<!-- /.col-sm-3 -->
		<div class="col-sm-9">
			<h3><a href="item/2">ที่วาง-ที่จับ มือถืออเนกประสงค์</a></h3>
			<p>เรียกกันอีกชื่อง่ายๆคือ one touch silicone stand เพียงแค่กดเบาๆก็สามารถ งอและวางบนนิ้วมือหรือตั้งเพื่อดูได้ บอกเลยว่าน่ารักสุดๆ ไม่มีนี่พลาดมากอะ !!!</p>
			<p>
				<span href="#" class="btn btn-warning" role="button" disabled="disabled"><i class="glyphicon glyphicon-time"></i> ประมูล</span>
				<span href="#" class="btn btn-default" role="button" disabled="disabled">145 บาท</span>
				<a href="item/2" class="btn btn-primary" role="button">ดูรายละเอียด</a>
			</p>
		</div>
		<!-- /.col-sm-9 -->
	</div>
	<nav>
		<ul class="pager">
			<li class="next"><a href="all.php">ดูสินค้าทั้งหมด &rarr;</a></li>
		</ul>
	</nav>
@stop
@section('sidebar')
	<h3>ค้นหาสินค้า</h3>
	<div class="search">
		<form action="search.php">
			<div class="input-group">
				<input type="text" class="form-control">
				<span class="input-group-btn">
					<button class="btn btn-primary" type="submit">ค้นหา</button>
				</span>
			</div><!-- /input-group -->						
		</form>
	</div>
	<!-- /.box -->
	<h3>ซื้อสินค้าอื่นๆ</h3>
	<div class="list-group">
		<a href="all.php" class="list-group-item"><span class="badge">2</span> สินค้าทั้งหมด</a>
		<a href="all-auction.php" class="list-group-item"><span class="badge">1</span> สินค้าประมูลเท่านั้น</a>
		<a href="all-direct.php" class="list-group-item"><span class="badge">1</span> สินค้าขายโดยตรงเท่านั้น</a>
	</div>
	<h3>โฆษณา</h3>
	<div class="ad">
		<img src="img/390x150.gif" class="img-responsive">
		<br>
		<img src="img/390x150.gif" class="img-responsive">
	</div>
	<!-- /.ad -->
@stop