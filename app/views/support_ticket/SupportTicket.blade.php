@extends('layouts.master', ['title' => 'จัดการข้อร้องเรียน'])
@section('content')
			<form role="form" method="POST" action="{{ URL::to('supporttickets/show/'.$support_ticket->id) }}">
				<div class="thread">
						<div class="row topic">
							<div class="col-xs-1">
								<img src="img/avatar_test.jpg" class="img-circle">
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
									<div class="form-group">
									@if($support_ticket->administratorId != null)
										<label for="content">ตอบ</label>
										<p>{{$support_ticket->answer}}</p>
										<p>answered at : {{$support_ticket->answered_at}}</p>
										<p>by : {{$support_ticket->administrator}}</p>
									@endif
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
				@foreach ($support_tickets as $support_ticket)
					<a href="supporttickets/show/{{$support_ticket->id}}" class="list-group-item">{{$support_ticket->title}}</a>
				@endforeach
				<a href="supportticket" class="list-group-item"><strong>ดูทั้งหมด</strong></a>
				</div>
			</form>
@stop