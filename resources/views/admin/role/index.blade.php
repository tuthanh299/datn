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
                <div class="col-md-6">
                    <form action="" class="form-inline" method="GET">
                        @csrf
                        <input class="search-keyword form-control border-end-0 border"
                            value="{{ request()->get('search_keyword') }}" type="search" name="search_keyword"
                            placeholder="Nhập từ khóa để tìm kiếm">
                        <div class="input-group-append bg-primary rounded-right">
                            <button class="btn btn-navbar text-white" type="button">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </form>
                </div>
                <div class="col-md-6">
                    <a href="{{ route('roles.create') }} " class="btn btn-success float-right m-2">Thêm</a>
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
                            @if ($roles)
                                @foreach ($roles as $role)
                                    <tr>

                                        <td class="text-capitalize">{{ $role->name }}</td>
                                        <td class="text-capitalize">{{ $role->display_name }}</td>

                                        <td>
                                            <a href="{{ route('roles.edit', ['id' => $role->id]) }}"
                                                class="btn btn-default">Sửa</a>
                                            <a href=" "
                                                data-url="{{ route('roles.delete', ['id' => $role->id]) }} "
                                                class="btn btn-danger action_delete">Xóa</a>

                                        </td>
                                    </tr>
                                @endforeach
                            @elseif ($searchresult !== null && $searchresult->total() > 0)
                                @foreach ($searchresult as $role)
                                    <tr>

                                        <td class="text-capitalize">{{ $role->name }}</td>
                                        <td class="text-capitalize">{{ $role->display_name }}</td>

                                        <td>
                                            <a href="{{ route('roles.edit', ['id' => $role->id]) }}"
                                                class="btn btn-default">Sửa</a>
                                            <a href=" "
                                                data-url="{{ route('roles.delete', ['id' => $role->id]) }} "
                                                class="btn btn-danger action_delete">Xóa</a>

                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <td colspan="2">Không tìm thấy kết quả nào cho từ khóa của bạn.</td>
                            @endif

                        </tbody>
                    </table>
                </div>
                @if ($searchresult || $roles->hasMorePages())
                    <div class="col-md-12">
                        {{ $searchresult ?? $roles->links('pagination::bootstrap-5') }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>


@endsection
