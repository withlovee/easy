<br>
<h2>เกี่ยวกับสินค้า</h2>
<table class="table table-striped table-bordered item-info">

	@if($item->brand)
	<tr>
		<th width="30%">ยี่ห้อ</th>
		<td>{{$item->brand}}</td>
	</tr>
	@endif

	@if($item->model)
	<tr>
		<th width="30%">รุ่น</th>
		<td>{{$item->model}}</td>
	</tr>
	@endif

	@if($item->volumn)
	<tr>
		<th width="30%">ความจุ</th>
		<td>{{$item->volumn}}</td>
	</tr>
	@endif

	@if($item->size)
	<tr>
		<th width="30%">ขนาด</th>
		<td>{{$item->size}}</td>
	</tr>
	@endif

	@if($item->quality)
	<tr>
		<th width="30%">สภาพ</th>
		<td>{{$item->quality}}</td>
	</tr>
	@endif

	@if($item->defect)
	<tr>
		<th width="30%">จุดบกพร่อง</th>
		<td>{{$item->defect}}</td>
	</tr>
	@endif

	<tr>
		<th width="30%">จำนวนสินค้า</th>
		<td>{{$item->quantity}} ชิ้น</td>
	</tr>

</table>
<!-- /.table -->
<br><br>
<h2>การส่งคืนและการจัดส่ง</h2>
<table class="table table-striped table-bordered item-info">

	@if($item->returnPolicy)
	<tr>
		<th width="30%">นโยบายการรับสินค้าคืน</th>
		<td>{{$item->returnPolicy}}</td>
	</tr>
	@endif

	@if($item->returnFee)
	<tr>
		<th width="30%">ค่าธรรมเนียมการส่งสินค้าคืน</th>
		<td>{{ nl2br($item->returnFee) }} บาท</td>
	</tr>
	@endif

	<tr>
		<th width="30%">วิธีบรรจุหีบห่อ การขนส่ง และการยืนยันการจัดส่ง</th>
		<td>
			@foreach(json_decode($item->shipping) as $text => $price)
				{{ $text }} ({{ $price }} บาท)<br>
			@endforeach
		</td>
	</tr>

	@if($item->service)
	<tr>
		<th width="30%">บริการพิเศษ</th>
		<td>{{$item->service}}</td>
	</tr>
	@endif

	@if($item->others)
	<tr>
		<th width="30%">อื่นๆ</th>
		<td>{{ nl2br($item->others) }}</td>
	</tr>
	@endif

	@if($item->tax)
	<tr>
		<th width="30%">รูปแบบภาษี</th>
		<td>{{$item->tax}}%</td>
	</tr>
	@endif

</table>
<!-- /.table -->
<br><br>
<h2>คำถามเกี่ยวกับสินค้า</h2>
@if(count($questions) > 0)
	<p>คลิกที่ชื่อคำถามเพื่อดูคำตอบ</p>
@else
	<p>ยังไม่มีคำถามสำหรับสินค้าชิ้นนี้</p>
@endif
<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
	@foreach ($questions as $question)
		
		<div class="panel panel-default">
			<div class="panel-heading" role="tab" id="headingOne">
				<h4 class="panel-title">
					<a data-toggle="collapse" data-parent="#accordion" href="#{{$question->id}}" aria-expanded="true" aria-controls="{{$question->id}}">
						@if($question->answer != null)
						<i class="glyphicon glyphicon-ok"></i>
						@else 
						<i class="glyphicon glyphicon-time"></i>
						@endif
							&nbsp; {{ $question->content }}
					</a>
				</h4>
			</div>
			<div id="{{$question->id}}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
				<div class="panel-body">
					@if($question->answer != null)
						{{ $question->answer }}
					@else 
						<form role="form" method="POST" action="{{{ URL::to('answerQuestion') }}}">		
							{{Form::hidden('id',$question->id)}}
							<div class="form-group">
								<!--<textarea name="" id="" cols="30" rows="2" class="form-control" placeholder="คำถามที่ต้องการสอบถาม"></textarea>-->
								{{ Form::textarea('answer', null, ['class' => 'form-control', 'cols' => 30, 'rows' => 2, 'placeholder' => 'กรุณาตอบคำถาม', 'required' => 'required']) }}
							</div>
							<div class="form-group">
								<!--<input type="text" class="btn btn-primary btn-sm" value="ส่งคำถาม">-->
								{{Form::submit("ส่งคำตอบ",array("class"=>"btn btn-primary btn-sm"))}}
							</div>
						</form>
					@endif
				</div>
			</div>
		</div>
		
	@endforeach

</div>
@if(is_buyer())
<br><br>
<h2>ถามคำถามเกี่ยวกับสินค้าชิ้นนี้</h2>

<form role="form" method="POST" action="{{{ URL::to('askQuestion') }}}">		
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
@endif