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
                <div class="col-md-12">
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
                        </tbody>
                    </table>
                </div>
                <div class="col-md-12">
                    {{ $categories->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
