@extends('admin.layouts.admin')
@section('title')
    <title>Sản phẩm</title>
@endsection

@section('css')
    <link href="{{ asset('vendors/bootstrap/bootstrap.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('/admins/css/style.css') }}">
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

                                @if ($products)
                                    @foreach ($products as $productItem)
                                        <tr>
                                            <td class="text-capitalize">{{ $productItem->name }}</td>
                                            <td>
                                                <img class="adm-product-img"
                                                    src="{{ $productItem->product_photo_path }} " alt="">
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
                                @elseif ($searchresult !== null && $searchresult->total() > 0)
                                    @foreach ($searchresult as $productItem)
                                        <tr>
                                            <td class="text-capitalize">{{ $productItem->name }}</td>
                                            <td>
                                                <img class="adm-product-img"
                                                    src="{{ asset($productItem->product_photo_path) }} " alt="">
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
                                @else
                                    <td colspan="2">Không tìm thấy kết quả nào cho từ khóa của bạn.</td>
                                @endif
                            </tbody>
                        </table>
                    </div>
                    @if ($searchresult || $products->hasMorePages())
                    <div class="col-md-12">
                        {{ $searchresult ?? $products->links('pagination::bootstrap-5') }}
                    </div>
                @endif
                </div>
            </div>
        </div>
    </div>
@endsection
