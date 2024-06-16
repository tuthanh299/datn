@extends('admin.layouts.admin') @section('title')
    <title>Vai trò</title>
    @endsection @section('content')
@section('css')
    <link rel="stylesheet" href="{{ asset('/admins/css/style.css') }}">
@endsection
@section('js')
    <script src="{{ asset('vendors/sweetarlert2/sweetarlert2.js') }}"></script>
    <script src="{{ asset('/admins/js/app.js') }}"></script>
@endsection
<div class="content-wrapper">
    @include('admin.partials.content-header', ['name' => 'Vai trò', 'key' => '/ Danh Sách'])
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <a href="{{route('roles.create')}} " class="btn btn-success float-right m-2">Thêm</a>
                </div>
                <div class="col-md-12">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Tên vai trò</th>

                                <th scope="col">Mô tả</th>
                                <th scope="col">Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($roles as $role)
                                <tr>

                                    <td class="text-capitalize">{{ $role->name }}</td>
                                    <td class="text-capitalize">{{ $role->display_name }}</td> 

                                    <td>
                                        <a href="{{ route('roles.edit', ['id' => $role->id]) }}" class="btn btn-default">Sửa</a>
                                        <a href=" " data-url="{{ route('roles.delete', ['id' => $role->id]) }} " class="btn btn-danger action_delete">Xóa</a>
                                        
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="col-md-12">
                    {{ $roles->links('pagination::bootstrap-5') }}

                </div>
            </div>
        </div>
    </div>
</div>


@endsection
