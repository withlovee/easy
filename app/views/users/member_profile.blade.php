@extends('layouts.master', ['title' => 'จัดการข้อร้องเรียน'])
@section('content')
				<div class="thread">
					<div class="row topic">
						<div class="col-xs-1">
							<img src="img/avatar_test.jpg" class="img-circle">
						</div>
						<div class="col-xs-11">
							<div class="row">
								<div class="col-sm-8">
									<h4>{{ $user->name }} {{ $user->surname }} ({{ $user->username}})</h4>
									<p class="info">
										<a href="mailto:{{ $user->email}}" class="name"><strong>{{ $user->email}}</strong></a>
										<a href="edit_profile.php" class="tag yellow"><span class="glyphicon glyphicon-pencil"></span> Edit</a>
									</p>
								</div>
								<!-- /.col-sm-8 -->
							</div>
							<!-- /.row -->
						</div>
					</div><!--topic-->
				</div><!--thread-->
				<br>
				<div id="content-list">
					<div class="list">
						<div class="helper">
							<span class="text-left">
								<a name="feedback"></a>Feedback
							</span>
							<div class="clear"></div>
						</div><!--helper-->
						<hr>
						@foreach($feedbacks as $feedback)
							<div class="row topic">
								<div class="col-xs-1 text-right">
									@if ($feedback->score < 3)
										<i class="thumb-down glyphicon glyphicon-thumbs-down"></i>
									@else
										<i class="thumb-up glyphicon glyphicon-thumbs-up"></i>
									@endif
								</div>
								<div class="col-xs-10">
									<h5>{{ $feedback->content }} (score {{ $feedback->score }}) </h5>
									<p class="info">
										<a href="{{ URL::to('users/show/'.$feedback->senderId)}}" class="name"><strong>{{$feedback->sender}}</strong></a>
									</p>
								</div>
							</div><!--topic-->
							<hr>
						@endforeach
					</div>
				</div>
@stop
@section('sidebar')
				<!-- do something -->
@stop
