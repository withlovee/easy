@extends('layouts.master', ['title' => 'AuctionItem'])
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
		<h2>
			{{$item->name}}
		</h2>
		<h3>สินค้าประมูล ราคาปัจจุบัน: {{$item->price}} บาท</h3>
		<p>{{$item->property}}</p>
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
					<input type="number" class="form-control" value="146">
					<span class="input-group-addon">บาท</span>
				</div><br>
				<a href="" class="btn btn-primary" style="margin-top:-3px;" data-toggle="modal" data-target="#myModal">ประมูล</a>
			</div>
			<div role="tabpanel" class="tab-pane" id="auc2">
				<br>
				<div class="row">
					<div class="col-sm-6">
						<label for="">จำนวนราคาประมูลสูงสุด</label>
						<div class="input-group" style="width: 200px; float: left;">
							<input type="number" class="form-control" value="146">
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
				<a href="" class="btn btn-primary" style="margin-top:-3px;" data-toggle="modal" data-target="#myModal">ประมูล</a>								
			</div>
		</div>
	</div>
	<!-- /.col-md-6 -->
</div>
<br>
<h2>เกี่ยวกับสินค้า</h2>
<table class="table table-striped table-bordered item-info">
	<tr>
		<th width="30%">ยี่ห้อ</th>
		<td>{{$item->brand}}</td>
	</tr>
	<tr>
		<th>รุ่น</th>
		<td>{{$item->model}}</td>
	</tr>
	<tr>
		<th>คุณสมบัติ</th>
		<td>{{$item->property}}</td>
	</tr>
</table>
<!-- /.table -->
<br><br>
<h2>การส่งคืนและการจัดส่ง</h2>
<table class="table table-striped table-bordered item-info">
	<tr>
		<th width="30%">นโยบายการรับสินค้าคืน</th>
		<td>{{$item->returnPolicy}}</td>
	</tr>
	<tr>
		<th>ค่าธรรมเนียมการส่งสินค้าคืน</th>
		<td>{{$item->returnFee}} บาท</td>
	</tr>
	<tr>
		<th>วิธีบรรจุหีบห่อ การขนส่ง และการยืนยันการจัดส่ง</th>
		<td>
			{{$item->shipping}}</td>
	</tr>
	<tr>
		<th>บริการพิเศษ และอื่นๆ</th>
		<td>{{$item->others}}</td>
	</tr>
	<tr>
		<th>รูปแบบภาษี</th>
		<td>{{$item->tax}}%</td>
	</tr>
</table>
<!-- /.table -->
<br><br>
<h2>คำถามเกี่ยวกับสินค้า</h2>
<p>คลิกที่ชื่อคำถามเพื่อดูคำตอบ</p>
<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
	@foreach ($questions as $question)
		
		<div class="panel panel-default">
			<div class="panel-heading" role="tab" id="headingOne">
				<h4 class="panel-title">
					<a data-toggle="collapse" data-parent="#accordion" href="#{{$question->id}}" aria-expanded="true" aria-controls="{{$question->id}}">
						<i class="glyphicon glyphicon-ok"></i> &nbsp; {{ $question->content }}
					</a>
				</h4>
			</div>
			<div id="{{$question->id}}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
				<div class="panel-body">
					{{ $question->answer }}
				</div>
			</div>
		</div>
		
	@endforeach

	<br><br>
	<h2>ถามคำถามเกี่ยวกับสินค้าชิ้นนี้</h2>

	<form class="form-horizontal" role="form" method="POST" action="{{{ URL::to('askQuestion') }}}">		
		{{Form::hidden('id',$item->id)}}
		<div class="form-group">
			<!--<textarea name="" id="" cols="30" rows="2" class="form-control" placeholder="คำถามที่ต้องการสอบถาม"></textarea>-->
			{{ Form::textarea('content', null, ['class' => 'form-control', 'cols' => 30, 'rows' => 2, 'placeholder' => 'กรุณากรอกคำถามที่ต้องการสอบถาม', 'required' => 'required']) }}
		</div>
		<div class="form-group">
			<!--<input type="text" class="btn btn-primary btn-sm" value="ส่งคำถาม">-->
			{{Form::submit("ส่งคำถาม",array("class"=>"btn btn-primary btn-sm"))}}
		</div>
	</form>
</div>
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