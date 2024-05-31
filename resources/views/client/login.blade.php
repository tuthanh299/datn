<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Đăng nhập</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		<!-- MATERIAL DESIGN ICONIC FONT -->
		<link rel="stylesheet" href="{{asset('index/css/material-design-iconic-font.min.css')}}">

		<!-- STYLE CSS -->
		<link rel="stylesheet" href="{{asset('index/css/style1.css')}}">
	</head>

	<body>

		<div class="wrapper" style="background-image">
			<div class="inner">
				<form action="{{route('client.postlogin')}}" method="POST">
					@csrf
					<h3>Đăng nhập</h3>
					<div class="form-wrapper">
						<input type="text" placeholder="Email" class="form-control" id="email" name="email">
						<i class="zmdi zmdi-email"></i>
					</div>
					@error('email')
						<div style="color: #dd0505;
						font-size: 1em;font-weight: bold;">{{ $message }}</div>
					@enderror
					<div class="form-wrapper">
						<input type="password" placeholder="Mật khẩu" class="form-control" id="password" name="password">
						<i class="zmdi zmdi-lock"></i>
					</div>
					@error('password')
						<div style="color: #dd0505;
						font-size: 1em;font-weight: bold;">{{ $message }}</div>
					@enderror
					<input type="submit" class="btn1" value="Đăng nhập">
					<!--<button class="btn1">Đăng nhập
						<i class="zmdi zmdi-arrow-right"></i>
					</button>-->
					@if ($message = Session::get('fail'))
						<div>
							<div style="color: #dd0505;
						font-size: 1.2em;font-weight: bold;">{{ $message }}</div>
						</div>
            		@endif
				</form>
			</div>
		</div>
		
	</body>
</html>