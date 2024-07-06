@extends('admin.layouts.admin')
@section('title')
    <title>Kho</title>
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
        @include('admin.partials.content-header', ['name' => 'Kho', 'key' => '/ Danh Sách'])
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6 mb-2">
                        <form action="" class="form-inline" method="GET">
                            @csrf
                            <input class="search-keyword form-control border-end-0 border"
                                value="{{ request()->get('search_keyword') }}" type="search" name="search_keyword"
                                placeholder="Nhập từ khóa để tìm kiếm">
                            <input type="hidden" id="search_route" value="{{ route('product.warehouse') }}">
                            <div class="input-group-append bg-primary rounded-right">
                                <button class="btn btn-navbar text-white" onclick="onSearch()" type="button">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Tên Sản Phẩm</th>
                                    <th scope="col">Hình Ảnh</th>
                                    <th scope="col">Số lượng</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (!$warehouse->isEmpty())
                                    @foreach ($warehouse as $warehouseItem)
                                        <tr>
                                            <td class="text-capitalize">
                                                {{ $warehouseItem->product_name }}
                                            </td>
                                            <td>
                                                <img class="adm-product-img" src="{{ $warehouseItem->product_photo_path }}"
                                                    alt="">
                                            </td>
                                            <td class="text-capitalize">{{ $warehouseItem->quantity }}</td>
                                        </tr>
                                    @endforeach
                                @else
                                    <td colspan="2">Không tìm thấy kết quả nào cho từ khóa của bạn.</td>
                                @endif
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-12">
                        {{ $warehouse->links('pagination::bootstrap-5') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
