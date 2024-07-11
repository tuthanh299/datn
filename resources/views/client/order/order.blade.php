@extends('client.layouts.index')

@section('title')
    <title>Lịch sử đơn hàng</title>
@endsection

@section('content')
    <div class="wrap-content">
        <div class="title-main">
            <span>Lịch sử đơn hàng</span>
        </div>
        @if (count($hdb) <= 0)   
            <div>Bạn chưa mua sản phẩm nào !</div>
        @else
        <div class="content-main">
            <div class="form-add-top">
                <span class="title-name1">Tài khoản của bạn</span>
                    <table class="w-100">
                        <tr class="row">
                            <th class="col-md-3">Mã đơn hàng:</th>
                            <th class="col-md-3">Ngày đặt</th>
                            <th class="col-md-3">Trạng thái</th>

                            <th class="col-md-3">Tổng tiền</th>
                        </tr>
                        @foreach ($hdb as $hdb)
                            <tr class="row">
                                <td class="col-md-3">
                                    <a href="{{ route('user.order.detail', ['id' => $hdb->id]) }}">
                                        {{ $hdb->order_code }}
                                    </a>
                                </td>
                                <td class="col-md-3">{{ $hdb->created_at }}</td>
                                <td class="col-md-3">
                                    @switch($hdb->status)
                                        @case(0)
                                            Mới đặt
                                        @break
                                        @case(1)
                                            Đã xác nhận
                                        @break
                                        @case(2)
                                            Đang giao cho shipper
                                        @break
                                        @case(3)
                                            Đã giao cho shipper
                                        @break
                                        @case(4)
                                            Giao hàng cho khách thành công
                                        @break
                                        @case(5)
                                            Giao hàng cho khách thất bại
                                        @break
                                        @case(6)
                                            Đơn hàng đã huỷ
                                        @break
                                    @endswitch
                                </td>
                                <td class="col-md-3">@formatmoney($hdb->total_price)</td>
                            </tr>
                        @endforeach
                    </table>
            </div>
        </div>
        @endif
    </div>
@endsection
