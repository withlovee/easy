@extends('layouts.master', ['title' => $title.'สินค้า '.$transaction->item->name])
@section('content')
	@include('layouts.error')
	<div class="row item-header">
		<div class="col-sm-2">
				<!-- <img src="{{$transaction->item->picture}}" class="img-responsive"> -->
				{{ HTML::image('upload/'.$transaction->item->picture, $transaction->item->name, ['class' => 'img-responsive']) }}						
		</div>
		<!-- /.col-sm-6 -->
		<div class="col-sm-10">
			<h2>
				{{ $transaction->item->name }}
			</h2>
			<br>
			<dl class="dl-horizontal">
				<dt>ประเภทสินค้า</dt>
				<dd>
					@if($transaction->item->type == 'direct')
					สินค้าขายโดยตรง
					@elseif($transaction->item->type == 'auction')
					สินค้าประมูล
					@endif
				</dd>
				<dt>ซื้อเมื่อวันที่</dt>
				<dd>{{ $transaction->created_at }}</dd>
				@if(Auth::user()->role == 'Buyer')
				<dt>ผู้ขาย</dt>
				<dd><a href="{{ URL::to('user/'.$transaction->item->seller->id) }}">{{ $transaction->item->seller->username }}</a> (<a href="{{ URL::to('/supporttickets/create?reporteeId='.$transaction->item->seller->id) }}">ร้องเรียน</a>)</dd>
				@else
				<dt>ผู้ซื้อ</dt>
				<dd><a href="{{ URL::to('user/'.$transaction->buyer->id) }}">{{ $transaction->buyer->username }}</a> (<a href="{{ URL::to('/supporttickets/create?reporteeId='.$transaction->buyer->id) }}">ร้องเรียน</a>)</dd>
				@endif
				<dt>จำนวน</dt>
				<dd>{{ $transaction->amount }} ชิ้น</dd>
				<dt>ราคาสินค้า</dt>
				<dd>{{ number_format($transaction->price) }} บาท (รวมภาษี {{ $transaction->item->tax }}% แล้ว)</dd>
				<dt>ค่าจัดส่ง</dt>
				<dd>{{ number_format($transaction->shippingCost) }} บาท</dd>
				<dt>ราคารวม</dt>
				<dd>{{ number_format($transaction->price + $transaction->shippingCost) }} บาท</dd>
				<dt>สถานะ</dt>
				<dd>
				@if($transaction->status == 'payment_waiting')
					<span class="btn btn-warning" role="button" disabled="disabled"><i class="glyphicon glyphicon-time"></i> รอการชำระเงิน</span>
				@elseif($transaction->status == 'paid')
					<span class="btn btn-warning" role="button" disabled="disabled"><i class="glyphicon glyphicon-time"></i> ชำระเงินแล้ว รอจัดส่ง</span>
				@elseif($transaction->status == 'shipped')
					<span class="btn btn-success" role="button" disabled="disabled"><i class="glyphicon glyphicon-inbox"></i> จัดส่งแล้ว</span>
				@elseif($transaction->status == 'received')
					<span class="btn btn-success" role="button" disabled="disabled"><i class="glyphicon glyphicon-ok"></i> ได้รับสินค้าแล้ว</span>
				@endif
				</dd>
				<dt>กิจกรรม</dt>
				<dd>
					@if(Auth::user()->role == 'Buyer' && $transaction->status == 'payment_waiting')
					<a href="{{ URL::to('/pay/'.$transaction->id) }}" class="btn btn-info" role="button">ต้องการชำระเงิน</a>
					@else
						{{ Form::open(array('url' => 'transaction/set_status')) }}
							{{ Form::hidden('id', $transaction->id) }}
							@if(Auth::user()->role == 'Seller' && $transaction->status == 'paid')
								{{ Form::hidden('status', 'shipped') }}
								<button type="submit" class="btn btn-info" role="button">ส่งสินค้าแล้ว</button>
							@elseif($transaction->status == 'shipped')
								{{ Form::hidden('status', 'received') }}
								<button type="submit" class="btn btn-info" role="button">ได้รับสินค้าแล้ว</button>
							@else
							-
							@endif
						{{ Form::close() }}
					@endif
				</dd>
			</dl>
			@if(Auth::user()->role == 'Buyer' && $transaction->sellerFeedbackId== null && $transaction->status == 'received')
				<h2>ให้ Feedback กับผู้ขาย</h2>
				{{ Form::open(array('class' => 'form-horizontal', 'url' => 'feedback/create/'.$transaction->item->seller->id)) }}
					{{Form::hidden('transaction_id', $transaction->id)}}
					<div class="form-group">
						<div class="col-sm-8">
						{{ Form::textarea('content', null, ['class' => 'form-control', 'cols' => 30, 'rows' => 2, 'placeholder' => 'กรุณากรอกความรู้สึกที่มีต่อการซื้อขายครั้งนี้', 'required' => 'required']) }}
						</div>
						<div class="col-sm-2">
							<div class="radio">
								<label>
									{{Form::radio('score','1')}}
									<i class="glyphicon glyphicon-thumbs-up thumb-up"></i>
								</label>
							</div>
						</div>
						<div class="col-sm-2">
							<div class="radio">
								<label>
									{{ Form::radio( 'score','0')}}
									<i class="glyphicon glyphicon-thumbs-down thumb-down"></i>
								</label>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-12">
						{{Form::submit("ส่ง Feedback",array("class"=>"btn btn-primary btn-sm"))}}
						</div>
					</div>
				</form>
			@elseif(Auth::user()->role == 'Seller' && $transaction->buyerFeedbackId  == null && $transaction->status == 'received')
				<h2>ให้ Feedback กับผู้ซื้อ</h2>
				{{ Form::open(array('class' => 'form-horizontal', 'url' => 'feedback/create'.$transaction->buyer->id)) }}
					{{Form::hidden('transaction_id', $transaction->id)}}
					<div class="form-group">
						<div class="col-sm-8">
						{{ Form::textarea('content', null, ['class' => 'form-control', 'cols' => 30, 'rows' => 2, 'placeholder' => 'กรุณากรอกความรู้สึกที่มีต่อการซื้อขายครั้งนี้', 'required' => 'required']) }}
						</div>
						<div class="col-sm-2">
							<div class="radio">
								<label>
									{{ Form::radio( 'score','1')}}
									<i class="glyphicon glyphicon-thumbs-up thumb-up"></i>
								</label>
							</div>
						</div>
						<div class="col-sm-2">
							<div class="radio">
								<label>
									{{ Form::radio( 'score','0')}}
									<i class="glyphicon glyphicon-thumbs-down thumb-down"></i>
								</label>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-12">
						{{Form::submit("ส่ง Feedback",array("class"=>"btn btn-primary btn-sm"))}}
						</div>
					</div>
				</form>
	
			@endif
			<nav>
				<ul class="pager">
					<li class="prev">{{ HTML::link('/transactions', 'ย้อนกลับ') }}</li>
				</ul>
			</nav>
		</div>
		<!-- /.col-sm-6 -->
	</div>
	<!-- /.row -->
@stop
@section('sidebar')
	@include('sidebars.sidebar')
@stop
