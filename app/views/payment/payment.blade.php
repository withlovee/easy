@extends('layouts.master', ['title' => 'Payment'])
@section('content')
	<div class="container">
		<h1 class="line">ชำระเงิน</h1>
		<div class="row">
			<div class="col-md-6">
				<table class="table table-striped table-bordered payment-info">
					<tr>
						<th>ชื่อสินค้า</th>
						<td>{{$item->name}}</td>
					</tr>
					<tr>
						<th>ราคาสินค้า</th>
						<td>{{$item->price*$transaction->amount}} บาท</td>
					</tr>
					<tr>
						<th>ค่าขนส่ง</th>
						<td>{{$transaction->shippingCost}} บาท</td>
					</tr>
					<tr>
						<th>ภาษี</th>
						<td>{{$item->tax/100.0*$transaction->amount*$item->price}} บาท</td>
					</tr>
					<tr>
						<th>รวม</th>
						<td><strong>{{$transaction->price+$transaction->shippingCost}} บาท</strong></td>
					</tr>
				</table>
			</div>
			<!-- /.col-md-6 -->
			<div class="col-md-6">
				<form class="form-horizontal content-grey" action="transactions.php" role="form">
					<input type="hidden" name="success" value="1">
					<div class="form-group">
						<label for="inputEmail3" class="col-sm-3 control-label">ประเภทบัตร</label>
						<div class="col-sm-3">
							<div class="checkbox">
								<label>
									<input type="radio" name="type">
									<img src="../img/visa.PNG" alt="">
								</label>
							</div>
							<!-- /.checkbox -->
						</div>
						<div class="col-sm-3">
							<div class="checkbox">
								<label>
									<input type="radio" name="type">
									<img src="../img/master.png" alt="">									
								</label>
							</div>
							<!-- /.checkbox -->
						</div>
					</div><!--form-group-->
					<div class="form-group">
						<label for="inputEmail3" class="col-sm-3 control-label">รหัสบัตร</label>
						<div class="col-sm-6">
							<input type="text" class="form-control" placeholder="1234-1234-1234-1234">
						</div>
						<!-- /.col-sm-8 -->
					</div>
					<div class="form-group">
						<label for="inputEmail3" class="col-sm-3 control-label">CVV</label>
						<div class="col-sm-2">
							<input type="text" class="form-control" placeholder="123">
						</div>
						<!-- /.col-sm-8 -->
					</div>
					<div class="form-group">
						<label for="inputEmail3" class="col-sm-3 control-label">วันหมดอายุ</label>
						<div class="col-sm-3">
							<select name="" id="" class="form-control">
								<option value="">MM</option>
							</select>
						</div>
						<div class="col-sm-3">
							<select name="" id="" class="form-control">
								<option value="">YYYY</option>
							</select>
						</div>
						<!-- /.col-sm-8 -->
					</div>
					<div class="form-group">
						<div class="col-sm-offset-3 col-sm-8">
							<button type="submit" class="btn btn-primary">ชำระเงิน</button>
						</div>
					</div>
				</form>
			</div>
			<!-- /.col-md-6 -->
		</div>
		<!-- /.row -->
	</div>
	<!-- /.container -->
@stop
@section('sidebar')
	@include('sidebars.personal')
@stop