<?php include('header.php'); ?>
<div class="container">
	<div class="row">
		<div class="col-md-4 col-md-offset-4" id="signin">
			<form class="form-signin" role="form" action="index.php">
			<h2 class="form-signin-heading">เข้าสู่ระบบ</h2>
				<div class="alert alert-success" role="alert">
					<h4>ขอบคุณสำหรับการยืนยัน</h4>
					<p>โปรดใส่ชื่อประจำตัวและรหัสผ่านเพื่อเข้าสู่ระบบ</p>
				</div>
				<input type="hidden" name="success" value="1">
				<div class="form-group">
					<label for="exampleInputEmail1">ชื่อประจำตัว</label>
					<input type="text" class="form-control" id="exampleInputEmail1" placeholder="your-id" required>
				</div>
				<div class="form-group">
					<label for="exampleInputPassword1">รหัสผ่าน</label>
					<input type="password" class="form-control" id="exampleInputPassword1" placeholder="******" required>
				</div>
				<button class="btn btn-lg btn-primary btn-block" type="submit"><span class="glyphicon glyphicon-ok"></span> เข้าสู่ระบบ</button>
			</form>
		</div>
	</div><!--row-->
</div>
<!-- /.container -->
<?php include('footer.php'); ?>
