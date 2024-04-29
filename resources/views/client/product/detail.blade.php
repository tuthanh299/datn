@extends('client.layouts.index')

@section('content')
    <div class="wrap-content">
        <div class="grid-product-detail row">
            <div class="left-product-detail col-md-6 col-lg-5 mb-4">
                <div class="group-product-image">
                    <div class="slick-product-image-core">
                        <img class="w-100" src="{{ $productDetail->product_photo_path }}" alt="{{ $productDetail->name }}">
                    </div>
                    <div class="slick-product-image-detail">

                    </div>
                </div>
            </div>
            

            <div class="right-product-detail col-md-6 col-lg-7 mb-4">
                <h1 class="name-product-detail">
                    {{ $productDetail->name }}
                </h1>
                <div class="attribute-product-detail">
                    Mã sách: <span class="attribute-product-detail-text text-danger">{{ $productDetail->code }}</span>
                </div>
                <div class="attribute-product-detail">
                    Danh mục: <a class="attribute-product-detail-text-link">{{ $productDetail->category->name }}</a>
                </div>
                <div class="attribute-product-detail">
                    Tác giả: <a class="attribute-product-detail-text-link">{{ $productDetail->author }}</a>
                </div>
                <div class="attribute-product-detail">
                    Nhà xuất bản: <a class="attribute-product-detail-text-link">{{ $productDetail->publisher->name }}</a>
                </div>
                <div class="attribute-product-detail">
                    Năm xuất bản: <span class="attribute-product-detail-text">{{ $productDetail->publishing_year }}</span>
                </div>
                <div class="price-product-detail">
                    Giá: <span class="price-new-product-detail">@formatmoney($productDetail->sale_price)</span> <span
                        class="price-old-product-detail">@formatmoney($productDetail->regular_price)</span>
                </div>
            </div>
        </div>
    </div>
@endsection
