<?php include('header.php'); ?>
		<div class="row wrapper">
			<div class="col-md-9 content-wrapper content-white">
				<h1 class="line">แก้ไขข้อมูลส่วนตัว</h1>
				<form class="form-horizontal" role="form">
					<div class="form-group">
						<label for="inputEmail3" class="col-sm-3 control-label">ชื่อ-นามสกุล</label>
						<div class="col-sm-4">
							<input type="name" class="form-control" placeholder="ชื่อจริง" value="ณัฐพล" required>
						</div>
						<div class="col-sm-4">
							<input type="name" class="form-control" placeholder="นามสกุล" value="พัฒนาวิจิตร" required>
						</div>
					</div><!--form-group-->
					<div class="form-group">
						<label for="inputEmail3" class="col-sm-3 control-label">ที่อยู่</label>
						<div class="col-sm-8">
							<textarea name="" id="" cols="30" rows="3" class="form-control" placeholder="บ้านเลขที่ ซอย 
							ถนน แขวง เขต 
							จังหวัด รหัสไปรษณีย์" required>12/45 ถนนพระราม 1 
							แขวงวังใหม่ เขตปทุมวัน 
							กรุงเทพ 10100</textarea>
						</div>
					</div><!--form-group-->
					<div class="form-group">
						<label for="inputEmail3" class="col-sm-3 control-label">ประเทศ</label>
						<div class="col-sm-3">
							<select name="" id="" class="form-control" required>
								<option value="">เลือกประเทศ</option>
								<option value="Thailand" selected>ประเทศไทย</option>
							</select>
						</div>
						<label for="inputEmail3" class="col-sm-2 control-label">เบอร์โทรศัพท์</label>
						<div class="col-sm-3">
							<input type="tel" class="form-control" placeholder="6685-061-5575" value="6685-613-3321" required>
						</div>
					</div><!--form-group-->
					<div class="form-group">
						<label for="inputEmail3" class="col-sm-3 control-label">อีเมล์</label>
						<div class="col-sm-3">
							<input type="email" class="form-control" placeholder="your-email@email.com" value="nuttt.p@gmail.com" required>
						</div>
						<div class="col-sm-6 help-text">กรุณาใส่อีเมล์ที่ใช้งานได้จริง</div>
					</div><!--form-group-->
					<div class="form-group">
						<label for="inputEmail3" class="col-sm-3 control-label">เปลี่ยนรหัสผ่าน</label>
						<div class="col-sm-3">
							<input type="password" class="form-control" placeholder="********">
						</div>
						<div class="col-sm-6 help-text">รหัสผ่านใหม่ต้องเป็นตัว a-z และ 0-9 ผสมกันยาว 6-20 ตัวอักษรเท่านั้น</div>
					</div><!--form-group-->
					<div class="form-group">
						<label for="inputEmail3" class="col-sm-3 control-label" style="padding-left:0">ยืนยันรหัสผ่าน</label>
						<div class="col-sm-3">
							<input type="password" class="form-control" placeholder="********">
						</div>
						<div class="col-sm-6 help-text">ใส่รหัสผ่านเหมือนกับด้านบน</div>
					</div><!--form-group-->
					<div class="form-group">
						<div class="col-sm-offset-3 col-sm-8">
							<button type="submit" class="btn btn-primary">ปรับปรุงข้อมูล</button>
						</div>
					</div>
				</form>
			</div>
			<?php include('sidebar-transaction.php'); ?>
		</div><!--row-->
<?php include('footer.php'); ?>