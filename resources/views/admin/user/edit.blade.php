@extends('admin.layouts.admin') @section('title')
    <title>Sửa Nhân Viên</title>
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
                    <form action="{{ route('users.update', ['id' => $user->id]) }}  " method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Họ Và Tên Đệm</label>
                            <input type="text"
                                class="text-capitalize form-control @error('last_name') is-invalid @enderror"
                                name="last_name" placeholder="" value="{{ $user->last_name }}" required>
                            @error('last_name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Tên Nhân Viên</label>
                            <input type="text"
                                class="text-capitalize form-control @error('first_name') is-invalid @enderror"
                                name="first_name" placeholder="" value="{{ $user->first_name }}" required>
                            @error('first_name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Số Điện Thoại</label>
                            <input type="number" class="form-control @error('phone') is-invalid @enderror"
                                name="phone" placeholder="Nhập số điện thoại" value="{{ $user->phone }}" required>
                                @error('phone')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Địa Chỉ</label>
                            <input type="text" class="form-control @error('address') is-invalid @enderror"
                                name="address" placeholder="Nhập địa chỉ" value="{{ $user->address }}" required>

                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="text-lowercase form-control " name="email"
                                placeholder="Nhập email" value="{{ $user->email }}" readonly required>

                        </div>
                        <div class="form-group">
                            <label>Mật Khẩu</label>
                            <input type="password" class="form-control " name="password" placeholder="Nhập mật khẩu">
                        </div>
                        <div class="form-group">
                            <label>Vai Trò</label>
                            <select name="role_id[]" id="" class="form-control select2_option" multiple>
                                <option value=""> </option>
                                @foreach ($roles as $role)
                                    <option {{ $roleUser->contains('id', $role->id) ? 'selected' : '' }} class=""
                                        value="{{ $role->id }}"> {{ $role->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Lưu</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
