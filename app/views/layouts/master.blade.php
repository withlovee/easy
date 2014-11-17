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
		<a class="navbar-brand" href="{{ URL::to('/') }}" style="padding: 4px 15px;">
			{{ HTML::image('img/logo.png', 'EASY') }}
		</a>
	</div>

	<!-- Collect the nav links, forms, and other content for toggling -->
	<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		<ul class="nav navbar-nav">
			<li>{{ HTML::link('/', 'หน้าหลัก') }}</li>
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">ซื้อสินค้า <b class="caret"></b></a>
				<ul class="dropdown-menu">
					<li><a href="all.php">ทั้งหมด</a></li>
					<li><a href="all-auction.php">สินค้าประมูล</a></li>
					<li><a href="all-direct.php">สินค้าขายโดยตรง</a></li>
				</ul>
			</li>
			<li>
				<a href="{{ URL::to('supporttickets/create') }}">ร้องเรียนปัญหา</a>
			</li>
		</ul>
		@if(!Auth::check())
		<ul class="nav navbar-nav navbar-right">
			<li>{{ HTML::link('login', 'เข้าสู่ระบบ') }}</li>
			<li>{{ HTML::link('users/create', 'สมัครสมาชิก') }}</li>
		</ul>
		@else
		<ul class="nav navbar-nav navbar-right">
			@if(Auth::user()->role == 'Admin')
			<li>{{ HTML::link('users', 'Manage Users') }}</li>
			@endif
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">สวัสดี, {{ Auth::user()->username }} <span class="caret"></span></a>
				<ul class="dropdown-menu" role="menu">
					<li>{{ HTML::link('users/profile', 'แก้ไขข้อมูลส่วนตัว') }}</li>
					<li><a href="member_profile.php">ดู Feedback</a></li>
					<li><a href="transactions.php">ดูประวัติการสั่งซื้อ</a></li>
					<li class="divider"></li>
					<li>{{ HTML::link('users/logout', 'ออกจากระบบ') }}</li>
				</ul>
			</li>
		</ul>
		@endif
	</div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
@section('wrapper')
<div class="row wrapper">
	<div class="col-md-9 content-wrapper content-white">
		@yield('content')
	</div>
	<div class="col-md-3 sidebar-wrapper" id="sidebar">
		@yield('sidebar')
	</div><!--sidebar-->
</div>
@show
</body>
</html>