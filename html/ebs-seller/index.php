<?php include('header.php'); ?>
		<div class="row wrapper">
			<div class="col-md-9 content-wrapper">
				<?php if(isset($_GET['success'])): ?>
				<div class="alert alert-success" role="alert">
					<p>คุณเข้าสู่ระบบเรียบร้อยแล้ว</p>
				</div>
				<?php endif; ?>
				<h1 class="line">
					<span class="text-left">
						สินค้าล่าสุด
					</span>
					<span class="right">
						<a href="all.php" class="btn btn-default">ดูสินค้าทั้งหมด &rarr;</a>
					</span><!--text-right-->
					<div class="clear"></div>
				</h1>
				<div class="row item">
					<div class="col-sm-3">
						<a href="detail.php">
							<img src="img/powerbank.jpg" class="img-responsive">
						</a>
					</div>
					<!-- /.col-sm-3 -->
					<div class="col-sm-9">
						<h3><a href="detail.php">ที่ชาร์ตแบตสำรองสีชมพูแบบพวงกุญแจ 2600mAh</a></h3>
						<p>เป็นอีกหนึ่งทางเลือกของที่ชาร์ตแบตสำรองขนาดกระทัดรัด สามารถซื้อเป็นของขวัญให้ใครก็ได้ ในราคาเบาๆ อีกทั้งยังสามารถเป็นพวงกุญแจได้ในตัว</p>
						<p>
							<span href="#" class="btn btn-default" role="button" disabled="disabled">1,250 บาท</span>
							<a href="detail.php" class="btn btn-primary" role="button">ดูรายละเอียด</a>
						</p>
					</div>
					<!-- /.col-sm-9 -->
				</div>
				<div class="row item">
					<div class="col-sm-3">
						<a href="detail-auction.php">
							<img src="img/holder.jpg" class="img-responsive">
						</a>
					</div>
					<!-- /.col-sm-3 -->
					<div class="col-sm-9">
						<h3><a href="detail-auction.php">ที่วาง-ที่จับ มือถืออเนกประสงค์</a></h3>
						<p>เรียกกันอีกชื่อง่ายๆคือ one touch silicone stand เพียงแค่กดเบาๆก็สามารถ งอและวางบนนิ้วมือหรือตั้งเพื่อดูได้ บอกเลยว่าน่ารักสุดๆ ไม่มีนี่พลาดมากอะ !!!</p>
						<p>
							<span href="#" class="btn btn-warning" role="button" disabled="disabled"><i class="glyphicon glyphicon-time"></i> ประมูล</span>
							<span href="#" class="btn btn-default" role="button" disabled="disabled">145 บาท</span>
							<a href="detail-auction.php" class="btn btn-primary" role="button">ดูรายละเอียด</a>
						</p>
					</div>
					<!-- /.col-sm-9 -->
				</div>
				<nav>
					<ul class="pager">
						<li class="next"><a href="all.php">ดูสินค้าทั้งหมด &rarr;</a></li>
					</ul>
				</nav>
			</div><!--content-->
			<?php include('sidebar.php'); ?>
		</div><!--row-->
<?php include('footer.php'); ?>