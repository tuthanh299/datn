@extends('layouts.app')
@section('content')
            <!-- Content -->
            <!-- Cart -->
            <!--<div class="wrap-gio-hang">
                <div class="wrap-content">
                    <div class="wrap-cart">
                        <div class="row">
                            <div class="top-cart col-12 col-lg-7">
                                <p class="title-cart">Giỏ hàng của bạn:</p>
                                <div class="list-procart">
                                    <div class="procart procart-label">
                                        <div class="form-row">
                                            <div class="pic-procart col-3 col-md-2">Hình ảnh</div>
                                            <div class="info-procart col-6 col-md-5">Tên sản phẩm</div>
                                            <div class="quantity-procart col-3 col-md-2">
                                                <p>Số lượng</p>
                                                <p>Thành tiền</p>
                                            </div>
                                            <div class="price-procart col-3 col-md-3">Thành tiền</div>
                                        </div>
                                    </div>
                                    <div class="procart  ">
                                        <div class="form-row">
                                            <div class="pic-procart col-3 col-md-2">
                                                <a class="text-decoration-none" href=" " target="_blank"
                                                    title="ÁO THUN  ">
                                                    <img class="lazy loaded" onerror="this.src=' "
                                                        data-was-processed="true">
                                                </a>
                                                <a class="del-procart text-decoration-none" data-code="">
                                                    <i class="fa fa-times-circle"></i>
                                                    <span>Xóa</span>
                                                </a>
                                            </div>
                                            <div class="info-procart col-6 col-md-5">
                                                <h3 class="name-procart"><a class="text-decoration-none" href=""
                                                        target="_blank" title="ÁO THUN ">ÁO THUN </a></h3>
                                                <div class="properties-procart">
                                                </div>
                                            </div>
                                            <div class="quantity-procart col-3 col-md-2">
                                                <div class="price-procart price-procart-rp">
                                                    <p class="price-new-cart load-price-new-">
                                                        235.000₫ </p>
                                                    <p class="price-old-cart load-price-">
                                                        245.000₫ </p>
                                                </div>
                                                <div
                                                    class="quantity-counter-procart quantity-counter-procart- d-flex align-items-stretch justify-content-between">
                                                    <span class="counter-procart-minus counter-procart">-</span>
                                                    <input type="number" class="quantity-procart" min="1" value="1"
                                                        data-pid="17" data-code="">
                                                    <span class="counter-procart-plus counter-procart">+</span>
                                                </div>
                                            </div>
                                            <div class="price-procart col-3 col-md-3">
                                                <p class="price-new-cart load-price-new-">
                                                    235.000₫ </p>
                                                <p class="price-old-cart load-price-">
                                                    245.000₫ </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="money-procart">
                                    <div class="total-procart d-flex align-items-center justify-content-between">
                                        <p>Tổng tiền:</p>
                                        <p class="total-price load-price-total">235.000₫</p>
                                    </div>
                                </div>
                            </div>
                            <div class="bottom-cart col-12 col-lg-5">
                                <div class="section-cart">
                                    <p class="title-cart">Hình thức thanh toán:</p>
                                    <div class="information-cart">
                                    </div>
                                    <p class="title-cart">THÔNG TIN NGƯỜI NHẬN:</p>
                                    <div class="information-cart">
                                        <div class="form-row">
                                            <div class="input-cart col-md-6">
                                                <input type="text" class="form-control text-sm" id="fullname"
                                                    name="dataOrder[fullname]" placeholder="Họ tên" value=""
                                                    required="">
                                                <div class="invalid-feedback">Vui lòng nhập họ và tên</div>
                                            </div>
                                            <div class="input-cart col-md-6">
                                                <input type="number" class="form-control text-sm" id="phone"
                                                    name="dataOrder[phone]" placeholder="Số điện thoại" value=""
                                                    required="">
                                                <div class="invalid-feedback">Vui lòng nhập số điện thoại</div>
                                            </div>
                                        </div>
                                        <div class="input-cart">
                                            <input type="email" class="form-control text-sm" id="email"
                                                name="dataOrder[email]" placeholder="Email" value="" required="">
                                            <div class="invalid-feedback">Vui lòng nhập địa chỉ email</div>
                                        </div>
                                        <div class="form-row">
                                            <div class="input-cart col-md-4">
                                                <select class="select-city-cart custom-select text-sm" required=""
                                                    id="city" name="dataOrder[city]">
                                                    <option value="">Tỉnh/thành phố</option>

                                                </select>
                                                <div class="invalid-feedback">Vui lòng chọn tỉnh thành</div>
                                            </div>
                                            <div class="input-cart col-md-4">
                                                <select
                                                    class="select-district-cart select-district custom-select text-sm"
                                                    required="" id="district" name="dataOrder[district]">
                                                    <option value="">Quận/huyện</option>
                                                </select>
                                                <div class="invalid-feedback">Vui lòng chọn quận huyện</div>
                                            </div>
                                            <div class="input-cart col-md-4">
                                                <select class="select-ward-cart select-ward custom-select text-sm"
                                                    required="" id="ward" name="dataOrder[ward]">
                                                    <option value="">Phường/xã</option>
                                                </select>
                                                <div class="invalid-feedback">Vui lòng chọn phường xã</div>
                                            </div>
                                        </div>
                                        <div class="input-cart">
                                            <input type="text" class="form-control text-sm" id="address"
                                                name="dataOrder[address]" placeholder="Địa chỉ" value="" required="">
                                            <div class="invalid-feedback">Vui lòng nhập địa chỉ</div>
                                        </div>
                                        <div class="input-cart">
                                            <textarea class="form-control text-sm" id="requirements"
                                                name="dataOrder[requirements]"
                                                placeholder="Yêu cầu khác (không bắt buộc)"></textarea>
                                        </div>
                                    </div>
                                    <input type="submit" class="btn-cart btn btn-primary btn-lg btn-block"
                                        name="thanhtoan" value="Thanh toán">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>-->
            <!-- Cart no product -->
            <div class="wrap-cart-no-product">
                <div class="wrap-content">

                    <form class="form-cart validation-cart" novalidate="" method="post" action=""
                        enctype="multipart/form-data">
                        <div class="wrap-cart">
                            <div class="row">
                                <a href="{{route('index')}}" class="empty-cart text-decoration-none w-100">
                                    <i class="fa fa-cart-arrow-down"></i>
                                    <p>Không tồn tại sản phẩm nào trong giỏ hàng !</p>
                                    <span>Về trang chủ</span>
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
@endsection