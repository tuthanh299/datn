@extends('admin.layouts.admin')
@section('title')
    <title>Sản phẩm</title>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('/admins/css/style.css') }}">
    <link href="{{ asset('vendors/bootstrap/bootstrap.css') }}" rel="stylesheet">
@endsection
@section('js')
    <script src="{{ asset('vendors/sweetarlert2/sweetarlert2.js') }}"></script>
    <script src="{{ asset('vendors/bootstrap/bootstrap.js') }}"></script> 
    <script src="{{ asset('/admins/js/app.js') }}"></script>
@endsection
@section('content')
    <div class="content-wrapper">
        @include('admin.partials.content-header', ['name' => 'Sản phẩm', 'key' => '/ Danh Sách'])
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{ route('product.create') }} " class="btn btn-success float-right m-2">Thêm</a>
                    </div>
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                                <tr>

                                    <th scope="col">Tên Sản Phẩm</th>
                                    <th scope="col">Hình Ảnh</th>
                                    <th scope="col">Danh mục</th>
                                    <th scope="col">Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $productItem)
                                    <tr>

                                        <td class="text-capitalize">{{ $productItem->name }}</td>

                                        <td>
                                            <img class="adm-product-img" src="{{ $productItem->product_photo_path }}"
                                                alt="">
                                        </td>
                                        <td class="text-capitalize">{{ optional($productItem->category)->name }}</td>
                                        <td>
                                            <a href="{{ route('product.edit', ['id' => $productItem->id]) }}"
                                                class="btn btn-default">Sửa</a>
                                            <a href=""
                                                data-url="{{ route('product.delete', ['id' => $productItem->id]) }}"
                                                class="btn btn-danger action_delete">Xóa</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-12">
                        {{ $products->links('pagination::bootstrap-5') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
