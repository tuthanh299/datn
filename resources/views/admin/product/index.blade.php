@extends('layouts.admin') @section('title')
<title>Sản Phẩm</title>
@endsection @section('content') 
@section('css')
    <link rel="stylesheet" href="{{ asset('/admins/css/style.css') }}">
@endsection
@section('js')
    <script src="{{ asset('vendors/sweetarlert2/sweetarlert2.js') }}"></script>
    <script src="{{ asset('/admins/js/app.js') }}"></script>
@endsection
<div class="content-wrapper"> 
    @include('partials.content-header',['name'=>'Sản Phẩm','key'=>'/ Danh Sách']) 
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <a href="#" class="btn btn-success float-right m-2">Add</a>
                </div>
                <div class="col-md-12">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Hình Ảnh</th>
                                <th scope="col">Tên Sản Phẩm</th>
                                <th scope="col">Nhà Xuất Bản</th>
                                <th scope="col">Tác Giả</th>
                                <th scope="col">Mô Tả</th>
                                <th scope="col">Giá Tiền</th>
                                <th scope="col">Giá Giảm</th>
                                <th scope="col">Phần Trăm Giảm</th>
                                <th scope="col">Nổi Bật</th>
                                <th scope="col">Trạng Thái</th>
                                <th scope="col">Thao tác</th> 
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                            <tr>
                                
                                <td>
                                    <!--<img class="publisher-image-thumb" src="" alt="">-->
                                    {{ $product->photo }}
                                </td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->publisher }}</td>
                                <td>{{ $product->author }}</td>
                                <td>{{ $product->desc }}</td>
                                <td>@convert($product->regular_price, 0)đ</td>
                                <td>@convert($product->sale_price, 0)đ</td>
                                <td>{{ $product->discount }}</td>
                                <td>{{ $product->outstanding }}</td>
                                <td>{{ $product->status }}</td>
                                <td>
                                    <a href="#"
                                        class="btn btn-default">Edit</a>
                                    <a href="#"
                                        class="btn btn-danger action_delete">Delete</a>
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
