@extends('layouts.app')
@section('content')
<!--slide show-->
@include ('index_partials.slideshow') 
<!--partner-->
@include ('index_partials.partner') 
<!-- Sản phẩm nổi bật -->
<div class="wrap-spnb">
    <div class="wrap-content">
        <div class="main-title-text">SẢN PHẨM NỔI BẬT</div>
        <div class="wrap-slide-spnb">
            <div class="owl-spnb owl-carousel owlCarousel">
                <!-- sản phẩm -->
                <a href="#" class="box-product">
                    <div class="product-sale-oustanding ">
                        <span class="sale-lb img_hover">10%</span>            
                    </div>
                    <div class=" scale-img img_hover">
                        <img alt="ảnh lỗi"
                        src="{{asset('assets/images/sach/GK/an-v6.jpg')}}"
                        width="200" height="300"></img>
                    </div>
                    <div class="name-product">Âm Nhạc Và Mỹ Thuật Lớp 6</div>
                    <div class="price-product">68,000đ</div>
                    <div class="price-product"><del>100,000đ</del></div>
                </a>
                <!-- end sản phẩm -->
            </div>
        </div>
    </div>
</div>
<!--Sach giao khoa-->
<div class="wrap-spnb">
    <div class="wrap-content">
        <div class="main-title-text">SÁCH GIÁO KHOA</div>
        <div class="wrap-slide-spnb">
            <div class="owl-spnb owl-carousel owlCarousel">
                <!-- sản phẩm -->
                <a href="#" class="box-product">
                    <div class="product-sale-oustanding ">
                        <span class="sale-lb img_hover">10%</span>            
                    </div>
                    <div class=" scale-img img_hover">
                        <img alt="ảnh lỗi"
                        src="{{asset('assets/images/sach/GK/an-v6.jpg')}}"
                        width="200" height="300"></img>
                    </div>
                    <div class="name-product">Âm Nhạc Và Mỹ Thuật Lớp 6</div>
                    <div class="price-product">68,000đ</div>
                    <div class="price-product"><del>100,000đ</del></div>
                </a>
                <!-- end sản phẩm -->
            </div>
        </div>
    </div>
</div>
<!--Sach tham khao-->
<div class="wrap-spnb">
    <div class="wrap-content">
        <div class="main-title-text">SÁCH THAM KHẢO</div>
        <div class="wrap-slide-spnb">
            <div class="owl-spnb owl-carousel owlCarousel">
                <!-- sản phẩm -->
                <a href="#" class="box-product">
                    <div class="product-sale-oustanding ">
                        <span class="sale-lb img_hover">10%</span>            
                    </div>
                    <div class=" scale-img img_hover">
                        <img alt="ảnh lỗi"
                        src="{{asset('assets/images/sach/GK/an-v6.jpg')}}"
                        width="200" height="300"></img>
                    </div>
                    <div class="name-product">Âm Nhạc Và Mỹ Thuật Lớp 6</div>
                    <div class="price-product">68,000đ</div>
                    <div class="price-product"><del>100,000đ</del></div>
                </a>
                <!-- end sản phẩm -->
            </div>
        </div>
    </div>
</div>
@include ('index_partials.js')   
@endsection

<!--Mau san pham-->

<!--
    <a href="#" class="box-product">
        <div class="product-sale-oustanding ">
            <span class="sale-lb img_hover">10%</span>            
        </div>
        <div class=" scale-img img_hover">
            <img alt="ảnh lỗi"
            src="D:\dacnhantam86.jpg"
            width="200" height="300"></img>
        </div>
        <div class="name-product">Đắc Nhân Tâm</div>
        <div class="price-product">68,000đ</div>
        <div class="price-product"><del>100,000đ</del></div>
    </a>
-->