<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Đăng ký</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		<!-- MATERIAL DESIGN ICONIC FONT -->
		<link rel="stylesheet" href="{{asset('index/css/material-design-iconic-font.min.css')}}">

		<!-- STYLE CSS -->
		<link rel="stylesheet" href="{{asset('index/css/style1.css')}}">
	</head>

	<body>

		<div class="wrapper" style="background-image">
			<div class="inner">
				<form action="{{route('client.postregister')}}" method="POST">
					@csrf
					<h3>Đăng ký</h3>
					<div class="form-wrapper">
						<input type="text" placeholder="Họ" class="form-control" id="lastname" name="lastname">
					</div>
					@error('lastname')
						<div style="color: #dd0505;
						font-size: 1em;font-weight: bold;">{{ $message }}</div>
					@enderror
					<div class="form-wrapper">
						<input type="text" placeholder="Tên" class="form-control" id="firstname" name="firstname">
					</div>
					@error('firstname')
						<div style="color: #dd0505;
						font-size: 1em;font-weight: bold;">{{ $message }}</div>
					@enderror
					<div class="form-wrapper">
						<input type="text" placeholder="Email" class="form-control" id="email" name="email">
						<i class="zmdi zmdi-email"></i>
					</div>
					@error('email')
						<div style="color: #dd0505;
						font-size: 1em;font-weight: bold;">{{ $message }}</div>
					@enderror
					<div class="form-wrapper">
						<input type="text" placeholder="Địa chỉ" class="form-control" id="address" name="address">
					</div>
					@error('address')
						<div style="color: #dd0505;
						font-size: 1em;font-weight: bold;">{{ $message }}</div>
					@enderror
					<div class="form-wrapper">
						<input type="text" placeholder="Số điện thoại" class="form-control" id="phone" name="phone">
					</div>
					@error('phone')
						<div style="color: #dd0505;
						font-size: 1em;font-weight: bold;">{{ $message }}</div>
					@enderror
					<!--<div class="form-wrapper">
						<select name="" id="" class="form-control">
							<option value="" disabled selected>Gender</option>
							<option value="male">Male</option>
							<option value="femal">Female</option>
							<option value="other">Other</option>
						</select>
						<i class="zmdi zmdi-caret-down" style="font-size: 17px"></i>
					</div>-->
					<div class="form-wrapper">
						<input type="password" placeholder="Mật khẩu" class="form-control" id="password" name="password">
						<i class="zmdi zmdi-lock"></i>
					</div>
					@error('password')
						<div style="color: #dd0505;
						font-size: 1em;font-weight: bold;">{{ $message }}</div>
					@enderror
					<div class="form-wrapper">
						<input type="password" placeholder="Xác nhận mật khẩu" class="form-control" id="confirm-password" name="confirm-password">
						<i class="zmdi zmdi-lock"></i>
					</div>
					@error('confirm-password')
						<div style="color: #dd0505;
						font-size: 1em;font-weight: bold;">{{ $message }}</div>
					@enderror
					<input type="submit" class="btn1" value="Đăng ký">
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