@extends('admin.layouts.admin') @section('title')
    <title>Danh Mục Sản Phẩm</title>
    @endsection @section('content')
@section('css')
    <link rel="stylesheet" href="{{ asset('/admins/css/style.css') }}">
@endsection
@section('js')
    <script src="{{ asset('vendors/sweetarlert2/sweetarlert2.js') }}"></script>
    <script src="{{ asset('/admins/js/app.js') }}"></script>
@endsection
<div class="content-wrapper">
    @include('admin.partials.content-header', ['name' => 'Danh Mục Sản Phẩm', 'key' => '/ Danh Sách'])
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
                    <a href="{{ route('categories.create') }}" class="btn btn-success float-right m-2">Thêm</a>
                </div>
                <div class="col-md-12">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Tên Danh Mục</th>
                                <th scope="col">Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>  
                            @if ($categories)
                                @foreach ($categories as $category)
                                    <tr> 
                                        <td class="name-category">{{ $category->name }}</td>
                                        <td>
                                            <a href="{{ route('categories.edit', ['id' => $category->id]) }}"
                                                class="btn btn-default">Sửa</a>
                                            <a data-url="{{ route('categories.delete', ['id' => $category->id]) }}"
                                                class="action_delete btn btn-danger">Xóa</a>
                                        </td>
                                    </tr>
                                @endforeach
                            @elseif ($searchresult !== null && $searchresult->total() > 0)
                                @foreach ($searchresult as $category)
                                    <tr>
                                        <td class="name-category">{{ $category->name }}</td>
                                        <td>
                                            <a href="{{ route('categories.edit', ['id' => $category->id]) }}"
                                                class="btn btn-default">Sửa</a>
                                            <a data-url="{{ route('categories.delete', ['id' => $category->id]) }}"
                                                class="action_delete btn btn-danger">Xóa</a>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <td colspan="2">Không tìm thấy kết quả nào cho từ khóa của bạn.</td>
                            @endif
                        </tbody>
                    </table>
                </div>
                @if ($searchresult || $categories->hasMorePages())
                    <div class="col-md-12">
                        {{ $searchresult ?? $categories->links('pagination::bootstrap-5') }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>


@endsection
