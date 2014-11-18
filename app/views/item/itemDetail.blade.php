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
						<form class="form-horizontal" role="form" method="POST" action="{{{ URL::to('answerQuestion') }}}">		
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