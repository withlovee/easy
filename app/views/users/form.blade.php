
		<div class="form-group">
			<label for="name" class="col-sm-3 control-label">ชื่อ-นามสกุล</label>
			<div class="col-sm-4">
				{{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'ชื่อจริง', 'required' => 'required']) }}
			</div>
			<div class="col-sm-4">
				{{ Form::text('surname', null, ['class' => 'form-control', 'placeholder' => 'นามสกุล', 'required' => 'required']) }}
			</div>
		</div><!--form-group-->
		<div class="form-group">
			<label for="address" class="col-sm-3 control-label">ที่อยู่</label>
			<div class="col-sm-8">
				{{ Form::textarea('address', null, ['class' => 'form-control', 'placeholder' => 'บ้านเลขที่ ซอย 
ถนน แขวง เขต
จังหวัด รหัสไปรษณีย์', 'cols' => '30', 'rows' => '3', 'required' => 'required']) }}
			</div>
		</div><!--form-group-->
		<div class="form-group">
			<label for="country" class="col-sm-3 control-label">ประเทศ</label>
			<div class="col-sm-3">
				{{ Form::select('country', User::countryList(), null, ['class' => 'form-control', 'required' => 'required']) }}
			</div>
			<label for="telephone" class="col-sm-2 control-label">เบอร์โทรศัพท์</label>
			<div class="col-sm-3">
				{{ Form::input('tel', 'telephone', null, ['class' => 'form-control', 'placeholder' => '6681-123-1234', 'required' => 'required']) }}
			</div>
		</div><!--form-group-->
		<div class="form-group">
			<label for="email" class="col-sm-3 control-label">อีเมล์</label>
			<div class="col-sm-3">
				{{ Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'your-email@email.com', 'required' => 'required']) }}
			</div>
			<div class="col-sm-6 help-text">กรุณาใส่อีเมล์ที่ใช้งานได้จริง</div>
		</div><!--form-group-->
