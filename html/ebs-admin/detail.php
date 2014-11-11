<?php include('header.php'); ?>
		<div class="row wrapper">
			<div class="col-md-9 content-wrapper content-white">
				<div class="row item-header">
					<div class="col-md-5">
						<a href="detail.php">
							<img src="img/powerbank.jpg" class="img-responsive">
						</a>						
					</div>
					<!-- /.col-md-6 -->
					<div class="col-md-7">
						<h2>
							ที่ชาร์ตแบตสำรองสีชมพูแบบพวงกุญแจ 2600mAh
						</h2>
						<h3>สินค้าขายโดยตรง ราคา: 1,250 บาท</h3>
						<p>เป็นอีกหนึ่งทางเลือกของที่ชาร์ตแบตสำรองขนาดกระทัดรัด สามารถซื้อเป็นของขวัญให้ใครก็ได้ ในราคาเบาๆ อีกทั้งยังสามารถเป็นพวงกุญแจได้ในตัว</p>
						<p>
							<img src="img/num.PNG" alt="">
							&nbsp;
							<a href="" class="btn btn-primary" data-toggle="modal" data-target="#myModal">ซื้อสินค้า</a>
						</p>
					</div>
					<!-- /.col-md-6 -->
				</div>
				<!-- /.row -->
				<?php include('detail-info.php'); ?>
			</div><!--content-->
			<?php include('sidebar.php'); ?>
		</div><!--row-->

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<h4 class="modal-title" id="myModalLabel">สั่งซื้อที่ชาร์ตแบตสำรองสีชมพูแบบพวงกุญแจ 2600mAh</h4>
			</div>
			<div class="modal-body">
				<form class="form-horizontal" role="form">
					<div class="form-group">
						<label for="inputEmail3" class="col-sm-4 control-label">จำนวน</label>
						<div class="col-sm-8">
							<img src="img/num.PNG" alt="">
						</div>
					</div><!--form-group-->
					<div class="form-group">
						<label for="inputEmail3" class="col-sm-4 control-label">รูปแบบการจัดส่ง</label>
						<div class="col-sm-6">
							<select name="" id="" class="form-control">
								<option value="">แบบประหยัด: 30 บาท</option>
								<option value="" selected>แบบมาตรฐาน: 50 บาท</option>
								<option value="">แบบด่วน: 100 บาท</option>
							</select>
						</div>
					</div><!--form-group-->
					<div class="form-group">
						<label for="inputEmail3" class="col-sm-4 control-label">บริการพิเศษ</label>
						<div class="col-sm-8">
							<div class="checkbox">
								<label>
									<input type="checkbox"> ห่อของขวัญ</strong>
								</label>
							</div>
						</div>
					</div><!--form-group-->
					<div class="form-group">
						<label for="inputEmail3" class="col-sm-4 control-label">ราคารวมภาษี (7%)</label>
						<div class="col-sm-8">
							<div class="checkbox">
								<strong>1,373 บาท</strong>
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
<?php include('footer.php'); ?>