@extends('layouts.master', ['title' => 'ข้อมูลผู้ใช้'])
@section('content')
				<div class="thread">
					<div class="row topic">
						<div class="col-xs-1">
							@if($user->role == 'Buyer')
								{{ HTML::image('img/seller.png', 'ผู้ซื้อ') }}
							@else
								{{ HTML::image('img/buyer.png', 'ผู้ขาย') }}
							@endif
						</div>
						<div class="col-xs-11">
							<div class="row">
								<div class="col-sm-8">
									<h4>{{ $user->name }} {{ $user->surname }} ({{ $user->username}})</h4>
									<p class="info">
										<a href="mailto:{{ $user->email}}" class="name"><strong>{{ $user->email}}</strong></a>
										
										@if(is_user())
											@if( Auth::user()->id == $user->id)
												<h5>ที่อยู่ : {{$user->address}}</h5>
												<h5>ประเทศ : {{$user->country}}</h5>
												<h5>เบอร์โทร : {{$user->telephone}}</h5>
												<a href="{{ URL::to('users/profile')}}" class="tag yellow"><span class="glyphicon glyphicon-pencil">Edit</span> </a>

											@endif
										@endif
										@if(is_admin())

											@if($user->isBanned==1)
												<h5> ถูกแบน </h5>
												<a href="{{URL::to('users/unBan/'.$user->id)}}" class="tag orange"><span class="glyphicon glyphicon-remove"></span> unBan</a>
											@endif
											@if($user->isBanned==0)
												
												<a href="{{URL::to('users/ban/'.$user->id)}}" class="tag orange"><span class="glyphicon glyphicon-remove"></span> Ban</a>
											@endif
										@endif

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
						@if(count($feedbacks) == 0)
							<p>ยังไม่มี Feedback</p>
						@endif
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
