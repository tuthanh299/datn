@extends('client.layouts.index')

@section('title')
    <title>Giỏ hàng</title>
@endsection

@section('content')
    <div class="wrap-content">
        <div class="wrap-cart">
            @if ($carts > 0)
            <div class="row">
                <div class="top-cart col-md-12">
                    <p class="title-cart">Giỏ hàng của bạn:</p>
                    <div class="list-procart">
                        <div class="procart procart-label">
                            <div class="row row-10">
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
                        <div class="procart procart">
                            <div class="row row-10">
                                <div class="pic-procart col-3 col-md-2 mg-col-10"> <a class="text-decoration-none"
                                        href="" target="_blank" title=""> <img width="85px" height="85px"
                                            src="{{ asset('index/imgs/sp.jpg') }}" alt=""> </a> <a
                                        class="del-procart text-decoration-none" data-code="""> <i
                                            class="fa                                       fa-times-circle"></i>
                                        <span>Xóa</span> </a> </div>
                                <div class="info-procart col-6 col-md-5 mg-col-10">
                                    <h3 class="name-procart"><a class="text-decoration-none" href="" target="_blank"
                                            title=""> Nhà Giả Kim (Tái Bản 2020) </a></h3>
                                </div>
                                <div class="quantity-procart col-3 col-md-2 mg-col-10">
                                    <div class="price-procart price-procart-rp">
                                        <p class="price-new-cart load-price-new"> </p>
                                        <p class="price-old-cart load-price"> </p>
                                        <p class="price-new-cart load-price"> </p>
                                    </div>
                                    <div class="quantity-counter-procart quantity-counter-procart"> <span
                                            class="counter-procart-minus counter-procart">-</span> <input type="number"
                                            class="quantity-procart" min="1" value="1" data-pid=""
                                            data-code=" " /> <span
                                            class="counter-procart-plus                                           counter-procart">+</span>
                                    </div>
                                </div>
                                <div class="price-procart col-3 col-md-3 mg-col-10">
                                    <p class="price-new-cart load-price-new"> 22.500.000₫ </p>
                                    <p class="price-old-cart load-price"> 25.000.000₫ </p>
                                    <p class="price-new-cart load-price"> 25.000.000₫ </p>
                                </div>
                            </div>
                        </div>
                        <!-- end -->
                        <div class="procart procart">
                            <div class="row row-10">
                                <div class="pic-procart col-3 col-md-2 mg-col-10"> <a class="text-decoration-none"
                                        href="" target="_blank" title=""> <img width="85px" height="85px"
                                            src="{{ asset('index/imgs/sp.jpg') }}" alt=""> </a> <a
                                        class="del-procart text-decoration-none" data-code="""> <i
                                            class="fa                                       fa-times-circle"></i>
                                        <span>Xóa</span> </a> </div>
                                <div class="info-procart col-6 col-md-5 mg-col-10">
                                    <h3 class="name-procart"><a class="text-decoration-none" href="" target="_blank"
                                            title=""> Nhà Giả Kim (Tái Bản 2020) </a></h3>
                                </div>
                                <div class="quantity-procart col-3 col-md-2 mg-col-10">
                                    <div class="price-procart price-procart-rp">
                                        <p class="price-new-cart load-price-new"> </p>
                                        <p class="price-old-cart load-price"> </p>
                                        <p class="price-new-cart load-price"> </p>
                                    </div>
                                    <div class="quantity-counter-procart quantity-counter-procart"> <span
                                            class="counter-procart-minus counter-procart">-</span> <input type="number"
                                            class="quantity-procart" min="1" value="1" data-pid=""
                                            data-code=" " /> <span
                                            class="counter-procart-plus                                           counter-procart">+</span>
                                    </div>
                                </div>
                                <div class="price-procart col-3 col-md-3 mg-col-10">
                                    <p class="price-new-cart load-price-new"> 22.500.000₫ </p>
                                    <p class="price-old-cart load-price"> 25.000.000₫ </p>
                                    <p class="price-new-cart load-price"> 25.000.000₫ </p>
                                </div>
                            </div>
                        </div>
                        <div class="procart procart">
                            <div class="row row-10">
                                <div class="pic-procart col-3 col-md-2 mg-col-10"> <a class="text-decoration-none"
                                        href="" target="_blank" title=""> <img width="85px" height="85px"
                                            src="{{ asset('index/imgs/sp.jpg') }}" alt=""> </a> <a
                                        class="del-procart text-decoration-none" data-code="""> <i
                                            class="fa                                       fa-times-circle"></i>
                                        <span>Xóa</span> </a> </div>
                                <div class="info-procart col-6 col-md-5 mg-col-10">
                                    <h3 class="name-procart"><a class="text-decoration-none" href=""
                                            target="_blank" title=""> Nhà Giả Kim (Tái Bản 2020) </a></h3>
                                </div>
                                <div class="quantity-procart col-3 col-md-2 mg-col-10">
                                    <div class="price-procart price-procart-rp">
                                        <p class="price-new-cart load-price-new"> </p>
                                        <p class="price-old-cart load-price"> </p>
                                        <p class="price-new-cart load-price"> </p>
                                    </div>
                                    <div class="quantity-counter-procart quantity-counter-procart"> <span
                                            class="counter-procart-minus counter-procart">-</span> <input type="number"
                                            class="quantity-procart" min="1" value="1" data-pid=""
                                            data-code=" " /> <span
                                            class="counter-procart-plus                                           counter-procart">+</span>
                                    </div>
                                </div>
                                <div class="price-procart col-3 col-md-3 mg-col-10">
                                    <p class="price-new-cart load-price-new"> 22.500.000₫ </p>
                                    <p class="price-old-cart load-price"> 25.000.000₫ </p>
                                    <p class="price-new-cart load-price"> 25.000.000₫ </p>
                                </div>
                            </div>
                        </div>
                        <div class="procart procart">
                            <div class="row row-10">
                                <div class="pic-procart col-3 col-md-2 mg-col-10"> <a class="text-decoration-none"
                                        href="" target="_blank" title=""> <img width="85px"
                                            height="85px" src="{{ asset('index/imgs/sp.jpg') }}" alt=""> </a> <a
                                        class="del-procart text-decoration-none" data-code="""> <i
                                            class="fa                                       fa-times-circle"></i>
                                        <span>Xóa</span> </a> </div>
                                <div class="info-procart col-6 col-md-5 mg-col-10">
                                    <h3 class="name-procart"><a class="text-decoration-none" href=""
                                            target="_blank" title=""> Nhà Giả Kim (Tái Bản 2020) </a></h3>
                                </div>
                                <div class="quantity-procart col-3 col-md-2 mg-col-10">
                                    <div class="price-procart price-procart-rp">
                                        <p class="price-new-cart load-price-new"> </p>
                                        <p class="price-old-cart load-price"> </p>
                                        <p class="price-new-cart load-price"> </p>
                                    </div>
                                    <div class="quantity-counter-procart quantity-counter-procart"> <span
                                            class="counter-procart-minus counter-procart">-</span> <input type="number"
                                            class="quantity-procart" min="1" value="1" data-pid=""
                                            data-code=" " /> <span
                                            class="counter-procart-plus                                           counter-procart">+</span>
                                    </div>
                                </div>
                                <div class="price-procart col-3 col-md-3 mg-col-10">
                                    <p class="price-new-cart load-price-new"> 22.500.000₫ </p>
                                    <p class="price-old-cart load-price"> 25.000.000₫ </p>
                                    <p class="price-new-cart load-price"> 25.000.000₫ </p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="btn-wrap-cart d-flex justify-content-end align-items-center mt-4">
                    <div class="btn btn-success  btn-cart-back-to-home me-2">
                        <a class="text-light" href=""> Về trang chủ</a>
                    </div>
                    <div class="btn btn-success  btn-cart-next-to-payment">
                        <a class="text-light" href="{{ route('user.payment') }}">Thanh toán</a>
                    </div>

                </div>
                
            </div>
            @else
            {{-- Empty --}}
            <a href="http://127.0.0.1:8000/" class="empty-cart text-decoration-none d-block">
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
