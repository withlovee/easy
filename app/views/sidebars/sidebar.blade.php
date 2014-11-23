<h3>ค้นหาสินค้า</h3>
<div class="search">
	<form action="{{ URL::to('/') }}">
	<div class="input-group">
		<input type="text" name="search" class="form-control">
		<span class="input-group-btn">
			<button class="btn btn-primary" type="submit">ค้นหา</button>
		</span>
	</div><!-- /input-group -->
	</form>
</div>
<!-- /.box -->

@if(Auth::check())
<h3>เมนูของฉัน</h3>
<div class="list-group">
	{{ HTML::link('users/profile', 'แก้ไขข้อมูลส่วนตัว', ['class' => 'list-group-item']) }}
	{{ HTML::link('users/show/'.Auth::user()->id, 'ดู Feedback', ['class' => 'list-group-item']) }}
	{{ HTML::link('transactions', 'ดูประวัติการซื้อขาย', ['class' => 'list-group-item']) }}
	{{ HTML::link('supporttickets/create', 'ร้องเรียนปัญหา', ['class' => 'list-group-item']) }}
</div>
@endif

@include('sidebars.ads')