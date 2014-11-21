@extends('layouts.master', ['title' => 'DirectItem'])
@section('content')
<div class="row item-header">
	@include('layouts.error')
	<div class="col-md-5">
		{{ HTML::image('upload/'.$item->picture, $item->name, ['class' => 'img-responsive']) }}
	</div>
	<!-- /.col-md-6 -->
	<div class="col-md-7">
		{{Form::open(array('url' => 'buy/'.$item->id, 'method' => 'post', 'class' => 'form-horizontal'))}}
		<h2>
			@if($item->quantity==0)
				<span class="label label-danger">หมดแล้ว</span>
			@endif
			&nbsp;{{$item->name}}
		</h2>
		<h3>สินค้าขายโดยตรง ราคา: {{ number_format($item->price) }} บาท</h3>
		<h4>ประกาศขายโดย: {{ HTML::link('users/show/'.$item->seller->id, $item->seller->username) }}</h4>
		<p>{{$item->property}}</p>
		<p>
			<!--{{ Form::number('amount','1',['min'=>'1'])}}-->
			&nbsp;
			<!--<a href="" class="btn btn-primary" data-toggle="modal" data-target="#myModal">ซื้อสินค้า</a>-->
			@if(is_buyer())
			{{ Form::button('ซื้อสินค้า',['class'=>"btn btn-primary", "data-toggle"=>"modal", "data-target"=>"#myModal"])}}
			@endif
			@if(Auth::user()!=null && $item->sellerId==Auth::user()->id)
			{{ Form::button('ลบสินค้าชิ้นนี้',['class'=>"btn btn-danger", "data-toggle"=>"modal", "data-target"=>"#myModal$item->id"])}}
			@endif
		</p>
		{{Form::close()}}
	</div>
	<!-- /.col-md-6 -->
</div>
<!-- /.row -->
@include('item.itemDetail')
@stop
@section('sidebar')
@include('item.sidebar')
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		{{Form::open(array('url' => 'buyDirectItem/'.$item->id, 'method' => 'post', 'class' => 'form-horizontal', 'id'=>'buyDirectItemForm'))}}
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<h4 class="modal-title" id="myModalLabel">สั่งซื้อ{{$item->name}}</h4>
			</div>
			<div class="modal-body">
				<form class="form-horizontal" role="form">
					<div class="form-group">
						<label for="inputEmail3" class="col-sm-4 control-label">จำนวน</label> 
						<div class="col-sm-6">
							{{ Form::number('amount','1',['min'=>'1','max'=> $item->quantity ,'class'=> 'form-control', 'id'=>'amount'])}}
						</div>
						<label class="col-sm-1 control-label">ชิ้น</label>
					</div><!--form-group-->
					<div class="form-group">
						<label for="inputEmail3" class="col-sm-4 control-label">รูปแบบการจัดส่ง</label>
						<div class="col-sm-6">				
							{{Form::select('deliver', $deliver, 'แบบมาตรฐาน', ['class'=>"form-control",'id'=>'deliver'])}}
						</div>
					</div><!--form-group-->
					<div class="form-group">
						<label for="inputEmail3" class="col-sm-4 control-label">บริการพิเศษ</label>
						<div class="col-sm-8">
							<div class="checkbox">
								<label>
									{{Form::checkbox('option', $item->others)}} {{$item->others}}</strong>
								</label>
							</div>
							<!--{{Form::checkbox('option', $item->others)}}-->
						</div>
					</div><!--form-group-->
					<div class="form-group">
						<label for="inputEmail3" class="col-sm-4 control-label">ราคารวมภาษี ({{$item->tax}}%)</label>
						<div class="col-sm-8">
							<div class="checkbox">
								<strong><span id="total"></span> บาท</strong>
							</div>
							<!-- /.checkbox -->
						</div>
					</div><!--form-group-->
				</form>
			</div>
			<div class="modal-footer">
				
				<button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>
				
				{{ Form::submit('ซื้อสินค้า',['class'=>"btn btn-primary"])}}
			</form>
			{{ Form::hidden('price',$item->price,['class'=> 'form-control','value'=>$item->price,'disabled'=>'disabled','id'=>'price'])}}
			{{ Form::hidden('tax',$item->tax,['class'=> 'form-control','value'=>$item->tax,'disabled'=>'disabled','id'=>'tax'])}}
			{{ Form::close()}}
		</div>
	</div>
</div>
</div>

<div class="modal fade" id="myModal{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		{{Form::open(array('url' => 'deleteDirectItem/'.$item->id, 'method' => 'post', 'class' => 'form-horizontal'))}}
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

<script>
jQuery(function($) {


	// Initial
	calculateTotalPrice();

	// End Init


	$("#amount, #deliver").change(function(){
		calculateTotalPrice();
	});

	/*
	$("#amount, #deliver").change(function() {
	    var total = 0;
        var self = $(this),
             price = parseInt($("#price").val(),10),
             amount = parseInt($("#amount").val(),10);
             tax = (parseInt($("#tax").val(),10)+100.0)/100;
             obj = $("#deliver option:selected");
        deliver = obj.val();
        // shipping = json_decode(deliver,true);
        total = (price*amount)*tax;
        // total = deliver;
        $("#total").text(total.toFixed(2));
	});
	*/
	
	function calculateTotalPrice() {
		var price = parseInt($("#price").val(),10);
        var amount = parseInt($("#amount").val(),10);
        var tax = (parseInt($("#tax").val(),10)+100.0)/100;
      
        var total = (price*amount)*tax;
        
        $("#total").text(total.toFixed(2));
	}
});
</script>


@stop