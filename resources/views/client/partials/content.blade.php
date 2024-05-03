<?php
use App\Http\Controllers\Clients\IndexController;
?>
@isset($productOutstanding)
    @if (!$productOutstanding->isEmpty())
        {{-- Product Oustanding --}}
        <div class="wrap-product-outstanding py50">
            <div class="wrap-content">
                <div class="title-main">
                    <span>Sản phẩm nổi bật</span>
                </div>
                <div class="slick-product-outstanding-cover">
                    <div class="slick-product-outstanding">
                        @foreach ($productOutstanding as $v)
                            <div class="product-outstanding-item" data-aos="fade-up" data-aos-duration="1000">
                                <div class="product" data-aos="zoom-in-up">
                                    <div class="box-product text-decoration-none">
                                        <div class="position-relative overflow-hidden  ">
                                            <a class="pic-product " href="{{ route('product.detail', ['id' => $v->id]) }}" title="Sản phẩm">
                                                <div class="pic-product-img scale-img hover_light">
                                                    <img class="w-100" src="{{ $v->product_photo_path }}"
                                                        alt="{{ $v->name }}">
                                                </div>
                                            </a>
                                        </div>
                                        <div class="info-product">
                                            <div class="name-product"><a class="text-split-2" href="{{ route('product.detail', ['id' => $v->id]) }}"
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
                </div>
            </div>
        </div>
    @endif
@endisset
@isset($news)
    @if (!$news->isEmpty())
        {{-- News --}}
        <div class="wrap-news-ex py50">
            <div class="wrap-content">
                <div class="title-main">
                    <span>Tin tức</span>
                </div>
                <div class="slick-news-ex">
                    @foreach ($news as $v)
                        <div class="news-box-ex" data-aos="fade-up" data-aos-duration="1000">
                            <a href="{{ route('news.detail', ['id' => $v->id]) }}">
                                <div class="news-box-ex-img scale-img hover_light">
                                    <img src="{{ $v->photo_path }}" alt="{{ $v->name }}" class="w-100">
                                </div>
                                <div class="news-box-ex-info">
                                    <div class="news-box-ex-name text-split-2"> {{ $v->name }}</div>
                                    <div class="news-box-ex-desc text-split-3">{!! $v->description !!}</div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif
@endisset
