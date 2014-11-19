<h3>ค้นหาสินค้า</h3>
<div class="search">
	<!-- <form action="search.php"> -->
	<form role="form" method="GET" action="{{{ URL::to('/') }}}">	
		<div class="input-group">
			<input name="search" type="text" class="form-control">
			<span class="input-group-btn">
				<button class="btn btn-primary" type="submit">ค้นหา</button>
			</span>
		</div><!-- /input-group -->						
	</form>
</div>
<!-- /.box -->
<h3>ดูสินค้าอื่นๆ</h3>
<div class="list-group">
	<a href="{{ URL::to('?show=all') }}" class="list-group-item">สินค้าทั้งหมด</a>
	<a href="{{ URL::to('?show=auction') }}" class="list-group-item">สินค้าประมูลเท่านั้น</a>
	<a href="{{ URL::to('?show=direct') }}" class="list-group-item">สินค้าขายโดยตรงเท่านั้น</a>
</div>
<h3>โฆษณา</h3>
<div class="ad">
	<img src="img/390x150.gif" class="img-responsive">
	<br>
	<img src="img/390x150.gif" class="img-responsive">
</div>
<!-- /.ad -->

