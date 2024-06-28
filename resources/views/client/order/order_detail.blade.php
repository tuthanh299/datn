@extends('client.layouts.index')

@section('title')
    <title>Chi tiết lịch sử đơn hàng</title>
@endsection

@section('content')
<!-- Thông tin đơn hàng -->
<div class="form-add-top">
    <div>
        <a href="{{route('lichsumuahang')}}">Thoát</a>
    </div>
    <div class="title-name1">Thông tin đơn hàng</div>
    <div class="title-bill">ĐƠN HÀNG: <span class="id-bill">{{$hdb[0]->id}}</span>, ĐẶT
        LÚC: <span class="time-bill">{{$hdb[0]->created_at}}</span></div>
    <div class="flex-infor-bill">
        <div class="infor-bill">
            <div class="infor-bill-item">
                Tình trạng thanh toán: 
                <span>
                    @switch($hdb[0]->payment_status)
                    @case(0)
                    Chưa thanh toán
                    @break
                    @case(1)
                    Đã thanh toán
                    @break
                    @endswitch
                </span>
            </div>
            <div class="title-name2">Địa chỉ nhận hàng: {{$user->address}}</div>
            <div class="infor-bill-item">
                Vận chuyển: <span>
                    @switch($hdb[0]->shipping_status)
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
                </span>
            </div>
            <div class="infor-bill-item">{{$user->last_name . ' ' . $user->first_name}} </div>
            <div class="infor-bill-item">Vietnam</div>
            <div class="infor-bill-item">{{$user->sdt}}</div>
        </div>
        <div class="infor-bill">
 
        </div>
    </div>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>HI</th>
                <th>HI</th>
                <th>HI</th>
                <th>HI</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>hi</td>
                <td>hi</td>
                <td>hi</td>
                <td>hi</td>
            </tr>
        </tbody>
    </table>
    <!--<div class="grid-product-inbill-list">
        <div class="gridspname">
            <div class="title-name2">Sản phẩm</div>
            <div class="grid-product-inbill-list-info">
                <div>Thương nhớ trà long</div>
                <div>Tiểu thuyết</div>
            </div>
            <div class="grid-product-inbill-list-info">
                <div>Thương nhớ trà long2</div>
                <div>Tiểu thuyết2</div>
            </div>
        </div>
        <div class="gridspid">
            <div class="title-name2">Mã sản phẩm</div>
            <div class="grid-product-inbill-list-info">
                <div>#008000</div>
                <div>#00800das0</div>
            </div>
        </div>
        <div class="gridspprice">
            <div class="title-name2">Giá</div>
            <div class="grid-product-inbill-list-info">
                <div>30000đ </div>
                <div>50000đ </div>
            </div>
        </div>
        <div class="gridspquanty">
            <div class="title-name2">Số lượng</div>
            <div class="grid-product-inbill-list-info">
                <div>3</div>
                <div>2</div>
            </div>
        </div>
        <div class="gridsptotalprice">
            <div class="title-name2">Tổng cộng</div>
            <div class="grid-product-inbill-list-info">
                <div>90000đ</div>
                <div>60000đ</div>
            </div>
        </div>
    </div>-->
</div>
@include ('index_partials.js')   
@endsection