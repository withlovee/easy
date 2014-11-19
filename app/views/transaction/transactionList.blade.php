@extends('layouts.master', ['title' => $title, 'class' => 'content-grey'])
@section('content')
	<h1 class="line">
		{{ $title }}
	</h1>
	@include('layouts.error')
	@foreach($transactions as $transaction)
	<div class="row item">
		<div class="col-sm-3">
			<a href="{{ URL::to('/transaction/'.$transaction->id) }}">
				<img src="{{ $transaction->item->picture }}" class="img-responsive">
			</a>
		</div>
		<!-- /.col-sm-3 -->
		<div class="col-sm-9">
			<h3><a href="{{ URL::to('/transaction/'.$transaction->id) }}">{{ $transaction->item->name }}</a></h3>
			<p>วันที่สั่งซื้อ: {{ $transaction->created_at }}<br>ราคา: {{ number_format($transaction->price + $transaction->shippingCost) }} บาท</p>
			<p>
				@if($transaction->status == 'payment_waiting')
				<span class="btn btn-warning" role="button" disabled="disabled"><i class="glyphicon glyphicon-time"></i> รอการชำระเงิน</span>
				@elseif($transaction->status == 'paid')
				<span class="btn btn-success" role="button" disabled="disabled"><i class="glyphicon glyphicon-time"></i> ชำระเงินแล้ว รอจัดส่ง</span>
				@elseif($transaction->status == 'shipped')
				<span class="btn btn-success" role="button" disabled="disabled"><i class="glyphicon glyphicon-ok"></i> จัดส่งแล้ว</span>
				@elseif($transaction->status == 'received')
				<span class="btn btn-success" role="button" disabled="disabled"><i class="glyphicon glyphicon-ok"></i> ได้รับสินค้าแล้ว</span>
				@endif
				<a href="{{ URL::to('/transaction/'.$transaction->id) }}" class="btn btn-primary" role="button">ดูรายละเอียด</a>
			</p>
		</div>
		<!-- /.col-sm-9 -->
	</div>
	@endforeach
	<nav>
		<div class="text-center">{{ $transactions->links() }}</div>
	</nav>
@stop
@section('sidebar')
	@include('sidebars.personal')
@stop