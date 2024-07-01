@extends('client.layouts.index')

@section('title')
    <title>Giỏ hàng</title>
@endsection

@section('content')
    <div class="wrap-content">
        <div class="return">
            @if ($message = Session::get('success'))
                <div>
                    <div style="color: #12c300;
                font-size: 1.2em;font-weight: bold;">{{ $message }}</div>
                </div>
            @endif
            @if ($message = Session::get('fail'))
                <div>
                    <div style="color: #dd0505;
                font-size: 1.2em;font-weight: bold;">{{ $message }}</div>
                </div>
            @endif
        </div>
        <div class="wrap-cart">
            @php
                $total = 0;
            @endphp
            @if ($detail_cart->count() > 0)
                @csrf
                <div class="row">
                <div class="top-cart col-md-12">
                    <p class="title-cart">Giỏ hàng của bạn:</p>
                    <div class="list-procart">
                        <div class="procart procart-label">
                            <div class="row row-10">
                                <div class="info-procart mg-col-10"><input type="checkbox"></div>
                                <div class="pic-procart col-3 col-md-2 mg-col-10">Hình ảnh</div>
                                <div class=" col-6 col-md-5 mg-col-10">Tên sản phẩm</div>
                                <div class="quantity-procart col-3 col-md-2 mg-col-10">
                                    Số lượng
                                </div>
                                <div class="price-procart col-3 col-md-3 mg-col-10">Đơn giá / Thành tiền</div>
                            </div>
                        </div>
                        <!--thẻ sản phẩm giỏ hàng-->
                        @foreach ($detail_cart as $v)
                        <div class="procart procart">
                            <div class="row row-10">
                                <div><input type="checkbox"></div>
                                <!--Hình ảnh-->
                                <div class="pic-procart col-3 col-md-2 mg-col-10"> <a class="text-decoration-none"
                                        target="_blank" title=""> <img width="85px" height="85px"
                                            src="{{ asset($v->product_photo_path) }}" alt=""> </a> <a
                                        class="del-procart text-decoration-none" data-code=""> <i
                                            class="fa fa-times-circle"></i>
                                            <span> <a href="{{route('delete.cart', $v->id)}}"> Xóa </a> </span> </div>
                                <!--Tên-->
                                <div class="info-procart col-6 col-md-5 mg-col-10">
                                    <h3 class="name-procart"><a class="text-decoration-none" target="_blank"
                                            title=""> {{ $v->name }} </a></h3>
                                </div>
                                
                                <!--Số lượng-->

                                <!--<div class="quantity-procart col-3 col-md-2 mg-col-10">
                                    <div class="price-procart price-procart-rp">
                                        <p class="price-new-cart load-price-new"> </p>
                                        <p class="price-old-cart load-price"> </p>
                                        <p class="price-new-cart load-price"> </p>
                                    </div>
                                    <div class="quantity-counter-procart quantity-counter-procart"> <span
                                            class="counter-procart-minus counter-procart">-</span> <input type="number"
                                            class="quantity-procart" min="1" value="" data-pid=""
                                            data-code=" " /> <span
                                            class="counter-procart-plus counter-procart">+</span>
                                    </div>
                                </div> -->

                                <!--Số lượng-->

                                <div class="quantity-procart col-3 col-md-2 mg-col-10">
                                    <span class="buttons_added">
                                        <input class="minus is-form" type="button" value="-"
                                            onclick="decreaseCount(event, this)">
                                        @method('PATCH')
                                        <input type="number" aria-label="quantity" class="input-qty"
                                            value="{{ $v->quantity }}" max="10" min="1" name="quantity">
                                        <input class="plus is-form" type="button" value="+"
                                            onclick="increaseCount(event, this)">
                                    </span>
                                </div>
                                <!--end số lượng-->
                                <!--Thành tiền-->
                                @if($v->discount >0)
                                <div class="price-procart col-3 col-md-3 mg-col-10">
                                    <p class="price-new-cart load-price-new">  @formatmoney($v->sale_price) </p>
                                    <p class="price-old-cart load-price"> @formatmoney($v->regular_price)</p>
                                    <p class="price-new-cart load-price"> @formatmoney( $v->sale_price * $v->quantity )  </p>
                                </div>
                                @php
                                    $total += $v->sale_price * $v->quantity;
                                @endphp
                                @else
                                <div class="price-procart col-3 col-md-3 mg-col-10">
                                    <p class="price-new-cart load-price-new">  @formatmoney($v->regular_price) </p>
                                    <p class="price-new-cart load-price-new"> @formatmoney( $v->regular_price * $v->quantity )  </p>
                                </div>
                                </td>
                                @php
                                    $total += $v->regular_price * $v->quantity;
                                @endphp
                                @endif
                            </div>
                        </div>
                        @endforeach
                        <!-- end -->
                        <div class="money-procart">
                            <div class="total-procart">
                                <p>Tổng tiền:</p>
                                <p class="total-price load-price-total"> @formatmoney($total) </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="btn-wrap-cart d-flex justify-content-end align-items-center mt-4">
                    <div class="btn btn-success  btn-cart-back-to-home me-2">
                        <a class="text-light" href="{{route('index')}}"> Về trang chủ</a>
                    </div>
                    <!--<button class="btn btn-success" type="submit">Cập nhật</button>-->

                    <div class="btn btn-success  btn-cart-back-to-home me-2">
                        <a class="text-light" href="#"> Cập nhật</a>
                    </div>
                    <div class="btn btn-success  btn-cart-next-to-payment">
                        <a class="text-light" href="{{ route('user.payment') }}">Thanh toán</a>
                    </div>

                </div>
                
            </div>
            @else
            {{-- Empty --}}
            <a href="{{route('index')}}" class="empty-cart text-decoration-none d-block">
                <i class="fa-duotone fa-cart-xmark"></i>
                <p>Không tồn tại sản phẩm nào trong giỏ hàng</p> 
                <a href="{{route('index')}}">
                    <span class="btn btn-back-to-home">
                        Về trang chủ
                    </span>
                </a>
            </a>
            @endif
        </div>
    </div>
@endsection
@section('js')
<script type="text/javascript">
    $(".edit-cart-info").change(function(e) {
        e.preventDefault();
        var ele = $(this);
        $.ajax({
            url: '#',
            method: "patch",
            data: {
                _token: '{{ csrf_token() }}',
                id: ele.parents("tr").attr("rowId"),
            },
            success: function(response) {
                window.location.reload();
            }
        });
    });

    $(".delete-product").click(function(e) {
        e.preventDefault();

        var ele = $(this);

        if (confirm("Bạn có chắc chắn?")) {
            $.ajax({
                //url: '#',
                method: "DELETE",
                data: {
                    _token: '{{ csrf_token() }}',
                    id: ele.parents("tr").attr("rowId")
                },
                success: function(response) {
                    window.location.reload();
                }
            });
        }
    });

    function increaseCount(a, b) {
        var input = b.previousElementSibling;
        var value = parseInt(input.value, 10);
        value = isNaN(value) ? 0 : value;
        value++;
        input.value = value;
        changeHref(value);
    }

    function decreaseCount(a, b) {
        var input = b.nextElementSibling;
        var value = parseInt(input.value, 10);
        if (value > 1) {
            value = isNaN(value) ? 0 : value;
            value--;
            input.value = value;
            changeHref(value);
        }
    }
</script>
@endsection