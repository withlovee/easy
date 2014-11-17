@extends('layouts.master', ['title' => 'Dashboard'])
@section('content')
	@include('layouts.error')
	<h1 class="line">
		@if($isShowAll)
		<span class="text-left">
				สินค้าทั้งหมด
		</span>
		@else
		<span class="text-left">
				สินค้าล่าสุด
		</span>
		<span class="right">
			<a href="?show=all" class="btn btn-default">ดูสินค้าทั้งหมด &rarr;</a>
		</span><!--text-right-->
		<div class="clear"></div>
		@endif
	</h1>
	@foreach($items as $item)
	<div class="row item">
		<div class="col-sm-3">
			<a href="detail.php">
				<img src="{{$item->picture}}" class="img-responsive">
			</a>
		</div>
		<!-- /.col-sm-3 -->
		<div class="col-sm-9">
			<h3><a href="item/1">{{$item->itemName}}</a></h3>
			<p>{{$item->property}}</p>
			<p>
				<span href="#" class="btn btn-default" role="button" disabled="disabled">{{$item->price}} บาท</span>
				@if($item->type=="auction")
					<span href="#" class="btn btn-warning" role="button" disabled="disabled"><i class="glyphicon glyphicon-time"></i> ประมูล</span>
				@endif
				<a href="item/1" class="btn btn-primary" role="button">ดูรายละเอียด</a>
			</p>
		</div>
		<!-- /.col-sm-9 -->
	</div>
	@endforeach
	@if($isShowAll == false)
	<nav>
		<ul class="pager">
			<li class="next"><a href="?show=all">ดูสินค้าทั้งหมด &rarr;</a></li>
		</ul>
	</nav>
	@endif
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