@extends('layouts.master', ['title' => 'จัดการข้อร้องเรียน'])
@section('content')
			<form role="form" method="POST" action="{{ URL::to('supporttickets/show/'.$support_ticket->id) }}">
				<div class="thread">
						<div class="row topic">
							<div class="col-xs-1">
								@if(is_null($support_ticket->administratorId))
									<i class="pending glyphicon glyphicon-time"></i>
								@else
									<i class="thumb-up glyphicon glyphicon-ok"></i>
								@endif
							</div>
							<div class="col-xs-11">
								<h4>{{$support_ticket->title}}</h4>
								<p class="info">
									<a href="member_profile.php" class="name"><strong>{{$support_ticket->reporter}}</strong></a>
									<span class="name">ร้องเรียน</span>
									<a href="member_profile.php" class="name"><strong>{{$support_ticket->reportee}}</strong></a>
									<span class="date">{{$support_ticket->created_at}}</span>
								</p>
							</div>
						</div><!--topic-->
						<hr class="topic-line">
						<div class="context">
								<p>{{$support_ticket->content}}</p>
								<p>&nbsp;</p>
								@if($support_ticket->administratorId != null)
									<h4>ข้อความจากผู้ดูแลระบบ</h4>
									<p>{{$support_ticket->answer}}</p>
									<p>answered at : {{$support_ticket->answered_at}}</p>
									<p>by : {{$support_ticket->administrator}}</p>
								@endif
								@if(is_admin())
									<div class="form-group">
										<label for="content">ตอบข้อร้องเรียน</label>
										<textarea name="content" class="form-control" id="" cols="30" rows="5"></textarea>
									</div>
									<button type="submit" class="btn btn-primary">ตอบ</button>
								@endif
						</div><!--context-->
					</div><!--thread-->
@stop
@section('sidebar')
				<h3>ข้อร้องเรียนอื่นๆ</h3>
				<div class="list-group">
				@foreach ($support_tickets as $support_ticket)
					<a href="{{$support_ticket->id}}" class="list-group-item">{{$support_ticket->title}}</a>
				@endforeach
				<a href="{{ URL::to('supporttickets') }}" class="list-group-item"><strong>ดูทั้งหมด</strong></a>
				</div>
			</form>
@stop