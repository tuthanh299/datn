@extends('admin.layouts.admin') @section('title')
    <title>Thêm Người Dùng</title>
    @endsection @section('content')
@section('css')
    <link href="{{ asset('vendors/select2/select2.min.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('/admins/css/style.css') }}">
@endsection
@section('js')
    <script src="{{ asset('vendors/select2/select2.min.js') }}"></script>
    <script src="{{ asset('/admins/js/app.js') }}"></script>
@endsection
<div class="content-wrapper">

 
    <div class="content">
        <div class="container-fluid pt-3">
            <div class="row">

                <div class="col-md-6">
                    <form action="{{ route('member.store') }}  " method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Họ Và Tên Đệm</label>
                            <input type="text"
                                class="text-capitalize form-control @error('last_name') is-invalid @enderror"
                                name="last_name" placeholder="Nhập Họ Và Tên Đệm" value="{{ old('last_name') }}">
                            @error('last_name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Tên Người Dùng</label>
                            <input type="text"
                                class="text-capitalize form-control @error('first_name') is-invalid @enderror"
                                name="first_name" placeholder="Nhập tên người dùng" value="{{ old('first_name') }}">
                            @error('first_name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Số Điện Thoại</label>
                            <input type="tel" pattern="^0(3[0-9]|5[6789]|7[0-89]|8[1-9]|9[1-46-9])[0-9]{7}$" title="Vui lòng điền đúng các đầu số di động hiện có ở VN (03, 05, 07, 08, 09)" minlength="10" maxlength="11" class="form-control @error('phone') is-invalid @enderror" name="phone" placeholder="Nhập số điện thoại" value="{{ old('phone') }}">
                            @error('phone')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Địa Chỉ</label>
                            <input type="text" class="form-control @error('address') is-invalid @enderror"
                                name="address" placeholder="Nhập địa chỉ" value="{{ old('address') }}">
                            @error('address')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email"
                                class="text-lowercase form-control  @error('email') is-invalid @enderror" pattern="[^ @]*@[^ @]*" name="email"
                                placeholder="Nhập email" value="{{ old('email') }}">
                            @error('email')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Mật khẩu</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror"
                                name="password" placeholder="Nhập mật khẩu">
                            @error('password')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                         
                        <button type="submit" class="btn btn-primary">Lưu</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
