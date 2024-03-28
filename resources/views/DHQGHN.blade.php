@extends('layouts.app')
@section('content')
            <!-- Main -->

            <!-- bỏ all sản phẩm, bên trái là danh mục sản phẩm, 
                 ở dưới có thể có tìm theo mức giá, dưới nữa có thể 
                 lọc theo nhà xuất bản bla bla, bên phải là sản phẩm -->

            <!--Bên trái-->

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{route('index')}}">Trang chủ</a></li>
                  <li class="breadcrumb-item"><a href="{{route('collections')}}">Sản phẩm</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Nhà xuât bản</li>
                  <li class="breadcrumb-item active" aria-current="page">Đại Học Quốc Gia Hà Nội</li>
 
                </ol>
            </nav>
                
            <!--Bên phải-->         
            <div class="all-right">
                <div class="wrap-product padding50">
                    <div class="wrap-content">
                        <div class="product-list">
                            
                            @foreach ($hns as $all)
                            <a href="{{route('amnhac6')}}" class="box-product">
                                @if($all->PhanTramGiam != 0)
                                    <div class="product-sale-oustanding ">
                                        <span class="sale-lb img_hover">{{$all->PhanTramGiam * 100}}%</span>
                                    </div>
                                @endif
                                <div class=" scale-img img_hover">
                                    <img alt="ảnh lỗi" src="{{ asset('./assets/images/sach/' . $all->MaLoaiSach . '/' . $all->HinhAnh)}}"
                                    width="200" height="300"></img>
                                </div>
                                <div class="infor-product">
                                    
                                </div>
                                @if($all->PhanTramGiam != 0)
                                    <div class="name-product">{{$all->TenSach}}</div>
                                    <div class="price-product">@convert($all->DonGia - ($all->DonGia * $all->PhanTramGiam),0)đ</div> 
                                    <div class="price-product"><del>@convert($all->DonGia,0)đ</del></div> 
                                @else
                                    <div class="name-product">{{$all->TenSach}}</div>
                                    <div class="price-product">@convert($all->DonGia,0)đ</div>
                                @endif
                                
                            </a>
                            @endforeach
                        </div>
                    </div>
                 </div>
            </div>
@endsection