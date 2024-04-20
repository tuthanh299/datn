@extends('layoutshome.index') 
@section('title')
<title>Giỏ hàng</title>
@endsection 

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div>
        <h2>Giỏ hàng</h2>
    </div>
    <form action="#" method="POST">
        @csrf
        @if ($carts == null)
            <div>Không có sản phẩm nào trong giỏ hàng</div>
            <a href="{{ route('homepage') }}" class="btn btn-primary">Tiếp tục mua hàng</a>
        @else
        <table class="table">
            <thead>
                <tr>
                    <th></th>
                    <th>Sản phẩm</th>
                    <th>Giá</th>
                    <th>Số luợng</th>
                    <th>Tổng</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cart1s as $cart)
                <tr>
                    <td>{{ $cart['id'] }}</td>
                    <td>{{ $cart['name']}}</td>
                    <td>@convert($cart['price'])</td>
                    <td>
                        <input type="number" name="quantity" value="{{ $cart['quantity'] }}">
                    </td>
                    <td>@convert($cart['price'] * $cart['quantity'])</td>   
                </tr>
                @endforeach
            </tbody>            
        </table>
        <button type="submit" class="btn btn-primary">Thanh toán</button>   
        @endif
           
    </form>
</div>
<!-- /.content-wrapper -->

@endsection