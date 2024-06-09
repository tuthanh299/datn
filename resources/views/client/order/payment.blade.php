@extends('client.layouts.index')

@section('content')
    <div class="wrap-content">
        <div class="wrap-pay">
            <div class="row">
                <div class="top-cart col-12 col-lg-7">
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
                    <div class="money-procart">
                        <div class="total-procart">
                            <p>Tạm tính:</p>
                            <p class="total-price load-price-temp"></p>
                        </div>
                        <div class="total-procart">
                            <p>Phí vận chuyển:</p>
                            <p class="total-price load-price-ship">0đ</p>
                        </div>
                        <div class="total-procart">
                            <p>Tổng tiền:</p>
                            <p class="total-price load-price-total"></p>
                        </div>
                    </div>
                </div>
                <div class="bottom-cart col-12 col-lg-5">
                    <div class="section-cart">
                        <p class="title-cart">Hình thức thanh toán:</p>
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
                        </div>
                        <p class="title-cart">Thông tin giao hàng:</p>
                        <div class="information-cart">
                            <div class="row row-10">
                                <div class="input-cart col-md-6 mg-col-10">
                                    <div class="form-floating form-floating-cus"> <input type="text"
                                            class="form-control text-sm" id="fullname" name="dataOrder[fullname]"
                                            placeholder="Họ tên" value="" required /> <label for="fullname">Họ
                                            tên</label> </div>
                                    <div class="invalid-feedback">Vui lòng nhập họ tên</div>
                                </div>
                                <div class="input-cart col-md-6 mg-col-10">
                                    <div class="form-floating form-floating-cus"> <input type="number"
                                            class="form-control text-sm" id="phone" name="dataOrder[phone]"
                                            placeholder="Điện thoại" value="" required /> <label
                                            for="phone">Điện thoại</label> </div>
                                    <div class="invalid-feedback">Vui lòng nhập số điện thoại</div>
                                </div>
                            </div>
                            <div class="input-cart">
                                <div class="form-floating form-floating-cus"> <input type="email"
                                        class="form-control text-sm" id="email" name="dataOrder[email]"
                                        placeholder="Email" value="" required /> <label
                                        for="email">Email</label> </div>
                                <div class="invalid-feedback">Vui lòng nhập email</div>
                            </div>
                            <div class="row row-10">
                                <div class="input-cart col-md-4 mg-col-10 form-floating-cus"> <select
                                        class="select-city-cart form-select form-control text-sm" required id="city"
                                        name="dataOrder[city]">
                                        <option value="">Tỉnh thành</option>
                                        <option value=""></option>
                                    </select>
                                    <div class="invalid-feedback">Vui lòng chọn tỉnh thành</div>
                                </div>
                                <div class="input-cart col-md-4 mg-col-10 form-floating-cus"> <select
                                        class="select-district-cart select-district form-select form-control text-sm"
                                        required id="district" name="dataOrder[district]">
                                        <option value="">Quận huyện</option>
                                    </select>
                                    <div class="invalid-feedback">Vui lòng chọn quận huyện</div>
                                </div>
                                <div class="input-cart col-md-4 mg-col-10 form-floating-cus"> <select
                                        class="select-ward-cart select-ward form-select form-control text-sm" required
                                        id="ward" name="dataOrder[ward]">
                                        <option value="">Phường xã</option>
                                    </select>
                                    <div class="invalid-feedback">Vui lòng chọn phường xã</div>
                                </div>
                            </div>
                            <div class="input-cart">
                                <div class="form-floating form-floating-cus"> <input type="text"
                                        class="form-control text-sm" id="address" name="dataOrder[address]"
                                        placeholder="Địa chỉ" value=" " required /> <label for="address">Địa
                                        chỉ</label> </div>
                                <div class="invalid-feedback">Vui lòng nhập địa chỉ</div>
                            </div>
                            <div class="input-cart">
                                <div class="form-floating form-floating-cus">
                                    <textarea class="form-control text-sm" id="requirements" name="dataOrder[requirements]"
                                        placeholder="Yêu cầu khác" /> </textarea> <label for="requirements">Yêu cầu khác</label>
                                </div>
                            </div>
                        </div> <input type="submit" class="btn btn-primary btn-cart w-100" name="thanhtoan"
                            value="Thanh toán" disabled />
                    </div>
                </div>
                 
            </div>
        </div>
    </div>
@endsection
