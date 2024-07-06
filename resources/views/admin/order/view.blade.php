@extends('admin.layouts.admin') @section('title')
    <title>Chi Tiết Hóa Đon Nhập</title>
    @endsection @section('content')
@section('css')
    <link rel="stylesheet" href="{{ asset('/admins/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('/admins/css/sumoselect.min.css') }}">
@endsection
@section('js')
    <script src="{{ asset('/admins/js/jquery.sumoselect.min.js') }}"></script>
    <script script src="{{ asset('/admins/js/app.js') }}"></script>
@endsection
<div class="content-wrapper">

    @include('admin.partials.content-header', ['name' => 'Hóa Đơn Bán', 'key' => '/ Chi Tiết'])

    <div class="content">
        <div class="container-fluid">

            <form action="" method="">
                @csrf
                <div class="card-footer text-sm sticky-top">
                    <button type="button" class="btn btn-primary" onclick="history.back()">Thoát</button>
                </div>
                <div class="row col-12">
                    <div class="col-3">
                        <div class="form-group">
                            <label>Mã hóa đơn</label>
                            <input type="text" class="form-control" name="orders_code"
                                value="{!! $ImportOrder->order_code !!}" readonly>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label>Thời gian</label>
                            <input type="datetime-local" min="{{ date('Y-m-d\TH:i') }}" class="form-control"
                                name="import_date"
                                value="{{ \Carbon\Carbon::parse($ImportOrder->created_at)->format('Y-m-d\TH:i') }}"
                                readonly>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label>Tổng tiền</label>
                            <input type="number" class="form-control" name="total_price"
                                value="{!! $ImportOrder->total_price !!}" readonly>
                        </div>
                    </div>

                </div>
                <button type="button" class="btn btn-primary" onclick="history.back()">Thoát</button>
            </form>


        </div>

    </div>

</div>


@endsection
