@extends('layouts.admin') @section('title')
    <title>Thêm Nhân Viên</title>
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

    @include('partials.content-header', ['name' => 'Danh Sách Nhân Viên', 'key' => ' /Thêm'])

    <div class="content">
        <div class="container-fluid">
            <div class="row">

                <div class="col-md-6">
                    <form action="{{ route('users.store') }}  " method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Tên Nhân Viên</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                name="name" placeholder="Nhập tên nhân viên" value="{{ old('name') }}">
                        </div>
                        <div class="form-group">
                            <label>Số Điện Thoại</label>
                            <input type="text" class="form-control @error('phone') is-invalid @enderror"
                                name="phone" placeholder="Nhập số điện thoại" value="{{ old('phone') }}">
                        </div>
                        <div class="form-group">
                            <label>Địa Chỉ</label>
                            <input type="text" class="form-control @error('address') is-invalid @enderror"
                                name="address" placeholder="Nhập địa chỉ" value="{{ old('address') }}">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" class="form-control @error('email') is-invalid @enderror"
                                name="email" placeholder="Nhập email" value="{{ old('email') }}">
                        </div>
                        <div class="form-group">
                            <label>Mật khẩu</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror"
                                name="password" placeholder="Nhập mật khẩu">
                        </div>
                        <div class="form-group">
                            <label>Vai Trò</label>

                            <select name="role_id[]" id="" class="form-control select2_option" multiple>
                                <option value="">Admin </option>
                                @foreach ($roles as $role)
                                    <option value="{{ $role->id }}">{{ $role->name }}</option>
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
