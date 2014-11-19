@extends('layouts.master', ['title' => 'Dashboard', 'class' => 'content-grey'])
@section('content')
	@include('layouts.error')
	<h1 class="line">
		<span class="text-left">
				{{$title}}
		</span>
		@if($title != "สินค้าทั้งหมด")
		<span class="right">
			<a href="?show=all" class="btn btn-default">ดูสินค้าทั้งหมด &rarr;</a>
		</span><!--text-right-->
		@endif
		<div class="clear"></div>
	</h1>
	@foreach($items as $item)
	<div class="row item">
		<div class="col-sm-3">
			<a href="item/{{$item->id}}">
				<img src="{{$item->picture}}" class="img-responsive">
			</a>
		</div>
		<!-- /.col-sm-3 -->
		<div class="col-sm-9">
			<h3><a href="item/{{$item->id}}">{{$item->name}}</a></h3>
			<p>{{$item->property}}</p>
			<p>
				<span href="#" class="btn btn-default" role="button" disabled="disabled">{{$item->price}} บาท</span>
				@if($item->type=="auction")
					<span href="#" class="btn btn-warning" role="button" disabled="disabled"><i class="glyphicon glyphicon-time"></i> ประมูล</span>
				@endif
				<a href="item/{{$item->id}}" class="btn btn-primary" role="button">ดูรายละเอียด</a>
			</p>
		</div>
		<!-- /.col-sm-9 -->
	</div>
	@endforeach
	@if($title != "สินค้าล่าสุด")
		<div class="text-center">{{ $items->links() }}</div>
	@endif
	@if($title != "สินค้าทั้งหมด")
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
	<h3>ซื้อสินค้าอื่นๆ</h3>
	<div class="list-group">
		<a href="?show=all" class="list-group-item"><span class="badge">{{$item_count['all']}}</span> สินค้าทั้งหมด</a>
		<a href="?show=auction" class="list-group-item"><span class="badge">{{$item_count['auction']}}</span> สินค้าประมูลเท่านั้น</a>
		<a href="?show=direct" class="list-group-item"><span class="badge">{{$item_count['direct']}}</span> สินค้าขายโดยตรงเท่านั้น</a>
	</div>
	<h3>โฆษณา</h3>
	<div class="ad">
		<img src="img/390x150.gif" class="img-responsive">
		<br>
		<img src="img/390x150.gif" class="img-responsive">
	</div>
	<!-- /.ad -->
@stop