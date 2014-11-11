<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>EBS</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../ebs-assets/css/bootstrap.css">
	<link rel="stylesheet/less" type="text/css" href="../ebs-assets/css/style.less" />
	<script src="../ebs-assets/js/jquery-1.9.1.js" type="text/javascript"></script>
	<script src="../ebs-assets/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="../ebs-assets/js/less.js" type="text/javascript"></script>
</head>
<body>
<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
	<!-- Brand and toggle get grouped for better mobile display -->
	<div class="navbar-header">
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
		<a class="navbar-brand" href="index.php" style="padding: 4px 15px;">
			<img src="img/logo.png" alt="">
		</a>
	</div>

	<!-- Collect the nav links, forms, and other content for toggling -->
	<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		<ul class="nav navbar-nav">
			<li class="active"><a href="index.php">หน้าหลัก</a></li>
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">ซื้อสินค้า <b class="caret"></b></a>
				<ul class="dropdown-menu">
					<li><a href="all.php">ทั้งหมด</a></li>
					<li><a href="all-auction.php">สินค้าประมูล</a></li>
					<li><a href="all-direct.php">สินค้าขายโดยตรง</a></li>
				</ul>
			</li>
			<li>
				<a href="report.php">ร้องเรียนปัญหา</a>
			</li>
		</ul>
		<ul class="nav navbar-nav navbar-right">
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">สวัสดี! ณัฐพล พัฒนาวิจิตร (nuttapon) <b class="caret"></b></a>
				<ul class="dropdown-menu">
					<li><a href="edit_profile.php">แก้ไขข้อมูลส่วนตัว</a></li>
					<li><a href="member_profile.php">ดู Feedback</a></li>
					<li><a href="transactions.php">ดูประวัติการสั่งซื้อ</a></li>
					<li class="divider"></li>
					<li><a href="signin.php">ออกจากระบบ</a></li>
				</ul>
			</li>
		</ul>
	</div><!-- /.navbar-collapse -->
</nav>