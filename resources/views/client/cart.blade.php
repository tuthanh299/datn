<?php
use App\Http\Controllers\Clients\IndexController;
?>

@extends('client.layouts.index')
@section('title')
    <title>{{ IndexController::settings()->name }}</title>
@endsection
@section('content')
@if ($carts > 0)
<table id="cart" class="table table-bordered">
    <thead>
        <h4 class="title-cart">Giỏ hàng của bạn:</h4>
        <tr>
            <th>Hình ảnh</th>
            <th>Tên sách</th>
            <th>Số lượng</th>
            <th>Giá tiền</th>
        </tr>
    </thead>
    <tbody>
    </tbody>              
</table>
@else
<div class="wrap-cart-no-product">
    <div class="wrap-content">
        <div class="wrap-cart">
            <div class="row">
                <a href="{{route('index')}}" class="empty-cart text-decoration-none w-100">
                    <i class="fa fa-cart-arrow-down"></i>
                    <p>Không tồn tại sản phẩm nào trong giỏ hàng !</p>
                    <span>Về trang chủ</span>
                </a>
            </div>
        </div>
    </div>
</div>
@endif
@endsection
