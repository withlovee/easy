<?php include('header.php'); ?>
<div class="container">
	<div class="row">
		<div class="col-md-6 col-md-offset-3" id="signin">
			<form class="form-signin" role="form" action="index.php">
			<input type="hidden" name="success" value="1">
				<div class="alert alert-success text-center" role="alert">
					<h4>ขอบคุณสำหรับการสมัคร</h4>
					<p>กรุณาเช็คอีเมล์เพื่อรับอีเมลยืนยันระบบ</p>
				</div>
				<p class="text-center">(<a href="signin2.php">ยืนยันแล้ว</a>)</p>
			</form>
		</div>
	</div><!--row-->
</div>
<!-- /.container -->
<?php include('footer.php'); ?>