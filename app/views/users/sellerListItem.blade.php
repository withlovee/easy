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
	@if($title == "ผลลัพธ์การค้นหาสินค้าของฉัน")
		<h3>ไม่พบผลลัพธ์ที่ท่านต้องการค้นหา</h3>
	@elseif($title == "สินค้าทั้งหมดของฉัน")
		<h3>ท่านยังไม่มีประกาศขายสินค้าในขณะนี้</h3>
	@elseif($title == "สินค้าขายโดยตรงของฉัน")
		<h3>ท่านยังไม่มีสินค้าขายโดยตรงในขณะนี้</h3>
	@elseif($title == "สินค้าประมูลของฉัน")
		<h3>ท่านยังไม่มีสินค้าประมูลในขณะนี้</h3>
	@endif
@else
@foreach($items as $item)
<div class="row item">
	<div class="col-sm-3">
		<a href="{{URL::to('item/'.$item->id)}}">
			{{ HTML::image('upload/'.$item->picture, $item->name, ['class' => 'img-responsive']) }}
		</a>
	</div>
	<!-- /.col-sm-3 -->
	<div class="col-sm-9">
		<h3>
			@if($item->quantity==0)
				<span class="label label-danger">หมดแล้ว</span>
			@endif
			<a href="{{URL::to('item/'.$item->id)}}">{{$item->name}}</a> 
		</h3>
		<p>{{$item->property}}</p>
		<p>
			<span href="#" class="btn btn-default" role="button" disabled="disabled">{{ number_format($item->price) }} บาท</span>
			<a href="{{URL::to('item/'.$item->id)}}" class="btn btn-primary" role="button">ดูรายละเอียด</a>
			{{ Form::button('ลบสินค้าชิ้นนี้',['class'=>"btn btn-danger", "data-toggle"=>"modal", "data-target"=>"#myModal$item->id"])}}
		</p>
	</div>
	<!-- /.col-sm-9 -->
	<div class="modal fade" id="myModal{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			@if($item->type=='direct')
				{{Form::open(array('url' => 'deleteDirectItem/'.$item->id, 'method' => 'post', 'class' => 'form-horizontal'))}}
			@else
				{{Form::open(array('url' => 'deleteAuctionItem/'.$item->id, 'method' => 'post', 'class' => 'form-horizontal'))}}
			@endif
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
					<h4 class="modal-title" id="myModalLabel">ท่านแน่ใจหรือไม่ที่จะลบสินค้า {{$item->name}}</h4>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-sm-6">
							{{ HTML::image('upload/'.$item->picture, $item->name, ['class' => 'img-responsive']) }}
						</div>
						<div class="col-sm-6">
							<h3>{{$item->name}}</h3>
							<br>
							<h4>ราคา: {{number_format($item->price)}} บาท</h4>
						</div>
					</div>
				</div>
				<div class="modal-footer">					
					<button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>
					{{ Form::submit('ยืนยันการลบสินค้า',['class'=>"btn btn-danger"])}}
					</form>
					{{ Form::close()}}
				</div>
			</div>
		</div>
	</div>
</div>
@endforeach
<div class="text-center">{{ $items->links() }}</div>
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