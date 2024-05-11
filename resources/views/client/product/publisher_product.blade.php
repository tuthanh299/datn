@extends('client.layouts.index')

@section('content')
    <div class="wrap-content">
        <div class="title-main">
            <span>
                <?= $pagename ?>
            </span>
        </div>
        <div class="content-main">
            @isset($publisherproduct)
                @if (!$publisherproduct->isEmpty())
                    <div class="grid-product-internal">
                        @foreach ($publisherproduct as $v)
                            <div class="product-item" data-aos="fade-up" data-aos-duration="1000">
                                <div class="product" data-aos="zoom-in-up">
                                    <div class="box-product text-decoration-none">
                                        <div class="position-relative overflow-hidden  ">
                                            <a class="pic-product " href="{{ route('product.detail', ['id' => $v->id]) }}"
                                                title="Sản phẩm">
                                                <div class="pic-product-img scale-img hover_light">
                                                    <img class="w-100" src="{{ $v->product_photo_path }}"
                                                        alt="{{ $v->name }}">
                                                </div>
                                            </a>
                                        </div>
                                        <div class="info-product">
                                            <div class="name-product"><a class="text-split-2"
                                                    href="{{ route('product.detail', ['id' => $v->id]) }}"
                                                    title="{{ $v->name }}">{{ $v->name }}</a>
                                            </div>
                                            <div class="-cart">
                                                <div class="product-quantity">
                                                    <span class="product-quantity-text">Còn hàng:</span>
                                                    <span class="product-quantity-num-sub-text">
                                                        <span class="product-quantity-num">4</span>
                                                        <span class="product-quantity-num-sub-text">sản phẩm</span>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="flex-price-cart-product">
                                                <div class="price-product">
                                                    <div class="price-new">

                                                        @formatmoney($v->sale_price)
                                                    </div>
                                                    <div class="price-old">
                                                        @formatmoney($v->regular_price)
                                                    </div>
                                                    <div class="discount">
                                                        {{ $v->discount }}%
                                                    </div>
                                                </div>
                                                <div class="cart-product-add">
                                                    <div class="flex-cart-product-add-quantity">
                                                        <div class="product-quantity-cart">
                                                            <div class="product-quantity-cart-flex">
                                                                <button class="decrement-cart">-</button>
                                                                <input type="number" class="quantity-input" value="0"
                                                                    min="0">
                                                                <button class="increment-cart">+</button>
                                                            </div>
                                                        </div>
                                                        <div class="cart-product-add-btn">
                                                            <i class="fa-solid fa-cart-shopping"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="col-md-12 mt-3 text-center">
                        {{ $publisherproduct->links('pagination::bootstrap-5') }}
                    </div>
                @else
                    <div class="alert alert-warning w-100">
                        <strong>Thông tin đang được cập nhật. Vui lòng kiểm tra lại sau để không bỏ lỡ bất kỳ nội dung mới nào!</strong>
                    </div>
                @endif
            @endisset
        </div>
    </div>
@endsection
