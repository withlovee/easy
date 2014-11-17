@extends('layouts.master', ['title' => 'DirectItem'])
@section('content')
<div class="row item-header">
	@include('layouts.error')
	<div class="col-md-5">
		<a href="detail.php">
			<img src="{{$item->picture}}" class="img-responsive">
		</a>						
	</div>
	<!-- /.col-md-6 -->
	<div class="col-md-7">
		{{Form::open(array('method' => 'post'))}}
		<h2>
			{{$item->name}}
		</h2>
		<h3>สินค้าขายโดยตรง ราคา: {{$item->price}} บาท</h3>
		<p>{{$item->property}}</p>
		<p>
			<!--{{ Form::number('amount','1',['min'=>'1'])}}-->
			&nbsp;
			<!--<a href="" class="btn btn-primary" data-toggle="modal" data-target="#myModal">ซื้อสินค้า</a>-->
			@if(is_buyer())
			{{ Form::button('ซื้อสินค้า',['class'=>"btn btn-primary", "data-toggle"=>"modal", "data-target"=>"#myModal"])}}
			@endif
			{{ Form::close()}}
		</p>
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
		{{Form::open(array('action'=>'ItemController@buyDirectItem', 'class' => 'form-horizontal'))}}
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
							{{ Form::number('amount','1',['min'=>'1','class'=> 'form-control'])}}
						</div>
						<label class="col-sm-1 control-label">ชิ้น</label>
					</div><!--form-group-->
					<div class="form-group">
						<label for="inputEmail3" class="col-sm-4 control-label">รูปแบบการจัดส่ง</label>
						<div class="col-sm-6">
							<!--<select name="" id="" class="form-control">
								<option value="">แบบประหยัด: 30 บาท</option>
								<option value="" selected>แบบมาตรฐาน: 50 บาท</option>
								<option value="">แบบด่วน: 100 บาท</option>
							</select>-->
							{{Form::select('deliver', array('A' => 'แบบประหยัด: 30 บาท', 'B' => 'แบบมาตรฐาน: 50 บาท', 'C' => 'แบบด่วน: 100 บาท'), 'B', ['class'=>"form-control"])}}
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
								<strong>{{($item->price*(100+$item->tax))/100.0}} บาท</strong>
							</div>
							<!-- /.checkbox -->
						</div>
					</div><!--form-group-->
				</form>
			</div>
			<div class="modal-footer">
				<form action="payment.php">
				<button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>
				<button type="submit" class="btn btn-primary">ยืนยันการสั่งซื้อ</button>
				</form>
			</div>
		</div>
	</div>
</div>

@stop