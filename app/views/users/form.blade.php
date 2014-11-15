
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
                {{ Form::email('email', null, ['class' => 'form-control']) }}
            </div>
            <div class="col-sm-6 help-text">กรุณาใส่อีเมล์ที่ใช้งานได้จริง</div>
        </div><!--form-group-->
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-3 control-label">ชื่อประจำตัวผู้ใช้</label>
            <div class="col-sm-3">
                {{ Form::text('username', null, ['class' => 'form-control']) }}
            </div>
            <div class="col-sm-6 help-text">ชื่อต้องเป็นตัว a-z และ 0-9 ผสมกันยาว 6-20 ตัวอักษรเท่านั้น</div>
        </div><!--form-group-->
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-3 control-label">รหัสผ่าน</label>
            <div class="col-sm-3">
                {{ Form::password('password', ['class' => 'form-control']) }}
            </div>
            <div class="col-sm-6 help-text">รหัสผ่านต้องเป็นตัว a-z และ 0-9 ผสมกันยาว 6-20 ตัวอักษรเท่านั้น</div>
        </div><!--form-group-->
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-3 control-label" style="padding-left:0">ยืนยันรหัสผ่าน</label>
            <div class="col-sm-3">
                {{ Form::password('password_confirmation', ['class' => 'form-control']) }}
            </div>
            <div class="col-sm-6 help-text">ใส่รหัสผ่านเหมือนกับด้านบน</div>
        </div><!--form-group-->

