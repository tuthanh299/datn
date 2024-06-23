@extends('client.layouts.index')

@section('title')
    <title>Thông tin người dùng</title>
@endsection
@section('content')
<!-- Thông tin user -->
<div class="form-add-top">
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
    <div class="title-name1">Thông tin tài khoản</div>
    <div><a href="#">Lịch sử mua hàng</a></div>
    <form class="flex-user-infor" action="{{route('user.info.update')}}" method="POST">
        @csrf
        <div class="user-infor-detail">
            <div class="form-group">
                <!-- Set khi đăng nhập r thì hiện thông tin vào form sửa thì click vào r đổi thôi -->
                <!-- <input type="text" class="form-control"
                    id="username" name="username"
                    value="#"
                    placeholder="Nhập tên đăng nhập"> -->
            </div>
            <div class="form-group">
                <!-- Set khi đăng nhập r thì hiện thông tin vào form sửa thì click vào r đổi thôi -->
                <label for>Họ </label>
                <input type="text" class="form-control"
                    id="last_name" name="last_name"
                    value="{{$user->last_name}}"
                    placeholder="Nhập họ và tên">
            </div>
            <div class="form-group">
                <!-- Set khi đăng nhập r thì hiện thông tin vào form sửa thì click vào r đổi thôi -->
                <label for>Tên: </label>
                <input type="text" class="form-control"
                    id="first_name" name="first_name"
                    value="{{$user->first_name}}"
                    placeholder="Nhập họ và tên">
            </div>
            <div class="form-group">
                <label for>Email: </label>
                <input type="text" class="form-control"
                    id="email" name="email"
                    value="{{$user->email}}"
                    placeholder="Nhập email">
            </div>
            <!--<div class="form-group">
                <label for>Mật khẩu: </label>
                <input type="password" class="form-control text-sm"
                    id="id_password" name="password"
                    value="#"
                    placeholder="Nhập mật khẩu">
                <i class="far fa-eye matkhau" id="togglePassword"></i>
            </div>-->
            <div class="form-group">
                <label for>Số điện thoại: </label>
                <input type="number" class="form-control"
                    id="phone" name="phone"
                    value="{{$user->phone}}"
                    placeholder="Nhập số điện thoại">
            </div>
            {{-- <div class="form-group">
                <label for>Địa chỉ: </label>
                <input type="text" class="form-control"
                    id="address" name="address"
                    value="{{$user->address}}"
                    placeholder="Nhập địa chỉ">
            </div> --}}
            <div class="flex-btn">
                <button type="submit" class="btn btn-success">Cập nhật</button>
                <button type="submit" class="btn btn-danger">Hủy</button>
            </div>
        </div> 
    </form>
    <form action="{{route('user.info.delete')}}" method="POST">
        @csrf
        <div class="flex-btn">
            <button id="update_btn" type="submit" class="btn btn-danger">Xoá người dùng</button>
        </div>
    </form>
</div>
@endsection
@section('js')
const update_btn = document.querySelector('#btn')

update_btn.addEventListener('click', () => {
  new Notify ({
    status: 'success',
    title: 'Notify Title',
    text: 'Notify text lorem ipsum',
    effect: 'fade',
    speed: 300,
    customClass: '',
    customIcon: '',
    showIcon: true,
    showCloseButton: true,
    autoclose: true,
    autotimeout: 3000,
    notificationsGap: null,
    notificationsPadding: null,
    type: 'outline',
    position: 'right top',
    customWrapper: '',
  })
})
@endsection