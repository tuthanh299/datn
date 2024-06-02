<?php
use App\Http\Controllers\Clients\IndexController;
?>

@extends('client.layouts.index')
@section('title')
    <title>{{ IndexController::settings()->name }}</title>
@endsection
@section('content')
    <div class="wrap-content">
        <div class="title-main">
            <span>
                ĐĂNG NHẬP
            </span>
        </div>
        <div class="content-main account-user">
            <form id="login-form-member" class="form" action="" method="post">
                @csrf
                <div>
                    <div class="input-group mb-2">
                        <div class="input-group-append login-input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                        <input type="email" name="email" value="{{ old('email') }}" class="form-control text-sm "
                            placeholder="Nhập email" autocomplete="off" />
                    </div>
                    <label class="emailMember-error error" for="emailMember" style=""></label>
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-append login-input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                    <input type="password" name="password" id="password" class="form-control text-sm"
                        placeholder="Nhập mật khẩu" />
                    <div class="input-group-append">
                        <div class="input-group-text show-password">
                            <span class="fas fa-eye"></span>
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
                    <input type="submit" id="remember-me" name="remember_me"
                        class="btn-lg btn btn-sm bg-danger btn-block w-100" value="Đăng Nhập">
                </div>
                <div class="no-account-text text-center">
                    <div>
                        Chưa có tài khoản? <a href="{{ route('client.register') }}">Đăng ký</a>
                    </div>
                    <div>
                        <div>Hoặc đăng nhập với: <a href="#"><i class="fa-brands fa-google"></i></a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
