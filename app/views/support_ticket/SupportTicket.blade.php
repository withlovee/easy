@extends('layouts.master', ['title' => 'จัดการข้อร้องเรียน'])
@section('content')
			<form role="form">
				<div class="thread">
						<div class="row topic">
							<div class="col-xs-1">
								<img src="img/avatar_test.jpg" class="img-circle">
							</div>
							<div class="col-xs-11">
								<h4>โดนโกงกระเป๋า</h4>
								<p class="info">
									<a href="member_profile.php" class="name"><strong>veevee</strong></a>
									<span class="name">ร้องเรียน</span>
									<a href="member_profile.php" class="name"><strong>cppanida</strong></a>
									<span class="date">14 Dec 13, 15:35</span>
								</p>
							</div>
						</div><!--topic-->
						<hr class="topic-line">
						<div class="context">
								<p>เหตุเกิดเมื่อวันที่  17 ตุลาคม 2556 ดิฉันได้มีการตกลงสั่งซื้อกระเป๋า LV โดยผู้ขายสินค้าใช้ชื่อว่า เดือนเพ็ญ โดยจ่ายเงินด้วยบัตรเครดิตธนาคารกรุงเทพเป็นจำนวนเงิน 50,000 บาท  หลังจากจ่ายงิน คนร้ายก้อได้มีการออกใบเสร็จหลังจากได้รับเงินส่งกลับมาให้ด้วย และยังได้มีการโทรคุยกันเพื่อนัดเวลาและสถานที่รับสินค้าในวันที่ 20 ตุลาคม 2556  เวลา 10.30 น.</p>
								<p>เมื่อถึงวันนัดรับสินค้าคนร้ายก็ได้หายตัวเข้ากลีบเมฆ และปิดมือถือ หมายเลข 084-9715853 ซึ่งดิฉันได้เอะใจ และลองเปิดเฟสหน้าร้านใน Facebook ตอนนั้นทันที  ปรากฎว่าเฟสหน้าร้านปิดตัวไปเเล้ว และขณะเดียวกันคนร้ายก้อลบกระทู้ขายใน Pantip Market ไปด้วย</p>
								<p>&nbsp;</p>
								<div class="form-group">
									<label for="content">ตอบข้อร้องเรียน</label>
									<textarea name="content" class="form-control" id="" cols="30" rows="5"></textarea>
								</div>
								<button type="submit" class="btn btn-primary">ตอบ</button>
						</div><!--context-->
					</div><!--thread-->
@stop
@section('sidebar')
				<h3>ข้อร้องเรียนอื่นๆ</h3>
				<div class="list-group">
					<a href="edit_profile.php" class="list-group-item">ยังไม่เสร็จ</a>
					<a href="member_profile.php" class="list-group-item">ยังไม่เสร็จ</a>
					<a href="transactions.php" class="list-group-item">Under Construction</a>
					<a href="report.php" class="list-group-item">สินค้าชำรุดแล้วแม่ค้าไม่รับผิดชอบ</a>
					<a href="member_profile.php" class="list-group-item">รอสินค้ามาเดือนนึงแล้วยังไม่ได้</a>
					<a href="transactions.php" class="list-group-item">คนขายบอกว่าผมยังไม่จ่ายเงิน</a>
					<a href="report.php" class="list-group-item">สินค้าชำรุดแล้วแม่ค้าไม่รับผิดชอบ</a>
					<a href="reports.php" class="list-group-item"><strong>ดูทั้งหมด</strong></a>
				</div>
			</form>
@stop