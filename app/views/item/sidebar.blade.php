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
	<a href="{{ URL::to('?show=all') }}" class="list-group-item"><span class="badge">{{$item_count['all']}}</span>สินค้าทั้งหมด</a>
	<a href="{{ URL::to('?show=auction') }}" class="list-group-item"><span class="badge">{{$item_count['auction']}}</span>สินค้าประมูลเท่านั้น</a>
	<a href="{{ URL::to('?show=direct') }}" class="list-group-item"><span class="badge">{{$item_count['direct']}}</span>สินค้าขายโดยตรงเท่านั้น</a>
</div>
<h3>โฆษณา</h3>
<div class="ad">
	<a href="http://www.eng.chula.ac.th/"><img src="../img/ChulaEngineering.png" class="img-responsive"></a>
	<br>
	<a href="https://www.facebook.com/plkumjorn"><img src="../img/tutortui.PNG" class="img-responsive"></a>
	<br>
	<a href="https://www.facebook.com/plkumjorn"><img src="../img/quaneat.PNG" class="img-responsive"></a>
</div>
<!-- /.ad -->

