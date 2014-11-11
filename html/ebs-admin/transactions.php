<?php include('header.php'); ?>
		<div class="row wrapper">
			<div class="col-md-9 content-wrapper">
				<h1 class="line">
					ประวัติการสั่งซื้อ
				</h1>
				<?php if(isset($_GET['success'])): ?>
				<div class="alert alert-success" role="alert">
					<p>คุณชำระเงินสินค้า "ที่วาง-ที่จับ มือถืออเนกประสงค์" เรียบร้อยแล้ว</p>
				</div>
				<?php endif; ?>
				<div class="row item">
					<div class="col-sm-3">
						<a href="transaction.php">
							<img src="img/holder.jpg" class="img-responsive">
						</a>
					</div>
					<!-- /.col-sm-3 -->
					<div class="col-sm-9">
						<h3><a href="transaction.php">ที่วาง-ที่จับ มือถืออเนกประสงค์</a></h3>
						<p>วันที่สั่งซื้อ: 1/11/2014<br>ราคา: 150 บาท</p>
						<p>
							<span href="#" class="btn btn-warning" role="button" disabled="disabled"><i class="glyphicon glyphicon-time"></i> รอจัดส่ง</span>
							<a href="transaction.php" class="btn btn-primary" role="button">ดูรายละเอียด</a>
						</p>
					</div>
					<!-- /.col-sm-9 -->
				</div>
				<div class="row item">
					<div class="col-sm-3">
						<a href="transaction.php">
							<img src="img/powerbank.jpg" class="img-responsive">
						</a>
					</div>
					<!-- /.col-sm-3 -->
					<div class="col-sm-9">
						<h3><a href="transaction.php">ที่ชาร์ตแบตสำรองสีชมพูแบบพวงกุญแจ 2600mAh</a></h3>
						<p>วันที่สั่งซื้อ: 1/11/2014<br>ราคา: 1,250 บาท</p>
						<p>
							<span href="#" class="btn btn-success" role="button" disabled="disabled"><i class="glyphicon glyphicon-ok"></i> ได้รับสินค้าและ Feedback แล้ว</span>
							<a href="transaction.php" class="btn btn-primary" role="button">ดูรายละเอียด</a>
						</p>
					</div>
					<!-- /.col-sm-9 -->
				</div>
			</div><!--content-->
			<?php include('sidebar-transaction.php'); ?>
		</div><!--row-->
<?php include('footer.php'); ?>