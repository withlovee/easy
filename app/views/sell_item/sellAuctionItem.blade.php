@extends('layouts.master', ['title' => 'ขายสินค้าประมูล'])
@section('content')
		<h1 class="line">ขายสินค้าประมูล</h1>
		@include('layouts.error')
		<form class="form-horizontal" role="form" method="POST" action="{{{ URL::to('createAuctionItem') }}}" enctype="multipart/form-data">
			<div class="form-group">
				<label for="inputEmail3" class="col-sm-3 control-label">ชื่อสินค้า<span class="required">*</span></label>
				<div class="col-sm-8">
					{{Form::text('name','',array("class"=>"form-control","placeholder"=>"", 'required' => 'required'))}}
				</div>
			</div><!--form-group-->
			<div class="form-group">
				<label for="inputEmail3" class="col-sm-3 control-label">รูปประกอบ<span class="required">*</span></label>
				<div class="col-sm-8">
					{{Form::file('picture',array('required' => 'required'))}}
				</div>
			</div><!--form-group-->
			<div class="form-group">
				<label for="inputEmail3" class="col-sm-3 control-label">จำนวนสินค้า<span class="required">*</span></label>
				<div class="col-sm-3">
					<div class="input-group">
						{{ Form::number('quantity','1',['class'=> 'form-control', 'disabled'=>'disabled','required' => 'required'])}}
						<span class="input-group-addon">ชิ้น</span>
					</div>
				</div>
				<label for="inputEmail3" class="col-sm-2 control-label">ราคาเริ่มต้น<span class="required">*</span></label>
				<div class="col-sm-3">
					<div class="input-group">
						{{ Form::number('price','1',['min'=>'1','class'=> 'form-control', 'required' => 'required'])}}
						<span class="input-group-addon">บาท</span>
					</div>
				</div>
			</div><!--form-group-->
			<div class="form-group">
				<label for="inputEmail3" class="col-sm-3 control-label">ยี่ห้อ</label>
				<div class="col-sm-3">
					{{Form::text('brand','',array("class"=>"form-control"))}}
				</div>
				<label for="inputEmail3" class="col-sm-2 control-label">รุ่น</label>
				<div class="col-sm-3">
					{{Form::text('model','',array("class"=>"form-control"))}}
				</div>
			</div><!--form-group-->
			<div class="form-group">
				<label for="inputEmail3" class="col-sm-3 control-label">ความจุ</label>
				<div class="col-sm-3">
					{{Form::text('volumn','',array("class"=>"form-control"))}}
				</div>
				<label for="inputEmail3" class="col-sm-2 control-label">ขนาด</label>
				<div class="col-sm-3">
					{{Form::text('size','',array("class"=>"form-control"))}}
				</div>
			</div><!--form-group-->
			<div class="form-group">
				<label for="inputEmail3" class="col-sm-3 control-label">สภาพสินค้า</label>
				<div class="col-sm-3">
					{{Form::text('quality','',array("class"=>"form-control"))}}
				</div>
				<label for="inputEmail3" class="col-sm-2 control-label">จุดบกพร่อง</label>
				<div class="col-sm-3">
					{{Form::text('defect','',array("class"=>"form-control"))}}
				</div>
			</div><!--form-group-->
			<div class="form-group">
				<label for="inputEmail3" class="col-sm-3 control-label">คุณสมบัติ<span class="required">*</span></label>
				<div class="col-sm-8">
					{{ Form::textarea('property', null, ['class' => 'form-control', 'cols' => 30, 'rows' => 4, 'required' => 'required']) }}
				</div>
			</div><!--form-group-->
			<div class="form-group">
				<label for="inputEmail3" class="col-sm-3 control-label">นโยบายการรับสินค้าคืน</label>
				<div class="col-sm-8">
					{{ Form::textarea('returnPolicy', null, ['class' => 'form-control', 'cols' => 30, 'rows' => 4]) }}
				</div>
			</div><!--form-group-->
			<div class="form-group">
				<label for="inputEmail3" class="col-sm-3 control-label">วิธีบรรจุหีบห่อ การขนส่ง และการยืนยันการจัดส่ง</label>
				<div class="col-sm-8">
					<div class="row">
						<label for="inputEmail3" class="col-sm-3 control-label">แบบด่วน</label>
						<div class="col-sm-4">
							<div class="input-group">
								{{ Form::number('quick','0',['min'=>'0','class'=> 'form-control', 'required' => 'required'])}}
								<span class="input-group-addon">บาท</span>
							</div>
						</div>
					</div>
					<div class="row">
						<label for="inputEmail3" class="col-sm-3 control-label">แบบมาตรฐาน</label>
						<div class="col-sm-4">
							<div class="input-group">
								{{ Form::number('standard','0',['min'=>'0','class'=> 'form-control', 'required' => 'required'])}}
								<span class="input-group-addon">บาท</span>
							</div>
						</div>
					</div>
					<div class="row">
						<label for="inputEmail3" class="col-sm-3 control-label">แบบประหยัด</label>
						<div class="col-sm-4">
							<div class="input-group">
								{{ Form::number('cheap','0',['min'=>'0','class'=> 'form-control', 'required' => 'required'])}}
								<span class="input-group-addon">บาท</span>
							</div>
						</div>
					</div>
				</div>
			</div><!--form-group-->
			<div class="form-group">
				<label for="inputEmail3" class="col-sm-3 control-label">บริการพิเศษ</label>
				<div class="col-sm-8">
					{{Form::text('service','',array("class"=>"form-control"))}}
				</div>
			</div><!--form-group-->
			<div class="form-group">
				<label for="inputEmail3" class="col-sm-3 control-label">อื่นๆ</label>
				<div class="col-sm-8">
					{{ Form::textarea('others', null, ['class' => 'form-control', 'cols' => 30, 'rows' => 4]) }}
				</div>
			</div><!--form-group-->
			<div class="form-group">
				<label for="inputEmail3" class="col-sm-3 control-label">ค่าธรรมเนียมการส่งสินค้าคืน</label>
				<div class="col-sm-3">
					<div class="input-group">
						{{ Form::number('returnFee','0',['min'=>'0','class'=> 'form-control', 'required' => 'required'])}}
						<span class="input-group-addon">บาท</span>
					</div>
				</div>
				<label for="inputEmail3" class="col-sm-2 control-label">ภาษี</label>
				<div class="col-sm-3">
					<div class="input-group">
						{{ Form::number('tax','7',['min'=>'0','class'=> 'form-control', 'required' => 'required'])}}
						<span class="input-group-addon">%</span>
					</div>
				</div>
			</div><!--form-group-->
			<div class="form-group">
				<label for="inputEmail3" class="col-sm-3 control-label">เวลาสิ้นสุดการประมูล<span class="required">*</span></label>

				<div class="col-sm-2">
					{{Form::text('endDate', null, [
						"required" => "required", 
						"class" => "form-control", 
						"id" => "datepicker",
						"placeholder" => "วันที่"
					])}}
				</div>
				<div class="col-sm-2">
					{{Form::text('endTime', null, [
						"class" => "form-control", 
						"required" => "required",
						"id" => "timepicker",
						"placeholder" => "เวลา"
					])}}
				</div>
			</div><!--form-group-->
			<div class="form-group">
				<div class="col-sm-offset-3 col-sm-8">
					{{Form::submit("ลงสินค้า",array("class"=>"btn btn-primary"))}}
					{{Form::close()}}
				</div>
			</div>
		</form>
		<style>
		.input-group .form-control{
			z-index: 0;
		}
		</style>
		{{ HTML::style('css/jquery-ui.css'); }}
		{{ HTML::script('js/jquery-ui-1.10.4.min.js'); }}
		{{ HTML::script('js/jquery-ui-timepicker-addon.js'); }}
		<script>
		$(function() {
			$("#datepicker").datepicker({
				dateFormat: "yy-mm-dd",
				// minDate: "+1d",
				dayNamesMin: ["อา", "จ", "อ", "พ", "พฤ", "ศ", "ส"],
				monthNames: ["มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน", "กรกฎาคม", "สิงหาคม", "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม" ]
			});
			$('#timepicker').timepicker({
				timeFormat: "HH:mm",
				pickerTimeFormat: "HH:mm"
			});
		});
		</script>
@stop
@section('sidebar')
	@include('sell_item.sidebar')
@stop