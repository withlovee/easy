<?php include('header.php'); ?>
		<div class="row wrapper">
			<div class="col-md-9 content-wrapper content-white">
				<h1 class="line">ขายสินค้าโดยตรง</h1>
				<form class="form-horizontal" role="form">
					<div class="form-group">
						<label for="inputEmail3" class="col-sm-3 control-label">ชื่อสินค้า<span class="required">*</span></label>
						<div class="col-sm-8">
							<input type="name" class="form-control" placeholder="" required>
						</div>
					</div><!--form-group-->
					<div class="form-group">
						<label for="inputEmail3" class="col-sm-3 control-label">รูปประกอบ<span class="required">*</span></label>
						<div class="col-sm-8">
							<input type="file" class="form-control">
						</div>
					</div><!--form-group-->
					<div class="form-group">
						<label for="inputEmail3" class="col-sm-3 control-label">จำนวนสินค้า<span class="required">*</span></label>
						<div class="col-sm-3">
							<input type="text" class="form-control">
						</div>
						<label for="inputEmail3" class="col-sm-2 control-label">ราคา<span class="required">*</span></label>
						<div class="col-sm-3">
							<div class="input-group">
								<input type="number" class="form-control">
								<span class="input-group-addon">บาท</span>
							</div>
						</div>
					</div><!--form-group-->
					<div class="form-group">
						<label for="inputEmail3" class="col-sm-3 control-label">ยี่ห้อ</label>
						<div class="col-sm-3">
							<input type="text" class="form-control">
						</div>
						<label for="inputEmail3" class="col-sm-2 control-label">รุ่น</label>
						<div class="col-sm-3">
							<input type="text" class="form-control">
						</div>
					</div><!--form-group-->
					<div class="form-group">
						<label for="inputEmail3" class="col-sm-3 control-label">ความจุ</label>
						<div class="col-sm-3">
							<input type="text" class="form-control">
						</div>
						<label for="inputEmail3" class="col-sm-2 control-label">ขนาด</label>
						<div class="col-sm-3">
							<input type="text" class="form-control">
						</div>
					</div><!--form-group-->
					<div class="form-group">
						<label for="inputEmail3" class="col-sm-3 control-label">สภาพสินค้า</label>
						<div class="col-sm-3">
							<input type="text" class="form-control">
						</div>
						<label for="inputEmail3" class="col-sm-2 control-label">จุดบกพร่อง</label>
						<div class="col-sm-3">
							<input type="text" class="form-control">
						</div>
					</div><!--form-group-->
					<div class="form-group">
						<label for="inputEmail3" class="col-sm-3 control-label">คุณสมบัติ<span class="required">*</span></label>
						<div class="col-sm-8">
							<textarea name="" id="" cols="30" rows="4" class="form-control"></textarea>
						</div>
					</div><!--form-group-->
					<div class="form-group">
						<label for="inputEmail3" class="col-sm-3 control-label">นโยบายการรับสินค้าคืน</label>
						<div class="col-sm-8">
							<textarea name="" id="" cols="30" rows="4" class="form-control"></textarea>
						</div>
					</div><!--form-group-->
					<div class="form-group">
						<label for="inputEmail3" class="col-sm-3 control-label">วิธีบรรจุหีบห่อ การขนส่ง และการยืนยันการจัดส่ง</label>
						<div class="col-sm-8">
							<textarea name="" id="" cols="30" rows="4" class="form-control"></textarea>
						</div>
					</div><!--form-group-->
					<div class="form-group">
						<label for="inputEmail3" class="col-sm-3 control-label">บริการพิเศษ และอื่นๆ</label>
						<div class="col-sm-8">
							<textarea name="" id="" cols="30" rows="4" class="form-control"></textarea>
						</div>
					</div><!--form-group-->
					<div class="form-group">
						<label for="inputEmail3" class="col-sm-3 control-label">ค่าธรรมเนียมการส่งสินค้าคืน</label>
						<div class="col-sm-3">
							<div class="input-group">
								<input type="number" class="form-control">
								<span class="input-group-addon">บาท</span>
							</div>
						</div>
						<label for="inputEmail3" class="col-sm-2 control-label">ภาษี</label>
						<div class="col-sm-3">
							<div class="input-group">
								<input type="number" class="form-control">
								<span class="input-group-addon">%</span>
							</div>
						</div>
					</div><!--form-group-->
					<div class="form-group">
						<div class="col-sm-offset-3 col-sm-8">
							<button type="submit" class="btn btn-primary">ลงสินค้า</button>
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