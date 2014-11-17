@extends('layouts.master', ['title' => 'จัดการข้อร้องเรียน'])
@section('content')
			<form role="form">	
				<div class="thread">
					@foreach ($support_tickets as $support_ticket)
						<div class="row topic">
							<div class="col-xs-1">
								<i class="pending glyphicon glyphicon-time"></i>
							</div>
							<div class="col-xs-11">
								<div class="row">
									<div class="col-sm-8">
										<h4>{{ link_to("/supporttickets/show/$support_ticket->id",$support_ticket->title) }}</h4>
										<p class="info">
											<a href="member_profile.php" class="name"><strong>{{$support_ticket->reporter}}</strong></a>
											<span class="name">ร้องเรียน</span>
											<a href="member_profile.php" class="name"><strong>{{$support_ticket->reportee}}</strong></a>
											<span class="date">{{$support_ticket->created_at}}</span>
										</p>
									</div>
									<!-- /.col-sm-9 -->
									<div class="col-sm-4 text-right">
										<a href="report-manage.php" class="btn btn-info">ดูรายละเอียด</a>
									</div>
									<!-- /.col-sm-3 -->
								</div>
								<!-- /.row -->
							</div>
						</div><!--topic-->
						<hr class="topic-line">
					@endforeach	
					</div><!--thread-->
@stop
@section('sidebar')
				<h3>คำเตือน</h3>
				<div class="box small-text">
					<p>หากท่านได้รับ e-mail ติดต่อเข้ามาแบบแปลกๆ จากชาวต่างชาติ โดยส่วนใหญ่อาจเป็นไนจีเรีย ยูเครน หรือมาเลเซีย ให้ท่านระวังไว้ว่าอาจจะเป็นแก๊งค์มิจฉาชีพ โดยสินค้าส่วนใหญ่ที่เป็นกลุ่มเป้าหมายของมิจฉาชีพจะเป็นสินค้าไอที เช่น กล้องถ่ายรูป notebook โทรศัพท์มือถือ หรืออาจจะเป็นรถยนต์</p>
				</div>
				<h3>ข้อร้องเรียนอื่นๆ</h3>
				<div class="list-group">
				@foreach ($support_tickets as $support_ticket)
					<a href="supporttickets/show/{{$support_ticket->id}}" class="list-group-item">{{$support_ticket->title}}</a>
				@endforeach
				<a href="supporttickets" class="list-group-item"><strong>ดูทั้งหมด</strong></a>
				</div>

			</div><!--sidebar-->
			</form>
		</div><!--row-->
@stop