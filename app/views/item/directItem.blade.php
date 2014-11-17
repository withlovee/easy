@extends('layouts.master', ['title' => 'DirectItem'])
@section('content')
<div class="row item-header">
	<div class="col-md-5">
		<a href="detail.php">
			<img src="{{$item->picture}}" class="img-responsive">
		</a>						
	</div>
	<!-- /.col-md-6 -->
	<div class="col-md-7">
		{{Form::open(array('method' => 'post'))}}
		<h2>
			{{$item->itemName}}
		</h2>
		<h3>สินค้าขายโดยตรง ราคา: {{$item->price}} บาท</h3>
		<p>{{$item->property}}</p>
		<p>
			<!--{{ Form::number('amount','1',['min'=>'1'])}}-->
			&nbsp;
			<!--<a href="" class="btn btn-primary" data-toggle="modal" data-target="#myModal">ซื้อสินค้า</a>-->
			{{ Form::button('ซื้อสินค้า',['class'=>"btn btn-primary", "data-toggle"=>"modal", "data-target"=>"#myModal"])}}
			{{ Form::close()}}
		</p>
	</div>
	<!-- /.col-md-6 -->
</div>
<!-- /.row -->
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
	<div class="panel panel-default">
		<div class="panel-heading" role="tab" id="headingOne">
			<h4 class="panel-title">
				<a data-toggle="collapse" data-parent="#accordion" href="#q3" aria-expanded="true" aria-controls="q3">
					<i class="glyphicon glyphicon-ok"></i> &nbsp; สินค้ามีแบบอื่นอีกไหม
				</a>
			</h4>
		</div>
		<div id="q3" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
			<div class="panel-body">
				ไม่มีแล้วครับ
			</div>
		</div>
	</div>
	<div class="panel panel-default">
		<div class="panel-heading" role="tab" id="headingOne">
			<h4 class="panel-title">
				<a data-toggle="collapse" data-parent="#accordion" href="#q1" aria-expanded="true" aria-controls="q1">
					<i class="glyphicon glyphicon-ok"></i> &nbsp; จัดส่งแบบไหนดีที่สุด
				</a>
			</h4>
		</div>
		<div id="q1" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
			<div class="panel-body">
				แบบด่วนจะมีความปลอดภัยและถึงผู้รับเร็วที่สุดครับ ทางผู้ขายจะส่ง Tracking Number ไปให้ท่านเมื่อจัดส่งเรียบร้อยแล้ว ท่านจะได้ของภายใน 24 ชั่วโมงครับ
			</div>
		</div>
	</div>
	<div class="panel panel-default">
		<div class="panel-heading" role="tab" id="headingOne">
			<h4 class="panel-title">
				<a data-toggle="collapse" data-parent="#accordion" href="#q2" aria-expanded="true" aria-controls="q2">
					<i class="glyphicon glyphicon-time"></i> &nbsp; มีสี่ม่วงอมชมพูไหม
				</a>
			</h4>
		</div>
		<div id="q2" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
			<div class="panel-body">
				ยังไม่มีคำตอบ
			</div>
		</div>
	</div>
	<br><br>
	<h2>ถามคำถามเกี่ยวกับสินค้าชิ้นนี้</h2>
	<form role="form">
		<div class="form-group">
			<textarea name="" id="" cols="30" rows="2" class="form-control" placeholder="คำถามที่ต้องการสอบถาม"></textarea>
		</div>
		<div class="form-group">
			<input type="text" class="btn btn-primary btn-sm" value="ส่งคำถาม">
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
		{{Form::open(array('action'=>'ItemController@buyDirectItem'))}}
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<h4 class="modal-title" id="myModalLabel">สั่งซื้อ{{$item->itemName}}</h4>
			</div>
			<div class="modal-body">
				<form class="form-horizontal" role="form">
					<div class="form-group">
						<row><label for="inputEmail3" class="col-sm-4 control-label">จำนวน</label> <label > {{ Form::number('amount','1',['min'=>'1','style'=>"margin-left:13px;margin-right:5px;"])}} </label><label>ชิ้น</label> </row>
						<div class="col-sm-8">
							<img src="img/num.PNG" alt="">
						</div>
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
							<!--<div class="checkbox">
								<label>
									<input type="checkbox"> {{$item->others}}</strong>
								</label>
							</div>-->
							{{Form::checkbox('option', '{{{$item->others}}}')}}
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