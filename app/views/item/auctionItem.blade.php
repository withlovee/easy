@extends('layouts.master', ['title' => 'AuctionItem'])
@section('content')
<div class="row item-header">
	@include('layouts.error')
	<div class="col-md-5">
		{{ HTML::image('upload/'.$item->picture, $item->name, ['class' => 'img-responsive']) }}
	</div>
	<!-- /.col-md-6 -->
	<div class="col-md-7">
		<h2>
			@if($item->quantity==0)
				<span class="label label-danger">หมดแล้ว</span>
			@endif
			{{$item->name}}
		</h2>
		<h3>สินค้าประมูล ราคาปัจจุบัน: {{ number_format($item->price) }} บาท</h3>
		<h4>ประกาศขายโดย: {{ HTML::link('users/show/'.$item->seller->id, $item->seller->username) }}</h4>
		<p>{{$item->property}}</p>

		@if(is_buyer())
		<!-- Nav tabs -->
		<ul class="nav nav-tabs" role="tablist">
			<li role="presentation" class="active"><a href="#auc1" role="tab" data-toggle="tab">ประมูลแบบกดเอง</a></li>
			<li role="presentation"><a href="#auc2" role="tab" data-toggle="tab">ประมูลอัตโนมัติ</a></li>
		</ul>

		<!-- Tab panes -->
		<div class="tab-content">
			<div role="tabpanel" class="tab-pane active" id="auc1">
				<br>
				<label for="">จำนวนราคาประมูลสูงสุด</label>
				<div class="input-group" style="width: 200px;">
					<input id="auc1Price" type="number" class="form-control" value="146">
					<span class="input-group-addon">บาท</span>
				</div><br>
				<a href="" id="auc1Button" class="btn btn-primary" style="margin-top:-3px;" data-toggle="modal" data-target="#myModal">ประมูล</a>
			</div>
			<div role="tabpanel" class="tab-pane" id="auc2">
				<br>
				<div class="row">
					<div class="col-sm-6">
						<label for="">จำนวนราคาประมูลสูงสุด</label>
						<div class="input-group" style="width: 200px; float: left;">
							<input id="auc2Price" type="number" class="form-control" value="146">
							<span class="input-group-addon">บาท</span>
						</div>
					</div>
					<!-- /.col-sm-6 -->
					<div class="col-sm-6">
						<label for="">จำนวนเงินที่เพิ่มในแต่ละครั้ง</label><br>
						<div class="input-group" style="width: 200px; float: left;">
							<input type="number" class="form-control" value="1">
							<span class="input-group-addon">บาท</span>
						</div>
					</div>
					<!-- /.col-sm-6 -->
				</div>
				<!-- /.row -->
				<br>
				<a href="" id="auc2Button" class="btn btn-primary" style="margin-top:-3px;" data-toggle="modal" data-target="#myModal">ประมูล</a>								
			</div>
		</div>
		@endif
		@if($item->sellerId==Auth::user()->id)
			{{ Form::button('ลบสินค้าชิ้นนี้',['class'=>"btn btn-danger", "data-toggle"=>"modal", "data-target"=>"#myModal$item->id"])}}
		@endif	
	</div>
	<!-- /.col-md-6 -->
</div>
@include('item.itemDetail')
@stop
@section('sidebar')
@include('item.sidebar')
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			{{Form::open(array('url' => 'buyAuctionItem/'.$item->id, 'method' => 'post', 'class' => 'form-horizontal'))}}

			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<h4 class="modal-title" id="myModalLabel">สั่งซื้อ{{$item->name}}</h4>
			</div>

			<div class="modal-body">
				{{ Form::hidden('amount','1',['min'=>'1','class'=> 'form-control', 'id'=>'amount'])}}
				<div class="form-horizontal">
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
				</div>
				{{ Form::hidden('tax',$item->tax,['id'=>'tax'])}}
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>
				<button type="submit" class="btn btn-primary">ยืนยันการสั่งซื้อ</button>
			</div>
			{{ Form::close()}}
		</div>
	</div>
</div>

<div class="modal fade" id="myModal{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		{{Form::open(array('url' => 'deleteAuctionItem/'.$item->id, 'method' => 'post', 'class' => 'form-horizontal'))}}
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
			</div>
		</div>
		{{ Form::close()}}
	</div>
</div>	

<script>
jQuery(function($) {

	var price = parseInt($("#auc1Price").val(),10);

	// End Init

	$("#auc2Button").click(function(){
		price = parseInt($("#auc2Price").val(),10);
		calculateTotalPrice();
	});

	$("#deliver").change(function(){
		calculateTotalPrice();
	});

 	function numberWithCommas(x) {
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
	}

	function calculateTotalPrice() {
        var tax = (parseInt($("#tax").val(),10)+100.0)/100;
      	var deliver = $("#deliver option:selected").html();
      	var shipping = parseInt(deliver.match(/\d+/)[0],10);
        var total = (price)*tax+shipping;
        total = total.toFixed(2);
        total = numberWithCommas(total);
        console.log(price +' '+shipping+' '+tax);
        $("#total").text(total);
	}
});
</script>
@stop