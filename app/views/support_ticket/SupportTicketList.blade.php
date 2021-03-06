@extends('layouts.master', ['title' => 'ปัญหาที่เคยร้องเรียน'])
@section('content')
			@include('layouts.error')
			<h1 class="line">ปัญหาที่เคยร้องเรียน</h1>
			@if(count($support_tickets)==0)
			<h3>ท่านยังไม่เคยร้องเรียนปัญหา</h3>
			@else
				<form role="form">	
					<div class="thread">
						@foreach ($support_tickets as $support_ticket)
							<div class="row topic">
								<div class="col-xs-1">
									@if(is_null($support_ticket->administratorId))
										<i class="pending glyphicon glyphicon-time"></i>
									@else
										<i class="thumb-up glyphicon glyphicon-ok"></i>
									@endif
								</div>
								<div class="col-xs-11">
									<div class="row">
										<div class="col-sm-8">
											<h4>{{ link_to("/supporttickets/show/$support_ticket->id",$support_ticket->title) }}</h4>
											<p class="info">
												<a href="{{URL::to('user/'.$support_ticket->reporterId)}}" class="name"><strong>{{$support_ticket->reporter->username}}</strong></a>
												<span class="name">ร้องเรียน</span>
												<a href="{{URL::to('user/'.$support_ticket->reporteeId)}}" class="name"><strong>{{$support_ticket->reportee->username}}</strong></a>
												<span class="date">{{$support_ticket->created_at}}</span>
											</p>
										</div>
										<!-- /.col-sm-9 -->
										<div class="col-sm-4 text-right">
											<a href="supporttickets/show/{{$support_ticket->id}}" class="btn btn-info">ดูรายละเอียด</a>
										</div>
										<!-- /.col-sm-3 -->
									</div>
									<!-- /.row -->
								</div>
							</div><!--topic-->
							<hr class="topic-line">
						@endforeach	
						</div><!--thread-->
			@endif
@stop
@section('sidebar')
				<h3>คำเตือน</h3>
				<div class="box small-text">
					<p>หากท่านได้รับ e-mail ติดต่อเข้ามาแบบแปลกๆ จากชาวต่างชาติ โดยส่วนใหญ่อาจเป็นไนจีเรีย ยูเครน หรือมาเลเซีย ให้ท่านระวังไว้ว่าอาจจะเป็นแก๊งค์มิจฉาชีพ โดยสินค้าส่วนใหญ่ที่เป็นกลุ่มเป้าหมายของมิจฉาชีพจะเป็นสินค้าไอที เช่น กล้องถ่ายรูป notebook โทรศัพท์มือถือ หรืออาจจะเป็นรถยนต์</p>
				</div>
				<h3>ข้อร้องเรียนอื่นๆ</h3>
				<div class="list-group">
					
				@for ($i = 0; $i < 5 && $i < count($support_tickets); $i++)
					<a href="{{ URL::to('supporttickets/show/'.$support_tickets[$i]->id) }}" class="list-group-item">{{$support_tickets[$i]->title}}</a>
				@endfor
				<a href="{{ URL::to('supporttickets') }}" class="list-group-item"><strong>ดูทั้งหมด</strong></a>
				</div>
				
			</div><!--sidebar-->
			</form>
		</div><!--row-->
@stop