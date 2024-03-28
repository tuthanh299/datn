<!DOCTYPE html>
<html lang="en">
@include ('index_partials.head') 
<body> 
    <nav class="navbar navbar-light navbar-expand-lg mb-5" style="background-color: #e3f2fd;">
        <div class="container">
            <a class="navbar-brand mr-auto" href="#">Dedicated Dragon BookStore</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">

                <ul class="navbar-nav">
                    @guest

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('dangnhap') }}">Đăng nhập</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('dangki') }}">Đăng Ký</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('index') }}">Trang chủ</a>
                    </li> 
                    @else 
                    <li class="nav-item">
                        <a class="nav-link" href="#">Đăng Xuất</a>
                    </li> 
                    @endguest
                </ul>  
            </div>
        </div>
    </nav>
    <div class="container mt-5">
<!-- Đăng ký -->
<div class="wrap-user">
    <div class="return">
        @if ($message = Session::get('success'))
            <div>
                <div style="color: #12c300;
            font-size: 1.2em;font-weight: bold;">{{ $message }}</div>
            </div>
        @endif
        @if ($message = Session::get('fail'))
            <div>
                <div style="color: #dd0505;
            font-size: 1.2em;font-weight: bold;">{{ $message }}</div>
            </div>
        @endif
    </div>
        <div class="title-user">
            <span>Đăng ký</span>
        </div>
        <form class="form-user validation-user" novalidate="" method="post" action="{{route('check_register')}}" enctype="multipart/form-data">
            @csrf
            <label>Họ tên</label>
            <div class="input-group input-user">
                <div class="input-group-prepend">
                    <div class="input-group-text"><i class="fa fa-user"></i></div>
                </div>
                <input type="text" class="form-control text-sm" id="fullname" name="fullname" placeholder="Nhập họ tên của bạn" value="" required="">
            <div class="invalid-feedback">Vui lòng nhập họ và tên</div>
            </div>
            @error('fullname')
                <p class="">{{ $message }}</p>
            @enderror
            <!--<label>Tài khoản</label>
            <div class="input-group input-user">
                <div class="input-group-prepend">
                    <div class="input-group-text"><i class="fa fa-user"></i></div>
                </div>
                <input type="text" class="form-control text-sm" id="username" name="username" placeholder="Nhập tài khoản của bạn" value="" required="">
            <div class="invalid-feedback">Vui lòng nhập tài khoản</div>
            </div>-->
            <label>Mật khẩu</label>
            <div class="input-group input-user">
                <div class="input-group-prepend">
                    <div class="input-group-text"><i class="fa fa-lock"></i></div>
                </div>
                <input type="password" class="form-control text-sm" id="password" name="password" placeholder="Nhập mật khẩu (trên 8 kí tự)" required="">
            <div class="invalid-feedback">Vui lòng nhập mật khẩu</div>
            </div>
            @error('password')
                <p class="">{{ $message }}</p>
            @enderror
            <label>Nhập lại mật khẩu</label>
            <div class="input-group input-user">
                <div class="input-group-prepend">
                    <div class="input-group-text"><i class="fa fa-lock"></i></div>
                </div>
                <input type="password" class="form-control text-sm" id="repassword" name="repassword" placeholder="Nhập lại mật khẩu" required="">
            <div class="invalid-feedback">Vui lòng nhập lại mật khẩu</div>
            </div>
            @error('repassword')
                <p class="">{{ $message }}</p>
            @enderror
            <label>Email</label>
            <div class="input-group input-user">
                <div class="input-group-prepend">
                    <div class="input-group-text"><i class="fa fa-envelope"></i></div>
                </div>
                <input type="email" class="form-control text-sm" id="email" name="email" placeholder="Nhập địa chỉ email của bạn" value="" required="">
            <div class="invalid-feedback">Vui lòng nhập địa chỉ email</div>
            </div>
            @error('email')
                <p class="">{{ $message }}</p>
            @enderror
            <label>Điện thoại</label>
            <div class="input-group input-user">
                <div class="input-group-prepend">
                    <div class="input-group-text"><i class="fa fa-phone-square"></i></div>
                </div>
                <input type="number" class="form-control text-sm" id="phone" name="phone" placeholder="Nhập số điện thoại" value="" required="">
            <div class="invalid-feedback">Vui lòng nhập số điện thoại</div>
            </div>
            @error('phone')
                <p class="">{{ $message }}</p>
            @enderror
            <label>Địa chỉ</label>
            <div class="input-group input-user">
                <div class="input-group-prepend">
                    <div class="input-group-text"><i class="fa fa-map"></i></div>
                </div>
                <input type="text" class="form-control text-sm" id="address" name="address" placeholder="Nhập địa chỉ của bạn" value="" required="">
            <div class="invalid-feedback">Vui lòng nhập địa chỉ</div>
            </div>
            <div class="button-user">
                <input type="submit" class="btn btn-primary btn-block" name="check-register" value="Đăng ký">
            </div>
        </form>
        <div class="fb-google-btn">
            <a href="#" class="fb-google-btn--fb btn btn--size-s btn--with-icon">
                <i class=" fb-google-btn-icon fa-brands fa-square-facebook"></i>
                <span class="fb-google-btn-title">Kết nối với Facebook</span>
            </a>
            <a href="#" class="fb-google-btn--gg btn btn--size-s btn--with-icon">
                <i class="fb-google-btn-icon fa-brands fa-google"></i>
                <span class="fb-google-btn-title">Kết nối với Google</span>

            </a>
        </div>
    </div>
    
        <!-- <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">Đăng Ký</div>
                    <div class="card-body">
                        <form action="#" method="POST">
                            @csrf
                            <div class="form-group mb-3">
                                <input type="text" name="name" class="form-control" placeholder="Tên" />
                                @if($errors->has('name'))
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                            <div class="form-group mb-3">
                                <input type="text" name="email" class="form-control" placeholder="Địa chỉ email" />
                                @if($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                            <div class="form-group mb-3">
                                <input type="password" name="password" class="form-control" placeholder="Mật khẩu" />
                                @if($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                            @endif
                        </div>
                        <div class="fb-google-btn">
                            <a href="" class="fb-google-btn--fb btn btn--size-s btn--with-icon">
                                <i class=" fb-google-btn-icon fa-brands fa-square-facebook"></i>
                                <span class="fb-google-btn-title">Kết nối với Facebook</span>
                            </a>
                            <a href="" class="fb-google-btn--gg btn btn--size-s btn--with-icon">
                                <i class="fb-google-btn-icon fa-brands fa-google"></i>
                                <span class="fb-google-btn-title">Kết nối với Google</span>
            
                            </a>
                        </div>
                        <div class="d-grid mx-auto">
                            <button type="submit" class="btn btn-dark btn-block">Đăng Ký</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>

        </div> -->
        
        



        
    </div>
    
     
     
    
</body>
<script>
    $('.owl-product').owlCarousel({
        loop: true,
        margin: 10,
        nav: false,
        responsive: {
            0: {
                items: 4
            },
        }
    })
</script>
<script>
    //<![QUANTITYPICK[
    $('input.input-qty').each(function () {
        var $this = $(this),
            qty = $this.parent().find('.is-form'),
            min = Number($this.attr('min')),
            max = Number($this.attr('max'))
        if (min == 0) {
            var d = 0
        } else d = min
        $(qty).on('click', function () {
            if ($(this).hasClass('minus')) {
                if (d > min) d += -1
            } else if ($(this).hasClass('plus')) {
                var x = Number($this.val()) + 1
                if (x <= max) d += 1
            }
            $this.attr('value', d).val(d)
        })
    })
//]]>
</script>

</html>