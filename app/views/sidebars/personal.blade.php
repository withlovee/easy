
	<h3>ค้นหาสินค้า</h3>
	<div class="search">
		<form action="search.php">
		<div class="input-group">
			<input type="text" class="form-control">
			<span class="input-group-btn">
				<button class="btn btn-primary" type="submit">ค้นหา</button>
			</span>
		</div><!-- /input-group -->
		</form>
	</div>
	<!-- /.box -->
	<h3>เมนูของฉัน</h3>
	<div class="list-group">
		<a href="edit_profile.php" class="list-group-item">แก้ไขข้อมูลส่วนตัว</a>
		<a href="member_profile.php" class="list-group-item">ดู Feedback</a>
		<a href="transactions.php" class="list-group-item">ดูประวัติการสั่งซื้อ</a>
		<a href="report.php" class="list-group-item">ร้องเรียนปัญหา</a>
	</div>
	<h3>โฆษณา</h3>
	<div class="ad">
		{{ HTML::image('img/390x150.gif', 'EASY', ['class' => 'img-responsive']) }}
		<br>
		{{ HTML::image('img/390x150.gif', 'EASY', ['class' => 'img-responsive']) }}
	</div>
	<!-- /.ad -->