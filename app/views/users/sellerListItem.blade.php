@extends('layouts.master', ['title' => 'ListAllItemSeller'])
@section('content')
@include('layouts.error')
	<h1 class="line">
		<span class="text-left">
				{{$title}}
		</span>
		@if($title != "สินค้าทั้งหมดของฉัน")
		<span class="right">
			<a href="?show=all" class="btn btn-default">ดูสินค้าทั้งหมดของฉัน &rarr;</a>
		</span><!--text-right-->
		@endif
		<div class="clear"></div>
	</h1>
@if($items==[])
	<h3>ไม่พบผลลัพธ์ที่ท่านต้องการค้นหา</h3>
@else
@foreach($items as $item)
<div class="row item">
	<div class="col-sm-3">
		<a href="detail.php">
			<img src="{{$item->picture}}" class="img-responsive">
		</a>
	</div>
	<!-- /.col-sm-3 -->
	<div class="col-sm-9">
		<h3><a href="detail.php">{{$item->name}}</a></h3>
		<p>{{$item->property}}</p>
		<p>
			<span href="#" class="btn btn-default" role="button" disabled="disabled">{{$item->price}} บาท</span>
			<a href="detail.php" class="btn btn-primary" role="button">ดูรายละเอียด</a>
		</p>
	</div>
	<!-- /.col-sm-9 -->
</div>
@endforeach
@endif

@stop
@section('sidebar')
<h3>ค้นหาสินค้าของฉัน</h3>
<div class="search">
	<!-- <form action="search.php"> -->
	<form role="form" method="GET">	
		<div class="input-group">
			<input name="search" type="text" class="form-control">
			<span class="input-group-btn">
				<button class="btn btn-primary" type="submit">ค้นหา</button>
			</span>
		</div><!-- /input-group -->						
	</form>
</div>
<!-- /.box -->
<h3>สินค้าของฉัน</h3>
<div class="list-group">
	<a href="listItemSeller?show=all" class="list-group-item"><span class="badge">{{$item_count['all']}}</span> สินค้าทั้งหมดของฉัน</a>
	<a href="listItemSeller?show=auction" class="list-group-item"><span class="badge">{{$item_count['auction']}}</span> สินค้าประมูลของฉัน</a>
	<a href="listItemSeller?show=direct" class="list-group-item"><span class="badge">{{$item_count['direct']}}</span> สินค้าขายโดยตรงของฉัน</a>
</div>
<h3>โฆษณา</h3>
<div class="ad">
	<img src="img/390x150.gif" class="img-responsive">
	<br>
	<img src="img/390x150.gif" class="img-responsive">
</div>
<!-- /.ad -->

@stop