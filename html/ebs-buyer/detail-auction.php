<?php include('header.php'); ?>
		<div class="row wrapper">
			<div class="col-md-9 content-wrapper content-white">
				<div class="row item-header">
					<div class="col-md-5">
						<a href="detail.php">
							<img src="img/holder.jpg" class="img-responsive">
						</a>						
					</div>
					<!-- /.col-md-6 -->
					<div class="col-md-7">
						<h2>
							ที่วาง-ที่จับ มือถืออเนกประสงค์
						</h2>
						<h3>สินค้าประมูล ราคาปัจจุบัน: 145 บาท</h3>
						<p>เรียกกันอีกชื่อง่ายๆคือ one touch silicone stand เพียงแค่กดเบาๆก็สามารถ งอและวางบนนิ้วมือหรือตั้งเพื่อดูได้ บอกเลยว่าน่ารักสุดๆ ไม่มีนี่พลาดมากอะ !!! (คุณสมบัติย่อ)</p>
						<!-- Nav tabs -->
						<ul class="nav nav-tabs" role="tablist">
							<li role="presentation" class="active"><a href="#auc1" role="tab" data-toggle="tab">ประมูลแบบกดเอง</a></li>
							<li role="presentation"><a href="#auc2" role="tab" data-toggle="tab">ประมูลอัตโนมัติ</a></li>
						</ul>

						<!-- Tab panes -->
						<div class="tab-content">
							<div role="tabpanel" class="tab-pane active" id="auc1">
								<br>
								<label for="">จำนวนราคาประมูลสูงสุด</label>
								<div class="input-group" style="width: 200px;">
									<input type="number" class="form-control" value="146">
									<span class="input-group-addon">บาท</span>
								</div><br>
								<a href="" class="btn btn-primary" style="margin-top:-3px;" data-toggle="modal" data-target="#myModal">ประมูล</a>
							</div>
							<div role="tabpanel" class="tab-pane" id="auc2">
								<br>
								<div class="row">
									<div class="col-sm-6">
										<label for="">จำนวนราคาประมูลสูงสุด</label>
										<div class="input-group" style="width: 200px; float: left;">
											<input type="number" class="form-control" value="146">
											<span class="input-group-addon">บาท</span>
										</div>
									</div>
									<!-- /.col-sm-6 -->
									<div class="col-sm-6">
										<label for="">จำนวนเงินที่เพิ่มในแต่ละครั้ง</label><br>
										<div class="input-group" style="width: 200px; float: left;">
											<input type="number" class="form-control" value="1">
											<span class="input-group-addon">บาท</span>
										</div>
									</div>
									<!-- /.col-sm-6 -->
								</div>
								<!-- /.row -->
								<br>
								<a href="" class="btn btn-primary" style="margin-top:-3px;" data-toggle="modal" data-target="#myModal">ประมูล</a>								
							</div>
						</div>
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
				<h4 class="modal-title" id="myModalLabel">ประมูลที่วาง-ที่จับ มือถืออเนกประสงค์ : สีแดง/น้ำเงิน/ดำ/ชมพู</h4>
			</div>
			<div class="modal-body">
				<form class="form-horizontal" role="form">
					<div class="form-group">
						<label for="inputEmail3" class="col-sm-5 control-label">ราคาประมูลสูงสุด</label>
						<div class="col-sm-7">
							<div class="checkbox">
								<strong>146 บาท</strong>
							</div>
						</div>
					</div><!--form-group-->
					<div class="form-group">
						<label for="inputEmail3" class="col-sm-5 control-label">จำนวนเงินที่เพิ่มในแต่ละครั้ง</label>
						<div class="col-sm-7">
							<div class="checkbox">
								<strong>1 บาท</strong>
							</div>
						</div>
					</div><!--form-group-->
					<div class="form-group">
						<label for="inputEmail3" class="col-sm-5 control-label">รูปแบบการจัดส่ง</label>
						<div class="col-sm-6">
							<select name="" id="" class="form-control">
								<option value="">แบบประหยัด: 30 บาท</option>
								<option value="" selected>แบบมาตรฐาน: 50 บาท</option>
								<option value="">แบบด่วน: 100 บาท</option>
							</select>
						</div>
					</div><!--form-group-->
					<div class="form-group">
						<label for="inputEmail3" class="col-sm-5 control-label">บริการพิเศษ</label>
						<div class="col-sm-7">
							<div class="checkbox">
								<label>
									<input type="checkbox"> ห่อของขวัญ</strong>
								</label>
							</div>
						</div>
					</div><!--form-group-->
					<div class="form-group">
						<label for="inputEmail3" class="col-sm-5 control-label">ราคาประมูลสูงสุด<br>รวมภาษีแล้ว (7%)</label>
						<div class="col-sm-7">
							<div class="checkbox">
								<strong>150 บาท</strong>
							</div>
							<!-- /.checkbox -->
						</div>
					</div><!--form-group-->
				</form>
			</div>
			<div class="modal-footer">
				<form action="payment.php">
				<button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>
				<button type="submit" class="btn btn-primary">ยืนยันการประมูล</button>
				</form>
			</div>
		</div>
	</div>
</div>
<?php include('footer.php'); ?>