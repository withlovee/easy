<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>{{ $title }}</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	{{ HTML::style('css/bootstrap.css'); }}
	{{ HTML::style('css/animate.min.css'); }}
	<link rel="stylesheet/less" type="text/css" href="{{ URL::asset('css/style.less'); }}" />
	{{ HTML::script('js/jquery.min.js'); }}
	{{ HTML::script('js/bootstrap.min.js'); }}
	{{ HTML::script('js/less.js'); }}
	{{ HTML::script('js/wow.min.js'); }}
	<script>
		new WOW().init();
	</script>
	<!--[if lt IE 9]>
		{{ HTML::script('js/html5shiv.js'); }}
		{{ HTML::script('js/respond.min.js'); }}
	<![endif]-->
</head>
<body>

<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
	<div class="container-fluid">
	<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
		<a class="navbar-brand wow bounceInDown" href="{{ URL::to('/') }}" style="padding: 4px 15px;">
			{{ HTML::image('img/logo.png', 'EASY') }}
		</a>
	</div>

	<!-- Collect the nav links, forms, and other content for toggling -->
	<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		<ul class="nav navbar-nav wow fadeInRight" data-wow-delay="0.5s">
			<li>{{ HTML::link('/', 'หน้าหลัก') }}</li>
			@if(is_buyer())
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">ซื้อสินค้า <b class="caret"></b></a>
				<ul class="dropdown-menu">
					<li><a href="{{URL::to('?show=all')}}">ทั้งหมด</a></li>
					<li><a href="{{URL::to('?show=auction')}}">สินค้าประมูล</a></li>
					<li><a href="{{URL::to('?show=direct')}}">สินค้าขายโดยตรง</a></li>
				</ul>
			</li>
			@elseif(is_seller())
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">ขายสินค้าใหม่ <b class="caret"></b></a>
				<ul class="dropdown-menu">
					<li><a href="{{URL::to('sellAuctionItem')}}">สินค้าประมูล</a></li>
					<li><a href="{{URL::to('sellDirectItem')}}">สินค้าขายโดยตรง</a></li>
				</ul>
			</li>
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">สินค้าของฉัน <b class="caret"></b></a>
				<ul class="dropdown-menu">
					<li><a href="{{URL::to('listItemSeller?show=all')}}">ทั้งหมด</a></li>
					<li><a href="{{URL::to('listItemSeller?show=auction')}}">สินค้าประมูล</a></li>
					<li><a href="{{URL::to('listItemSeller?show=direct')}}">สินค้าขายโดยตรง</a></li>
				</ul>
			</li>
			@endif

			@if(is_admin())
			<li>{{ HTML::link('/supporttickets', 'จัดการข้อร้องเรียน') }}</li>
			@elseif(is_user())
			<!-- <li>{{ HTML::link('/supporttickets/create', 'ร้องเรียนปัญหา') }}</li> -->
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">ร้องเรียนปัญหา <b class="caret"></b></a>
				<ul class="dropdown-menu">
					<li><a href="{{URL::to('/supporttickets/create')}}">ร้องเรียนปัญหาใหม่</a></li>
					<li><a href="{{URL::to('/supporttickets')}}">ปัญหาที่เคยร้องเรียน</a></li>
				</ul>
			</li>
			@endif
		</ul>
		<ul class="nav navbar-nav navbar-right">
			@if(is_guest())
			<li>{{ HTML::link('login', 'เข้าสู่ระบบ') }}</li>
			<li>{{ HTML::link('users/create', 'สมัครสมาชิก') }}</li>
			<li>{{ HTML::link('admin/login', 'สำหรับผู้ดูแล') }}</li>
			@endif
			@if(is_user())
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">สวัสดี, {{ Auth::user()->username }} <span class="caret"></span></a>
				<ul class="dropdown-menu" role="menu">
					<li>{{ HTML::link('users/profile', 'แก้ไขข้อมูลส่วนตัว') }}</li>
					<li>{{ HTML::link('user/'.Auth::user()->id, 'ดู Feedback') }}</li>
					<li>{{ HTML::link('transactions', 'ดูประวัติการซื้อขาย') }}</li>
					<li class="divider"></li>
					<li>{{ HTML::link('users/logout', 'ออกจากระบบ') }}</li>
				</ul>
			</li>
			@endif
			@if(is_admin())
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">สวัสดี, {{ Administrator::find(get_admin())->username }} <span class="caret"></span></a>
				<ul class="dropdown-menu" role="menu">
					<li>{{ HTML::link('admin/logout', 'ออกจากระบบ') }}</li>
				</ul>
			</li>
			@endif
		</ul>
	</div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
@section('wrapper')
<div class="row wrapper">
	<div class="col-md-9 content-wrapper content-white <?php if(isset($class)) echo $class; ?>">
		@yield('content')
	</div>
	<div class="col-md-3 sidebar-wrapper" id="sidebar">
		@yield('sidebar')
	</div><!--sidebar-->
</div>
@show
</body>
</html>