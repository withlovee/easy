@extends('layouts.master', ['title' => 'ชำระเงิน'])
@section('wrapper')
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
						<td>{{number_format($transaction->price)}} บาท</td>
					</tr>
					<tr>
						<th>ค่าขนส่ง</th>
						<td>{{number_format($transaction->shippingCost)}} บาท</td>
					</tr>
					<tr>
						<th>ภาษี</th>
						<td>{{number_format($tax)}} บาท</td>
					</tr>
					<tr>
						<th>รวม</th>
						<td><strong>{{number_format($total)}} บาท</strong></td>
					</tr>
				</table>
			</div>
			<!-- /.col-md-6 -->
			<div class="col-md-6">
				{{Form::open(array('url' => 'pay/'.$transaction->id, 'method' =>'post', 'class' => 'form-horizontal'))}}
					<input type="hidden" name="success" value="1">
					<div class="form-group">
						<label for="inputEmail3" class="col-sm-3 control-label">ประเภทบัตร</label>
						<div class="col-sm-3">
							<div class="checkbox">
								<label>
									{{ Form::radio('cardType', 'visa', true) }}
									<img src="../img/visa.PNG" alt="">
								</label>
							</div>
							<!-- /.checkbox -->
						</div>
						<div class="col-sm-3">
							<div class="checkbox">
								<label>
									{{ Form::radio('cardType', 'master') }}
									<img src="../img/master.png" alt="">									
								</label>
							</div>
							<!-- /.checkbox -->
						</div>
					</div><!--form-group-->
					<div class="form-group">
						<label for="inputEmail3" class="col-sm-3 control-label">รหัสบัตร</label>
						<div class="col-sm-6">
							{{Form::text('cardId','',array('class'=>'form-control','for'=>'inputEmail3','placeholder'=>'1234-1234-1234-1234','pattern'=>'[0-9]{4}[-][0-9]{4}[-][0-9]{4}[-][0-9]{4}','required'=>"required"))}}
						</div>
						<!-- /.col-sm-8 -->
					</div>
					<div class="form-group">
						<label for="inputEmail3" class="col-sm-3 control-label">CVV</label>
						<div class="col-sm-2">
							{{Form::text('cvv','',array('class'=>'form-control','placeholder'=>'123','pattern'=>'[0-9]{3}','required'=>"required"))}}
						</div>
						<!-- /.col-sm-8 -->
					</div>
					<div class="form-group">
						<label for="inputEmail3" class="col-sm-3 control-label">วันหมดอายุ</label>
						<div class="col-sm-3">
							{{Form::selectRange('month', 01, 12,01,array('class'=>'form-control'))}}
						</div>
						<div class="col-sm-3">
							
								{{Form::selectYear('year', 1900, 2030, 2015, array('class'=>'form-control'))}}
							
						</div>
						<!-- /.col-sm-8 -->
					</div>
					<div class="form-group">
						<div class="col-sm-offset-3 col-sm-8">
							{{ Form::submit('ชำระเงิน',['class'=>"btn btn-primary"])}}
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
