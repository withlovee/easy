@extends('layouts.master', ['title' => $title.'สินค้า {{ $transaction->item->name }}'])
@section('content')
	<div class="row item-header">
		<div class="col-sm-2">
			<a href="detail.php">
				<img src="{{$transaction->item->picture}}" class="img-responsive">
			</a>						
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
				<dd><a href="">{x{ $transaction->item->seller->username }}</a> (<a href="{x{ URL::to('/supporttickets/create?reporteeId='.$transaction->item->seller->id) }}">ร้องเรียน</a>)</dd>
				@else
				<dt>ผู้ซื้อ</dt>
				<dd><a href="">{x{ $transaction->buyer->username }}</a> (<a href="{x{ URL::to('/supporttickets/create?reporteeId='.$transaction->buyer->id) }}">ร้องเรียน</a>)</dd>
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
					<span class="btn btn-success" role="button" disabled="disabled"><i class="glyphicon glyphicon-time"></i> ชำระเงินแล้ว รอจัดส่ง</span>
					@elseif($transaction->status == 'shipped')
					<span class="btn btn-success" role="button" disabled="disabled"><i class="glyphicon glyphicon-ok"></i> จัดส่งแล้ว</span>
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
							@if(Auth::user()->role == 'Seller' && $transaction->status == 'paid')
							<a href="#" class="btn btn-info" role="button">ส่งสินค้าแล้ว</a>
							@elseif(Auth::user()->role == 'Seller' && $transaction->status == 'shipped')
							<a href="#" class="btn btn-info" role="button">เขียน Feedback</a>
							@elseif($transaction->status == 'received')
							<a href="#" class="btn btn-info" role="button">เขียน Feedback</a>
							@else
							-
							@endif
						{{ Form::close() }}
					@endif
				</dd>
			</dl>
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
	@include('sidebars.personal')
@stop
