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
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Mã hóa đơn</label>
                            <input type="text" class="form-control" name="orders_code"
                                value="{!! $ImportOrder->order_code !!}" readonly>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Thời gian</label>
                            <input type="datetime-local" min="{{ date('Y-m-d\TH:i') }}" class="form-control"
                                name="import_date"
                                value="{{ \Carbon\Carbon::parse($ImportOrder->created_at)->format('Y-m-d\TH:i') }}"
                                readonly>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <select name="status" id="status">
                            @foreach ($status as $item)
                                <option value="{!! $item->id !!}">{{$item->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label>Tổng tiền</label>
                            <input type="number" class="form-control" name="total_price"
                                value="{!! $ImportOrder->total_price !!}" readonly>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Mã Sản Phẩm</th>
                                <th scope="col">Tên Sản Phẩm</th>
                                <th scope="col">Giá Sản Phẩm</th>
                                <th scope="col">Số Lượng</th>
                                <th scope="col">Tổng cộng</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (!$ImportOrderdetail->isEmpty())
                                @foreach ($ImportOrderdetail as $v)
                                    <tr>
                                        <td class="">{{ $v->code }}</td>
                                        <td class="">{{ $v->name }}</td>
                                        @if ($v->sale_price > 0)
                                            <td class="">@formatmoney($v->sale_price)</td>
                                        @else
                                            <td class="">@formatmoney($v->regular_price)</td>
                                        @endif
                                        <td class="">{{ $v->quantity }}</td>
                                        @if ($v->sale_price > 0)
                                        <td class="">@formatmoney($v->sale_price * $v->quantity)</td>
                                    @else
                                        <td class="">@formatmoney($v->regular_price * $v->quantity)</td>
                                    @endif
                                    </tr>
                                @endforeach
                            @else
                                <td colspan="2">Không tìm thấy kết quả!</td>
                            @endif
                        </tbody>
                    </table>
                </div>
                <button type="submit" class="btn btn-primary">Lưu</button>
            </form>
        </div>
        <button type="button" class="btn btn-primary" onclick="history.back()">Thoát</button>
    </div>

</div>


@endsection
