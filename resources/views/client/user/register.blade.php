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
                ĐĂNG KÝ
            </span>
        </div>
        <div class="content-main account-user">
            <form id="login-form-member" class="form" action="" method="post">
                @csrf
                <div>
                    <label class="mb-1">Họ: </label>
                    <div class="input-group mb-2">
                        <div class="input-group-append login-input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                        <input type="text" id="lastname" name="lastname" class="form-control text-sm "
                            placeholder="Nhập họ tên" autocomplete="off" />
                    </div>
                </div>
                <div>
                    <label class="mb-1">Tên:</label>
                    <div class="input-group mb-2">
                        <div class="input-group-append login-input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                        <input type="text" id="firstname" name="firstname" class="form-control text-sm "
                            placeholder="Nhập họ tên" autocomplete="off" />
                    </div>
                </div>
                <div>
                    <label class="mb-1">Số điện thoại:</label>
                    <div class="input-group mb-2">
                        <div class="input-group-append login-input-group-append">
                            <div class="input-group-text">
                                <span class="fas  fa-phone"></span>
                            </div>
                        </div>
                        <input type="text" id="phone" name="phone" class="form-control text-sm "
                            placeholder="Nhập số điện thoại" autocomplete="off" />
                    </div>
                </div>
                <div>
                    <label class="mb-1">Email:</label>
                    <div class="input-group mb-2">
                        <div class="input-group-append login-input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                        <input type="text" id="email" name="email" value="{{ old('email') }}"
                            class="form-control text-sm " placeholder="Nhập email" autocomplete="off" />
                    </div>
                    <label class="emailMember-error error"   for="emailMember"
                        style=""></label>
                </div>
            
                <div>
                    <label class="mb-1">Mật khẩu:</label>
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
                </div>
                <div>
                    <label class="mb-1">Nhập lại mật khẩu:</label>
                    <div class="input-group mb-3">
                        <div class="input-group-append login-input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                        <input type="password" name="re-password" id="re-password"
                            class="form-control text-sm" placeholder="Nhập lại mật khẩu" />
                        <div class="input-group-append">
                            <div class="input-group-text show-password">
                                <span class="fas fa-eye"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-center text-lg-start mt-3 btn-login-member">
                    <input type="submit" class="btn-lg btn btn-sm bg-danger btn-block w-100"
                        value="Đăng ký">
                </div>

                <div class="no-account-text text-center">
                    <div>
                        Đã có tài khoản? <a href="{{ route('client.login') }}">Đăng nhập</a>
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
