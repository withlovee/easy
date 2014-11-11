<?php include('header.php'); ?>
		<div class="row wrapper">
			<div class="col-md-9 content-wrapper content-white">
				<h1 class="line">สมัครสมาชิก</h1>
				<form class="form-horizontal" role="form">
					<div class="form-group">
						<label for="inputEmail3" class="col-sm-3 control-label">ชื่อ-นามสกุล</label>
						<div class="col-sm-4">
							<input type="name" class="form-control" placeholder="ชื่อจริง" required>
						</div>
						<div class="col-sm-4">
							<input type="name" class="form-control" placeholder="นามสกุล" required>
						</div>
					</div><!--form-group-->
					<div class="form-group">
						<label for="inputEmail3" class="col-sm-3 control-label">ที่อยู่</label>
						<div class="col-sm-8">
							<textarea name="" id="" cols="30" rows="3" class="form-control" placeholder="บ้านเลขที่ ซอย 
							ถนน แขวง เขต 
							จังหวัด รหัสไปรษณีย์" required></textarea>
						</div>
					</div><!--form-group-->
					<div class="form-group">
						<label for="inputEmail3" class="col-sm-3 control-label">ประเทศ</label>
						<div class="col-sm-3">
							<select name="" id="" class="form-control" required>
								<option value="">เลือกประเทศ</option>
								<option value="Thailand">ประเทศไทย</option>
							</select>
						</div>
						<label for="inputEmail3" class="col-sm-2 control-label">เบอร์โทรศัพท์</label>
						<div class="col-sm-3">
							<input type="tel" class="form-control" placeholder="6685-061-5575" required>
						</div>
					</div><!--form-group-->
					<div class="form-group">
						<label for="inputEmail3" class="col-sm-3 control-label">อีเมล์</label>
						<div class="col-sm-3">
							<input type="email" class="form-control" placeholder="your-email@email.com" required>
						</div>
						<div class="col-sm-6 help-text">กรุณาใส่อีเมล์ที่ใช้งานได้จริง</div>
					</div><!--form-group-->
					<div class="form-group">
						<label for="inputEmail3" class="col-sm-3 control-label">ชื่อประจำตัวผู้ใช้</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" placeholder="myuserid" required>
						</div>
						<div class="col-sm-6 help-text">ชื่อต้องเป็นตัว a-z และ 0-9 ผสมกันยาว 6-20 ตัวอักษรเท่านั้น</div>
					</div><!--form-group-->
					<div class="form-group">
						<label for="inputEmail3" class="col-sm-3 control-label">รหัสผ่าน</label>
						<div class="col-sm-3">
							<input type="password" class="form-control" placeholder="********" required>
						</div>
						<div class="col-sm-6 help-text">รหัสผ่านต้องเป็นตัว a-z และ 0-9 ผสมกันยาว 6-20 ตัวอักษรเท่านั้น</div>
					</div><!--form-group-->
					<div class="form-group">
						<label for="inputEmail3" class="col-sm-3 control-label" style="padding-left:0">ยืนยันรหัสผ่าน</label>
						<div class="col-sm-3">
							<input type="password" class="form-control" placeholder="********" required>
						</div>
						<div class="col-sm-6 help-text">ใส่รหัสผ่านเหมือนกับด้านบน</div>
					</div><!--form-group-->
					<div class="form-group">
						<label for="inputEmail3" class="col-sm-3 control-label">สมัครเป็น</label>
						<div class="col-sm-3">
							<select name="" id="" class="form-control" required>
								<option value="">เลือก</option>
								<option value="">ผู้ขาย</option>
								<option value="">ผู้ซื้อ</option>
							</select>
						</div>
						<div class="col-sm-6 help-text">เลือกว่าจะสมัครเป็นผู้ซื้อหรือผู้ขาย</div>
					</div><!--form-group-->
					<div class="form-group">
						<div class="col-sm-offset-3 col-sm-10">
							<div class="checkbox">
								<label>
									<input type="checkbox"> ฉันอ่านและยอมรับ<strong>เงื่อนไขในการใช้งาน</strong>
								</label>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-3 col-sm-8">
							<button type="submit" class="btn btn-primary">สมัครสมาชิก</button>
						</div>
					</div>
				</form>
			</div>
			<div class="col-md-3 sidebar-wrapper" id="sidebar">
				<h3>เงื่อนไขในการใช้งาน</h3>
				<div class="box small-text">
					<ol>
						<li>ขอสงวนสิทธิให้เฉพาะผู้ใช้บริการที่ลงทะเบียนเป็นสมาชิกออนไลน์สามารถสั่งซื้อสินค้าและ/หรือบริการ หรือร่วมทำกิจกรรมต่างๆที่จัดขึ้นในเว็บไซต์ อาทิเช่น การประมูล</li>
						<li>ผู้ใช้บริการจะต้องให้ข้อมูลส่วนบุคคลของตนเองอย่างถูกต้อง สมบูรณ์ และทันสมัย (update) ที่สุด</li>
						<li>ผู้ใช้บริการตกลงจะรักษา login name และรหัสผ่านไว้เป็นความลับ</li>
						<li>ในกรณีผู้ใช้บริการใช้สิทธิไปในทางที่ก่อให้เกิดความเสียหายต่อผู้ใช้บริการอื่นใด ผู้ใช้บริการตกลงที่จะรับผิดชอบต่อความเสียหายดังกล่าวที่เกิดขึ้นเต็มจำนวน</li>
						<li>สำหรับสมาชิกออนไลน์ที่มีอายุต่ำกว่า 18 ปี การทำธุรกรรมใดๆที่เกี่ยวข้องกับการเงินเช่น สั่งซื้อสินค้าออนไลน์ หรือเข้าร่วมทำการประมูลจะต้องได้รับความเห็นชอบ จากผู้ปกครองก่อนทุกครั้ง</li>
					</ol>
				</div>
			</div><!--sidebar-->
		</div><!--row-->
<?php include('footer.php'); ?>