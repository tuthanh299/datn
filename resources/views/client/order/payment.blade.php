@extends('client.layouts.index')

@section('title')
    <title>Thanh toán</title>
@endsection

@section('content')
    <div class="wrap-content">
        <div class="wrap-pay">
            @php
                $shipping = 30000;
                $total = 0;
            @endphp
            <div class="row">
                <div class="top-cart col-12 col-lg-7">
                    <p class="title-cart">Thanh toán</p>
                    <div class="list-procart">
                        <div class="procart procart-label">
                            <div class="row row-10">
                                <!--<div><input type="checkbox"></div>-->
                                <div class="pic-procart col-3 col-md-2 mg-col-10">Hình ảnh</div>
                                <div class="info-procart col-6 col-md-5 mg-col-10">Tên sản phẩm</div>
                                <div class="quantity-procart col-3 col-md-2 mg-col-10">
                                    <p>Số lượng</p>
                                    <p>Thành tiền</p>
                                </div>
                                <div class="price-procart col-3 col-md-3 mg-col-10">Thành tiền</div>
                            </div>
                        </div>
                        <!--thẻ sản phẩm giỏ hàng-->
                        @foreach (session('cart') as $k => $v)
                            @php $total += ($v['sale_price']?$v['sale_price']:$v['regular_price']) * $v['quantity'] @endphp
                            <div class="procart procart">
                                <div class="row row-10">
                                    <!--<div><input type="checkbox"></div>-->
                                    <div class="pic-procart col-3 col-md-2 mg-col-10">
                                        <a class="text-decoration-none" target="_blank" title=""> <img width="85px"
                                                height="85px" src="{{ asset($v['product_photo_path']) }}" alt="">
                                        </a>
                                    </div>
                                    <div class="info-procart col-6 col-md-5 mg-col-10">
                                        <h3 class="name-procart"><a class="text-decoration-none" target="_blank"
                                                title=""> {{ $v['name'] }} </a></h3>
                                    </div>
                                    <div class="quantity-procart col-3 col-md-2 mg-col-10">{{ $v['quantity'] }}</div>
                                    <div class="price-procart col-3 col-md-3 mg-col-10">
                                        @if ($v['sale_price'])
                                            <p class="price-new-cart load-price-new"> @formatmoney($v['sale_price'] * $v['quantity']) </p>
                                            <p class="price-old-cart load-price"> @formatmoney($v['regular_price'] * $v['quantity'])</p>
                                        @else
                                            <p class="price-new-cart load-price"> @formatmoney($v['regular_price'] * $v['quantity']) </p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <!-- end -->
                    </div>
                    <div class="money-procart">
                        <div class="total-procart">
                            <p>Tạm tính:</p>
                            <p class="total-price load-price-temp">@formatmoney($total)</p>
                        </div>
                        <div class="total-procart">
                            <p>Phí vận chuyển:</p>
                            <p class="total-price load-price-ship">@formatmoney($shipping)</p>
                        </div>
                        <div class="total-procart">
                            <p>Tổng tiền:</p>
                            <p class="total-price load-price-total">@formatmoney($total + $shipping)</p>
                        </div>
                    </div>
                </div>
                <div class="bottom-cart col-12 col-lg-5">
                    <div class="section-cart">
                        <!--<p class="title-cart">Hình thức thanh toán:</p>
                            <div class="information-cart">
                                <div class="payments-cart form-check"> <input type="radio" class="form-check-input"
                                        id="payments-" name="dataOrder[payments]" value="" required> <label
                                        class="payments-label form-check-label" for="payments-" data-payments="">
                                        Thanh toán qua hình thức COD</label>
                                    <div class="payments-info payments-info- transition">
                                        Khách hàng thanh toán cho shipper khi nhận được hàng.
                                    </div>
                                </div>
                                <div class="payments-cart form-check"> <input type="radio" class="form-check-input"
                                        id="payments-" name="dataOrder[payments]" value="" required> <label
                                        class="payments-label form-check-label" for="payments-" data-payments="">
                                        Thanh toán trực tuyến qua Momo</label>
                                    <div class="payments-info payments-info- transition">

                                    </div>
                                </div>
                                <div class="payments-cart form-check"> <input type="radio" class="form-check-input"
                                        id="payments-" name="dataOrder[payments]" value="" required> <label
                                        class="payments-label form-check-label" for="payments-" data-payments="">
                                        Thanh toán trực tuyến qua VNPAY</label>
                                    <div class="payments-info payments-info- transition">

                                    </div>
                                </div>
                            </div> -->
                        <!-- Form COD Payment -->
                        <button type="button" class="btn btn-primary" onclick="showForm('cod')">Thanh toán ngay</button>
                        <button type="button" class="btn btn-primary" onclick="showForm('vnpay')">Thanh toán bằng VNPAY</button>
                        <form action="{{ url('/cod_payment') }}" method="POST" id="codPaymentForm" style="display: block;">
                            @csrf
                            <p class="title-cart">Thông tin giao hàng:</p>
                            <div class="information-cart">
                                <div class="row row-10">
                                    <div class="input-cart col-md-6 mg-col-10">
                                        <div class="form-floating form-floating-cus">
                                            <input type="text" class="form-control text-sm" id="fullname_cod"
                                                name="fullname" placeholder="Họ tên"
                                                value="{{ $user->last_name . ' ' . $user->first_name }}" required /> 
                                            <label for="fullname_cod">Họ tên</label>
                                        </div>
                                        <div class="invalid-feedback">Vui lòng nhập họ tên</div>
                                    </div>
                                    <div class="input-cart col-md-6 mg-col-10">
                                        <div class="form-floating form-floating-cus"> 
                                            <input type="number" class="form-control text-sm" id="phone_cod" name="phone"
                                                placeholder="Điện thoại" value="{{ $user->phone }}" required /> 
                                            <label for="phone_cod">Điện thoại</label> 
                                        </div>
                                        <div class="invalid-feedback">Vui lòng nhập số điện thoại</div>
                                    </div>
                                </div>
                                <div class="input-cart">
                                    <div class="form-floating form-floating-cus"> 
                                        <input type="text" class="form-control text-sm" id="address_cod" name="address"
                                            placeholder="Địa chỉ" value="{{ $user->address }}" required /> 
                                        <label for="address_cod">Địa chỉ</label> 
                                    </div>
                                    <div class="invalid-feedback">Vui lòng nhập địa chỉ</div>
                                </div>
                                <div class="input-cart">
                                    <div class="form-floating form-floating-cus">
                                        <textarea class="form-control text-sm" id="note_cod" name="note" placeholder="Yêu cầu khác"></textarea> 
                                        <label for="note_cod">Yêu cầu khác</label>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="total" value="{{ $total + $shipping }}">
                            <button type="submit" class="btn btn-primary">Thanh toán ngay</button>
                        </form>

                        <!-- Form VNPAY Payment -->
                        <form action="{{ url('/vnpay_payment') }}" method="POST" id="vnpayPaymentForm" style="display: none;">
                            @csrf
                            <p class="title-cart">Thông tin giao hàng:</p>
                            <div class="information-cart">
                                <div class="row row-10">
                                    <div class="input-cart col-md-6 mg-col-10">
                                        <div class="form-floating form-floating-cus">
                                            <input type="text" class="form-control text-sm" id="fullname_vnpay"
                                                name="fullname" placeholder="Họ tên"
                                                value="{{ $user->last_name . ' ' . $user->first_name }}" required /> 
                                            <label for="fullname_vnpay">Họ tên</label>
                                        </div>
                                        <div class="invalid-feedback">Vui lòng nhập họ tên</div>
                                    </div>
                                    <div class="input-cart col-md-6 mg-col-10">
                                        <div class="form-floating form-floating-cus"> 
                                            <input type="number" class="form-control text-sm" id="phone_vnpay" name="phone"
                                                placeholder="Điện thoại" value="{{ $user->phone }}" required /> 
                                            <label for="phone_vnpay">Điện thoại</label> 
                                        </div>
                                        <div class="invalid-feedback">Vui lòng nhập số điện thoại</div>
                                    </div>
                                </div>
                                <div class="input-cart">
                                    <div class="form-floating form-floating-cus"> 
                                        <input type="text" class="form-control text-sm" id="address_vnpay" name="address"
                                            placeholder="Địa chỉ" value="{{ $user->address }}" required /> 
                                        <label for="address_vnpay">Địa chỉ</label> 
                                    </div>
                                    <div class="invalid-feedback">Vui lòng nhập địa chỉ</div>
                                </div>
                                <div class="input-cart">
                                    <div class="form-floating form-floating-cus">
                                        <textarea class="form-control text-sm" id="note_vnpay" name="note" placeholder="Yêu cầu khác"></textarea> 
                                        <label for="note_vnpay">Yêu cầu khác</label>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="total" value="{{ $total + $shipping }}">
                            <button type="submit" name="type" value="payment_vnpay" class="btn btn-primary">Thanh toán bằng VNPAY</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
<script>
    function showForm(type) {
        var codForm = document.getElementById('codPaymentForm');
        var vnpayForm = document.getElementById('vnpayPaymentForm');

        if (type === 'cod') {
            codForm.style.display = 'block';
            vnpayForm.style.display = 'none';
        } else if (type === 'vnpay') {
            codForm.style.display = 'none';
            vnpayForm.style.display = 'block';
        }
    }
</script>
@endsection