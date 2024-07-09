@extends('client.layouts.index')

@section('title')
    <title>Đổi mật khẩu</title>
@endsection

@section('content')
<div class="wrap-content">
    <div class="title-main">
        <span>
            Đổi mật khẩu
        </span>
    </div>
    <div class="content-main">
        <div class="form-add-top row">
            <div class="return">
                @if ($message = Session::get('success'))
                    <div>
                        <div style="color: #12c300;
                font-size: 1.2em;font-weight: bold;">
                            {{ $message }}</div>
                    </div>
                @endif
                @if ($message = Session::get('fail'))
                    <div>
                        <div style="color: #dd0505;
                font-size: 1.2em;font-weight: bold;">
                            {{ $message }}</div>
                    </div>
                @endif
            </div>
            <div class="col-md-3">
                <h4 class=""><a href="{{ route('user.order') }}">Lịch sử mua hàng</a></h4>
                <h4 class=""><a href="{{ route('user.changepassword') }}">Đổi mật khẩu</a></h4>
            </div>
            <div class="col-md-9">
                <form action="{{route('user.changepassword.update')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for>Mật khẩu hiện tại: </label>
                        <input type="password" class="form-control text-sm"
                            id="current_password" name="current_password"
                            value=""
                            placeholder="Nhập mật khẩu hiện tại">
                        <i class="far fa-eye matkhau" id="togglePassword"></i>
                    </div>
                    <div class="form-group">
                        <label for>Mật khẩu mới: </label>
                        <input type="password" class="form-control text-sm"
                            id="new_password" name="new_password"
                            value=""
                            placeholder="Nhập mật khẩu hiện tại">
                        <i class="far fa-eye matkhau" id="togglePassword"></i>
                    </div>
                    <div class="form-group">
                        <label for>Xác nhận mật khẩu mới: </label>
                        <input type="password" class="form-control text-sm"
                            id="new_password_confirm" name="new_password_confirm"
                            value=""
                            placeholder="Nhập mật khẩu hiện tại">
                        <i class="far fa-eye matkhau" id="togglePassword"></i>
                    </div>
                    <button type="submit" class="btn btn-primary">Đổi mật khẩu</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection