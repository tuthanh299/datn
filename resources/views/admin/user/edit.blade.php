@extends('layouts.admin') @section('title')
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

    @include('partials.content-header', ['name' => 'Danh Sách Nhân Viên', 'key' => ' /Nhân Viên'])

    <div class="content">
        <div class="container-fluid">
            <div class="row">

                <div class="col-md-6">
                    <form action="{{ route('users.update', ['id' => $user->id]) }}  " method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Tên Nhân Viên</label>
                            <input type="text" class="form-control"  name=" name" placeholder="Nhập tên nhân viên"
                                value="{{ $user->name }}">
                        </div>
                        <div class="form-group">
                            <label>Số Điện Thoại</label>
                            <input type="text" class="form-control"  name="phone" placeholder="Nhập số điện thoại"
                                value="{{ $user->phone }}">
                        </div>
                        <div class="form-group">
                            <label>Địa Chỉ</label>
                            <input type="text" class="form-control"  name="address" placeholder="Nhập địa chỉ"
                                value="{{ $user->address }}">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" class="form-control"   name=" email" placeholder="Nhập email"
                                value="{{ $user->email }}">
                        </div>
                        <div class="form-group">
                            <label>Mật Khẩu</label>
                            <input type="password" class="form-control"
                                name=" password"
                                placeholder="Nhập mật khẩu">
                        </div>
                        <div class="form-group">
                            <label>Vai Trò</label>
                            <select name="role_id[]" id="" class="form-control select2_option" multiple>
                                <option value=""> </option>
                                @foreach ($roles as $role)
                                    <option {{ $roleUser->contains('id', $role->id) ? 'selected' : '' }}
                                        value="{{ $role->id }}"> {{ $role->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
