@extends('layouts.master', ['title' => $item->name])
@section('content')
<div class="row item-header">
	@include('layouts.error')
	<div class="col-md-5">
		{{ HTML::image('upload/'.$item->picture, $item->name, [
			'class' => 'img-responsive wow fadeInDown',
			'data-wow-delay' => '1s'
		]) }}
	</div>
	<!-- /.col-md-6 -->
	<div class="col-md-7 item-detail">
		<div class="inner wow fadeInRight" data-wow-delay="1s">
			<h4>ประกาศขายโดย: {{ HTML::link('users/show/'.$item->seller->id, $item->seller->username) }}</h4>
			<h2>
				@if($item->quantity==0)
					<span class="label label-danger">หมดแล้ว</span>
				@endif
				{{$item->name}}
			</h2>
			<h3>สินค้าประมูล ราคาปัจจุบัน: {{ number_format($item->price) }} บาท</h3>
			@if($bidder != null)
				<h4>ผู้ชนะการประมูลปัจจุบัน: {{ HTML::link('users/show/'.$bidder->id, $bidder->username) }}</h4>
			@endif
			<div class="line"></div>
			<p>{{$item->property}}</p>

			@if(is_buyer() && $item->quantity >0)
				<a href="" id="manualButton" class="btn btn-primary" style="margin-top:-3px;" data-toggle="modal" data-target="#myModalManual">ประมูลด้วยตนเอง</a>
				<a href="" id="autoButton" class="btn btn-primary" style="margin-top:-3px;" data-toggle="modal" data-target="#myModalAuto">ประมูลด้วยระบบอัตโนมัติ</a>
				
			@endif
			@if($item->sellerId==Auth::user()->id)
				{{ Form::button('ลบสินค้าชิ้นนี้',['class'=>"btn btn-danger", "data-toggle"=>"modal", "data-target"=>"#myModal$item->id"])}}
			@endif	
		</div>
	</div>
	<!-- /.col-md-6 -->
</div>
@include('item.itemDetail')
<div class="modal fade" id="myModalManual" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		{{Form::open(array('url' => 'buyAuctionItem/manual/'.$item->id, 'method' => 'post', 'class' => 'form-horizontal'))}}
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<h4 class="modal-title" id="myModalLabel">สั่งซื้อ{{$item->name}}</h4>
			</div>

			<div class="modal-body">
				{{ Form::hidden('amount','1',['min'=>'1','class'=> 'form-control', 'id'=>'amount'])}}
				<div class="form-horizontal">
					
					<div class="form-group">
						<label for="" class="col-sm-4 control-label">ราคาที่จะประมูลสูงสุด</label>
						<div class="col-sm-6">
							{{ Form::number('maxBid', $item->price+1, ['min'=>$item->price+1, 'class' => 'form-control', 'id' => 'maxBidManual', 'required' => 'required'])}}
							<!-- <input type="number" class="form-control" value="146"> -->
						</div>
						<label class="col-sm-1 control-label">บาท</label>
					</div><!--form-group-->
					<div class="form-group">
						<label for="inputEmail3" class="col-sm-4 control-label">รูปแบบการจัดส่ง</label>
						<div class="col-sm-6">
							{{Form::select('deliver', $deliver, 'แบบมาตรฐาน', ['class'=>"form-control",'id'=>'deliverManual'])}}
						</div>
					</div><!--form-group-->
					<div class="form-group">
						<label for="inputEmail3" class="col-sm-4 control-label">บริการพิเศษ</label>
						<div class="col-sm-8">
							<div class="checkbox">
								<label>
									{{Form::checkbox('service', 1)}} {{$item->service}}</strong>
								</label>
							</div>
						</div>
					</div><!--form-group-->
					<div class="form-group">
						<label for="inputEmail3" class="col-sm-4 control-label">ราคารวมภาษี ({{$item->tax}}%)</label>
						<div class="col-sm-8">
							<div class="checkbox">
								<strong><span id="totalManual"></span> บาท</strong>
							</div>
							<!-- /.checkbox -->
						</div>
					</div><!--form-group-->
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>
				<button type="submit" class="btn btn-primary">ยืนยันการประมูล</button>
			</div>
		</div>
		{{ Form::close()}}
	</div>
</div>


<div class="modal fade" id="myModalAuto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		{{Form::open(array('url' => 'buyAuctionItem/auto/'.$item->id, 'method' => 'post', 'class' => 'form-horizontal'))}}
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<h4 class="modal-title" id="myModalLabel">สั่งซื้อ{{$item->name}}</h4>
			</div>
			<div class="modal-body">
				<div class="form-horizontal">
					<div class="form-group">
						<label for="" class="col-sm-4 control-label">ราคาที่จะประมูลสูงสุด</label>
						<div class="col-sm-6">
							{{ Form::number('maxBid',$item->price+1,['min' => $item->price+1, 'class' => 'form-control', 'id' => 'maxBidAuto', 'required' => 'required'])}}
							<!-- <input type="number" class="form-control" value="146"> -->
						</div>
						<label class="col-sm-1 control-label">บาท</label>
					</div><!--form-group-->
					<div class="form-group">
						<label for="" class="col-sm-4 control-label">จำนวนเงินที่เพิ่มในแต่ละครั้ง</label>
						<div class="col-sm-6">
							{{ Form::number('increment', 1, ['min'=>'1', 'class'=> 'form-control', 'required' => 'required'])}}
							<!-- <input type="number" class="form-control" value="146"> -->
						</div>
						<label class="col-sm-1 control-label">บาท</label>
					</div><!--form-group-->
					<div class="form-group">
						<label for="inputEmail3" class="col-sm-4 control-label">รูปแบบการจัดส่ง</label>
						<div class="col-sm-6">
							{{Form::select('deliver', $deliver, 'แบบมาตรฐาน', ['class'=>"form-control", 'id' => 'deliverAuto'])}}
						</div>
					</div><!--form-group-->
					<div class="form-group">
						<label for="inputEmail3" class="col-sm-4 control-label">บริการพิเศษ</label>
						<div class="col-sm-8">
							<div class="checkbox">
								<label>
									{{Form::checkbox('service', 1)}} {{$item->service}}</strong>
								</label>
							</div>
						</div>
					</div><!--form-group-->
					<div class="form-group">
						<label for="inputEmail3" class="col-sm-4 control-label">ราคารวมภาษี ({{$item->tax}}%)</label>
						<div class="col-sm-8">
							<div class="checkbox">
								<strong><span id="totalAuto"></span> บาท</strong>
							</div>
							<!-- /.checkbox -->
						</div>
					</div><!--form-group-->
				</div>
				{{ Form::hidden('tax',$item->tax,['id'=>'tax'])}}
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>
				<button type="submit" class="btn btn-primary">ยืนยันการประมูล</button>
			</div>
		</div>
		{{ Form::close()}}
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

	$("#manualButton").click(function(){
		price = parseInt($("#maxBidManual").val(),10);
		calculateTotalPrice("Manual");
	});
	$("#autoButton").click(function(){
		price = parseInt($("#maxBidAuto").val(),10);
		calculateTotalPrice("Auto");
	});

	$("#maxBidManual, #deliverManual").change(function(){
		price = parseInt($("#maxBidManual").val(),10);
		calculateTotalPrice("Manual");
	});
	$("#maxBidAuto, #deliverAuto").change(function(){
		price = parseInt($("#maxBidAuto").val(),10);
		calculateTotalPrice("Auto");
	});

 	function numberWithCommas(x) {
    	return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
	}

	function calculateTotalPrice(Mode) {
        var tax = (parseInt($("#tax").val(),10)+100.0)/100;
      	var deliver = $("#deliver" + Mode + " option:selected").html();
      	var shipping = parseInt(deliver.match(/\d+/)[0],10);
      	// alert(price);
        var total = (price)*tax+shipping;
        total = total.toFixed(2);
        total = numberWithCommas(total);
        console.log(price +' '+shipping+' '+tax);
        $("#total" + Mode).text(total);
	}
});
</script>
@stop
@section('sidebar')
	@include('item.sidebar')
@stop