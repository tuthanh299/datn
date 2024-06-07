@extends('admin.layouts.admin') @section('title')
    <title>Sửa Vai Trò</title>
    @endsection @section('content')
@section('css')
    <link rel="stylesheet" href="{{ asset('/admins/css/style.css') }}">
@endsection
@section('js')
    <script src="{{ asset('/admins/js/app.js') }}"></script>
@endsection
<div class="content-wrapper">

    @include('admin.partials.content-header', ['name' => 'Vai Trò', 'key' => '/ Sửa'])

    <div class="content role-style">
        <div class="container-fluid">
            <div class="row">
                <form action="{{ route('roles.update', ['id' => $role->id]) }}" method="POST"
                    enctype="multipart/form-data" class="w-100">
                    @csrf
                    <div class="card-footer text-sm sticky-top">
                        <button type="submit" class="btn btn-primary">Lưu</button>
                    </div>
                    <div class="col-12">
                        <div class="form-role-left ">
                            <div class="card card-primary card-outline text-sm">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        Nội dung vai trò
                                    </h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                                class="fas fa-minus"></i></button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Tên vai trò</label>
                                        <input type="text" class="form-control" name="name"
                                            placeholder="Nhập tên vai trò" value="{{ $role->name }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Mô tả vai trò</label>
                                        <textarea name="display_name" class="form-control   rows="4">{{ $role->display_name }}</textarea>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="row">
                            <div class="col-12">
                                <label for="">
                                    <input type="checkbox" value="" name=" " id=""
                                        class="checkbox_all">
                                    Chọn tất cả
                                </label>
                            </div>
                            @foreach ($permissionsParent as $permissionsParentItem)
                                <div class="checkbox-role card border-primary mb-3 col-md-3">
                                    <div class="card-header card-header-role">
                                        <label for="">
                                            <input type="checkbox" value="{{ $permissionsParentItem->id }}"
                                                name=" " id="" class="checkbox_parent">
                                        </label>
                                        Module {{ $permissionsParentItem->name }}
                                    </div>
                                    <div class="row">
                                        @foreach ($permissionsParentItem->PermissionChildren as $permissionsChildrenItem)
                                            <div class="card-body text-primary col-md-12">
                                                <h5 class="card-title">
                                                    <label for="">
                                                        <input type="checkbox"
                                                            value="{{ $permissionsChildrenItem->id }}"
                                                            name="permission_id[]"
                                                            {{ $permissionsChecked->contains('id', $permissionsChildrenItem->id) ? 'checked' : '' }}
                                                            id="" class="checkbox_children">
                                                    </label>
                                                    {{ $permissionsChildrenItem->name }}
                                                </h5>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Lưu</button>
                </form>
            </div>


        </div>

    </div>

</div>


@endsection
