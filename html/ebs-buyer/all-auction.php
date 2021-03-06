<?php include('header.php'); ?>
		<div class="row wrapper">
			<div class="col-md-9 content-wrapper">
				<h1 class="line">
					<span class="text-left">
						สินค้าประมูล
					</span>
					<span class="right">
						<div class="btn-group" style="display: none;">
							<button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">
								เลือกดู <span class="caret"></span>
							</button>
							<ul class="dropdown-menu">
								<li><a href="#">แสดงสินค้าทั้งหมด</a></li>
								<li><a href="#">เฉพาะสินค้าขายโดยตรง</a></li>
								<li><a href="#">เฉพาะสินค้าประมูล</a></li>
							</ul>
						</div><!--btn-group-->
						<div class="btn-group" style="display: none;">
							<button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">
								ประเภท <span class="caret"></span>
							</button>
							<ul class="dropdown-menu">
								<li><a href="#">Computer</a></li>
								<li><a href="#">Computer Engineering</a></li>
								<li><a href="#">Coding</a></li>
								<li><a href="#">Maths</a></li>
								<li><a href="#">Physics</a></li>
							</ul>
						</div><!--btn-group-->
					</span><!--text-right-->
					<div class="clear"></div>
				</h1>
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
				<nav class="text-center">
				  <ul class="pagination">
				    <li><a href="#">&laquo;</a></li>
				    <li class="active"><a href="#">1</a></li>
				    <li><a href="#">&raquo;</a></li>
				  </ul>
				</nav>
			</div><!--content-->
			<?php include('sidebar.php'); ?>
		</div><!--row-->
<?php include('footer.php'); ?>