@extends('admin.layouts.admin') @section('title')
    <title>Danh Sách Nhân Viên</title>
    @endsection @section('content')
@section('css')
    <link href="{{ asset('vendors/select2/select2.min.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('/admins/css/style.css') }}">
@endsection
@section('js')
    <script src="{{ asset('vendors/select2/select2.min.js') }}"></script>
    <script src="{{ asset('vendors/sweetarlert2/sweetarlert2.js') }}"></script>
    <script src="{{ asset('/admins/js/app.js') }}"></script>
@endsection
<div class="content-wrapper">
    @include('admin.partials.content-header', ['name' => 'Danh Sách Nhân Viên', 'key' => ' /Danh Sách'])
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
                    <a href="{{ route('users.create') }} " class="btn btn-success float-right m-2">Thêm</a>
                </div>
                <div class="col-md-12">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Tên Nhân Viên</th>
                                <th scope="col">Email</th>

                                <th scope="col">Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($users)
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $user->first_name }}</td>
                                        <td>{{ $user->email }}</td>

                                        <td>
                                            <a href="{{ route('users.edit', ['id' => $user->id]) }} "
                                                class="btn btn-default">Sửa</a>
                                            <a href=""
                                                data-url="{{ route('users.delete', ['id' => $user->id]) }}"
                                                class="btn btn-danger action_delete">Xóa</a>
                                        </td>
                                    </tr>
                                @endforeach
                            @elseif ($searchresult !== null && $searchresult->total() > 0)
                                @foreach ($searchresult as $user)
                                    <tr>
                                        <td>{{ $user->first_name }}</td>
                                        <td>{{ $user->email }}</td>

                                        <td>
                                            <a href="{{ route('users.edit', ['id' => $user->id]) }} "
                                                class="btn btn-default">Sửa</a>
                                            <a href=""
                                                data-url="{{ route('users.delete', ['id' => $user->id]) }}"
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
                @if ($searchresult || $users->hasMorePages())
                    <div class="col-md-12">
                        {{ $searchresult ?? $users->links('pagination::bootstrap-5') }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>


@endsection
