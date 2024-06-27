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

                                @foreach ($warehouse as $warehouseItem)
                                <tr>
                                    <td class="text-capitalize">
                                        {{ $warehouseItem->product_name }}
                                    </td>
                                    <td>
                                        <img class="adm-product-img" src="{{ $warehouseItem->product_photo_path }}" alt="">
                                        

                                    </td>
                                    <td class="text-capitalize">{{ $warehouseItem->quantity }}</td>
                                </tr>
                            @endforeach
                            

                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-12">
                        {{-- {{ $products->links('pagination::bootstrap-5') }} --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
