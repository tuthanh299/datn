@extends('admin.layouts.admin') @section('title')
    <title>Danh Sách Hóa Đơn Bán</title>
    @endsection @section('content')
@section('css')
    <link rel="stylesheet" href="{{ asset('/admins/css/style.css') }}">
@endsection
@section('js')
    <script src="{{ asset('vendors/sweetarlert2/sweetarlert2.js') }}"></script>
    <script src="{{ asset('/admins/js/app.js') }}"></script>
@endsection
<div class="content-wrapper">
    @include('admin.partials.content-header', ['name' => 'Hóa Đơn Nhập', 'key' => '/ Danh Sách'])
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Mã Hóa Đơn</th>
                                <th scope="col">Ngày Nhập</th>
                                <th scope="col">Tổng Tiền</th>
                                <th scope="col">Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($order as $v)
                                <tr>
                                    <td class="">{{ $v->order_code }}</td>
                                    <td class="">{{ $v->fullname }}</td>
                                    <td class="">{{ $v->created_at }}</td>
                                    @switch($v->status)
                                        @case(1)
                                            <td class="">Đơn hàng mới đặt</td>
                                            @break
                                        @case(2)
                                            <td class="">Đã xác nhận</td>
                                            @break
                                        @case(3)
                                            <td class="">Đang giao hàng</td>
                                            @break
                                        @case(4)
                                            <td class="">Đã giao hàng</td>
                                            @break
                                        @case(5)
                                            <td class="">Đã huỷ</td>
                                            @break
                                    @endswitch
                                    <td>
                                        <a href="{{ route('import_order.view', ['id' => $v->id]) }}"
                                            class="btn btn-default">Xem</a>
                                    </td> 
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="col-md-12">

                </div>
            </div>
        </div>
    </div>
</div>


@endsection
