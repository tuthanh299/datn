@extends('client.layouts.index')

@section('title')
    <title>Lịch sử đơn hàng</title>
@endsection

@section('content')
<div class="form-add-top">
    <span class="title-name1">Tài khoản của bạn</span> 
    @if(count($hdb) < 0)
    <div>Bạn chưa mua sản phẩm nào !</div>
    @else
    <table class="w-100">
        <tr>
            <th>Mã đơn hàng:</th>
            <th>Ngày đặt</th>
            <th>Trạng thái thanh toán</th>
            <th>Tình trạng vận chuyển</th>
            <th>Tổng tiền</th>
        </tr>
        @foreach($hdb as $hdb)
        <tr>
            <td>
                <a href="{{route('user.order.detail', ['id' => $hdb->id])}}">
                    {{$hdb->id}}
                </a>
            </td>
            <td>{{$hdb->created_at}}</td>
            @switch($hdb->TrangThaiThanhToan)
            @case(0)
                <td> Chưa thanh toán </td>
            @break
            @case(1)
                <td> Đã thanh toán </td>
            @break
            @endswitch
            @switch($hdb->shipping_status)
            @case(0)
                <td> Đơn hàng đang chờ duyệt </td>
            @break

            @case(1)
                <td> Đơn hàng đã được duyệt </td>
            @break

            @case(2)
                <td> Đơn hàng đang được vận chuyển </td>
            @break

            @case(3)
                <td> Đơn hàng đã vận chuyển thành công</td>
            @break
            @endswitch
            <td>@formatmoney($hdb->total_price)đ</td>
        </tr>
        @endforeach
    </table> 
    @endif
</div>
@endsection