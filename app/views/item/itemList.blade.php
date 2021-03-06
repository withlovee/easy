@extends('layouts.master', ['title' => $title, 'class' => 'content-grey'])
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
	@if($items==[])
		<h3>ไม่พบผลลัพธ์ที่ท่านต้องการค้นหา</h3>
	@else
	@foreach($items as $item)
	<div class="row item">
		<div class="col-sm-3 thumb">
			<a href="item/{{$item->id}}">
				{{ HTML::image('upload/'.$item->picture, $item->name, ['class' => 'img-responsive']) }}
			</a>
		</div>
		<!-- /.col-sm-3 -->
		<div class="col-sm-9">
			<h3><a href="item/{{$item->id}}">{{$item->name}}</a></h3>
			<p>{{$item->property}}</p>
			<p>
				@if($item->quantity==0)
					<span href="#" class="btn btn-danger" role="button" disabled="disabled"> หมดแล้ว</span>
				@endif
				<span href="#" class="btn btn-default" role="button" disabled="disabled">{{ number_format($item->price,2) }} บาท</span>
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
		<div class="text-center">{{ $items->appends($params)->links() }}</div>
		@endif
		@if($title != "สินค้าทั้งหมด")
		<nav>
			<ul class="pager">
				<li class="next"><a href="?show=all">ดูสินค้าทั้งหมด &rarr;</a></li>
			</ul>
		</nav>
		@endif
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
	<h3>ดูสินค้าอื่นๆ</h3>
	<div class="list-group">
		<a href="?show=all" class="list-group-item"><span class="badge">{{$item_count['all']}}</span> สินค้าทั้งหมด</a>
		<a href="?show=auction" class="list-group-item"><span class="badge">{{$item_count['auction']}}</span> สินค้าประมูลเท่านั้น</a>
		<a href="?show=direct" class="list-group-item"><span class="badge">{{$item_count['direct']}}</span> สินค้าขายโดยตรงเท่านั้น</a>
	</div>
	@include('sidebars.ads')
@stop