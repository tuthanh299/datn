@extends('admin.layouts.admin') @section('title')
    <title>Danh Sách Hóa Đơn Nhập</title>
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
                    <a href="{{ route('import_order.create') }}" class="btn btn-success float-right m-2">Thêm</a>
                </div>
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
                            @foreach ($ImportOrder as $v)
                                <tr>
                                    <td class="">{{ $v->orders_code }}</td>
                                    <td class="">{{ $v->import_date }}</td>
                                    <td class="">@formatmoney($v->total_price )</td>
                                    <td>
                                        <a href="{{ route('import_order.view', ['id' => $v->id]) }}"
                                            class="btn btn-default">Xem</a>
                                        <a data-url="{{ route('import_order.delete', ['id' => $v->id]) }}" class="action_delete btn btn-danger">Xóa</a>
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
