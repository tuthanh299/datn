<html>
    <head>
        <title>Login</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="{{ asset('index/css/effect.css') }}" rel="stylesheet">
        <link href="{{ asset('index/css/animate.min.css') }}" rel="stylesheet">
        <link href="{{ asset('index/slick/slick.css') }}" rel="stylesheet">
        <link href="{{ asset('index/slick/slick-theme.css') }}" rel="stylesheet">
        <link href="{{ asset('vendors/aos/aos.css') }}" rel="stylesheet">
        <link href="{{ asset('vendors/fontawesome640/all.css') }}" rel="stylesheet">
        <link href="{{ asset('vendors/bootstrap/bootstrap.css') }}" rel="stylesheet"> 
        <link href="{{ asset('index/css/style.css') }}" rel="stylesheet">
    </head>
    <body>
        <div id="tab-login" class="tabcontent">
            <form class="form" method="post" action="{{ route('userloginpost') }}" >
                @csrf
                <div>
                    <div class="input-group mb-2">
                        <div class="input-group-append login-input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                        <input type="text" name="loginemail" id="loginemail" value=""
                            class="form-control text-sm " placeholder="Nhập email" autocomplete="off" />
                    </div>
                    <label class="emailMember-error error"  for="emailMember" style=""></label>
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-append login-input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                    <input type="password" name="loginpassword" id="loginpassword" class="form-control text-sm"
                        placeholder="Nhập mật khẩu" />
                    <div class="input-group-append">
                        <div class="input-group-text show-password">
                            <span class="password-toggle-icon"> <i class="fas fa-eye"></i></span>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-between align-items-center">
                    <div class="form-check form-check-login mb-0">
                        <label for="remember-me" class="text-info"><span>Ghi nhớ đăng nhập</span>
                            <span class="align-middle">
                                <input id="remember-me" name="remember_me" type="checkbox"></span></label><br>
                    </div>
                    <div class="form-check form-check-login mb-0">
                        <a href="">Quên mật khẩu?</a>
                    </div>
                </div>
        
                <div class="text-center text-lg-start mt-3 btn-login-member">
                    <input type="submit" id="submit" name="submit"
                        class="btn-lg btn btn-sm bg-danger btn-block w-100" value="Đăng Nhập">
                </div>
                <div>
                    @if (Session::has('login_error'))
                        <h1>lỗi</h1>
                    @endif
                </div>
                <div class="no-account-text text-center">
                    <div>
                        Chưa có tài khoản? <a onclick="openCity(event, 'tab-signup')">Đăng ký</a>
                    </div>
                    <div>
                        <div>Hoặc đăng nhập với: <a href=""><i class="fa-brands fa-google"></i></a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </body>
</html>