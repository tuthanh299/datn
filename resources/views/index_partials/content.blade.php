<!-- Sản phẩm nổi bật -->
<div class="wrap-spnb">
    <div class="wrap-content">
        <div class="main-title-text">SẢN PHẨM NỔI BẬT</div>
        <div class="wrap-slide-spnb">
            <div class="owl-spnb owl-carousel owlCarousel">
                @foreach ($noibats as $noibat)
                <a href="#" class="box-product"  ">
                    @if($noibat->PhanTramGiam != 0)
                    <div class="product-sale-oustanding ">
                        <span class="sale-lb img_hover">{{ $noibat->PhanTramGiam * 100}}%</span>
                    </div>
                    @endif
                    <div class=" scale-img img_hover">
                        <img alt="ảnh lỗi" src="{{ asset('assets/images/sach/GK/' . $noibat->HinhAnh)}}" width="200"
                            height="300"></img>
                    </div>
                    <div class="infor-product">

                    </div>
                    @if($noibat->PhanTramGiam != 0) 
                    <div class="name-product text-split-1">{{$noibat->TenSach}}</div>
                    <div class="price-product">@convert($noibat->DonGia - ($noibat->DonGia *
                        $noibat->PhanTramGiam),0)đ</div>
                    <div class="price-product"><del>@convert($noibat->DonGia,0)đ</del></div>
                    @else
                    <div class="name-product text-split-1">{{$noibat->TenSach}}</div>
                    <div class="price-product">@convert($noibat->DonGia,0)đ</div>
                    @endif

                </a>
                @endforeach
            </div>
        </div>
    </div>
</div>
<!--Sach giao khoa-->
<div class="wrap-spnb">
    <div class="wrap-content wow animate__fadeInLeft" data-wow-duration="2s""">
        <div class="main-title-text">SÁCH GIÁO KHOA</div>
        <div class="wrap-slide-spnb">
            <div class="owl-spnb owl-carousel owlCarousel">
                @foreach ($sgks as $sgks)
                <a href="#" class="box-product">
                    @if($sgks->PhanTramGiam != 0)
                    <div class="product-sale-oustanding ">
                        <span class="sale-lb img_hover">{{$sgks->PhanTramGiam * 100}}%</span>
                    </div>
                    @endif
                    <div class=" scale-img img_hover">
                        <img alt="ảnh lỗi" src="{{ asset('assets/images/sach/GK/' . $sgks->HinhAnh)}}" width="200"
                            height="300"></img>
                    </div>
                    <div class="infor-product">

                    </div>
                    @if($sgks->PhanTramGiam != 0)
                    <div class="name-product text-split-1">{{$sgks->TenSach}}</div>
                    <div class="price-product">@convert($sgks->DonGia - ($sgks->DonGia *
                        $sgks->PhanTramGiam),0)đ</div>
                    <div class="price-product"><del>@convert($sgks->DonGia,0)đ</del></div>
                    @else
                    <div class="name-product text-split-1">{{$sgks->TenSach}}</div>
                    <div class="price-product">@convert($sgks->DonGia,0)đ</div>
                    @endif

                </a>
                @endforeach
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
                @foreach ($thamkhaos as $thamkhao)
                <a href="#" class="box-product">
                    @if($thamkhao->PhanTramGiam != 0)
                    <div class="product-sale-oustanding ">
                        <span class="sale-lb img_hover">{{$thamkhao->PhanTramGiam * 100}}%</span>
                    </div>
                    @endif
                    <div class=" scale-img img_hover">
                        <img alt="ảnh lỗi"
                            src="{{ asset('assets/images/sach/' . $thamkhao->MaLoaiSach . '/' . $thamkhao->HinhAnh)}}"
                            width="200" height="300"></img>
                    </div>
                    <div class="infor-product">

                    </div>
                    @if($thamkhao->PhanTramGiam != 0)
                    <div class="name-product text-split-1">{{$thamkhao->TenSach}}</div>
                    <div class="price-product">@convert($thamkhao->DonGia - ($noibat->DonGia *
                        $thamkhao->PhanTramGiam),0)đ</div>
                    <div class="price-product"><del>@convert($thamkhao->DonGia,0)đ</del></div>
                    @else
                    <div class="name-product text-split-1">{{$thamkhao->TenSach}}</div>
                    <div class="price-product">@convert($thamkhao->DonGia,0)đ</div>
                    @endif

                </a>
                @endforeach
            </div>
        </div>
    </div>
</div>

<!--Xem thêm-->
<div class="xemthem-btn">
<a href="{{route('collections')}}" class="btn btn-success"> Xem thêm</a>
</div>
<!--<button type="button" href="http://127.0.0.1:8000/collections" class="btn btn-success" >Xem thêm</button>-->

<!-- Video News -->
<div class="wrap-video-news">
    <div class="wrap-content">
        <div class="main-title-text">TIN TỨC & VIDEO</div>
        <div class="wrap-vidnews-items">
            <div class="wrap-video">
                <div class="fotorama" data-nav="thumbs" data-autoplay="true" data-width="600" data-height="450"
                    data-thumbwidth="145" data-thumbheight="90">
                    <a href="https://youtu.be/Q2T2JuQgob4"></a>
                    <a href="https://youtu.be/WdCMqN2ukaA"></a>
                    <a href="https://youtu.be/kWCEaNgTCdY"></a>
                    <a href="https://youtu.be/CyKmrNhXM3o"></a>
                </div>
            </div>
            <div class="wrap-news">
                <div class="news-slick">
                    <div class="news-box">
                        <div class="news-img"><img
                                src="https://thumbs.dreamstime.com/b/beautiful-sunset-over-water-tree-silhouette-nature-landscape-amazing-orange-yellow-sky-night-scene-wallpaper-birds-flying-154424473.jpg"
                                alt=""></div>
                        <div class="news-text">
                            <div class="news-name">Lorem ipsum dolor sit amet.</div>
                            <div class="news-desc">Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                                Eius repellat aliquam quidem, voluptatem sed nostrum recusandae.</div>
                            <!-- <div class="news-content"></div> -->
                        </div>
                    </div>
                    <div class="news-box">
                        <div class="news-img"><img
                                src="https://thumbs.dreamstime.com/b/beautiful-sunset-over-water-tree-silhouette-nature-landscape-amazing-orange-yellow-sky-night-scene-wallpaper-birds-flying-154424473.jpg"
                                alt=""></div>
                        <div class="news-text">
                            <div class="news-name">Lorem ipsum dolor sit amet.</div>
                            <div class="news-desc">Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                                Eius repellat aliquam quidem, voluptatem sed nostrum recusandae.</div>
                            <!-- <div class="news-content"></div> -->
                        </div>
                    </div>
                    <div class="news-box">
                        <div class="news-img"><img
                                src="https://thumbs.dreamstime.com/b/beautiful-sunset-over-water-tree-silhouette-nature-landscape-amazing-orange-yellow-sky-night-scene-wallpaper-birds-flying-154424473.jpg"
                                alt=""></div>
                        <div class="news-text">
                            <div class="news-name">Lorem ipsum dolor sit amet.</div>
                            <div class="news-desc">Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                                Eius repellat aliquam quidem, voluptatem sed nostrum recusandae.</div>
                            <!-- <div class="news-content"></div> -->
                        </div>
                    </div>
                    <div class="news-box">
                        <div class="news-img"><img
                                src="https://thumbs.dreamstime.com/b/beautiful-sunset-over-water-tree-silhouette-nature-landscape-amazing-orange-yellow-sky-night-scene-wallpaper-birds-flying-154424473.jpg"
                                alt=""></div>
                        <div class="news-text">
                            <div class="news-name">Lorem ipsum dolor sit amet.</div>
                            <div class="news-desc">Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                                Eius repellat aliquam quidem, voluptatem sed nostrum recusandae.</div>
                            <!-- <div class="news-content"></div> -->
                        </div>
                    </div>
                    <div class="news-box">
                        <div class="news-img"><img
                                src="https://thumbs.dreamstime.com/b/beautiful-sunset-over-water-tree-silhouette-nature-landscape-amazing-orange-yellow-sky-night-scene-wallpaper-birds-flying-154424473.jpg"
                                alt=""></div>
                        <div class="news-text">
                            <div class="news-name">Lorem ipsum dolor sit amet.</div>
                            <div class="news-desc">Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                                Eius repellat aliquam quidem, voluptatem sed nostrum recusandae.</div>
                            <!-- <div class="news-content"></div> -->
                        </div>
                    </div>
                    <div class="news-box">
                        <div class="news-img"><img
                                src="https://thumbs.dreamstime.com/b/beautiful-sunset-over-water-tree-silhouette-nature-landscape-amazing-orange-yellow-sky-night-scene-wallpaper-birds-flying-154424473.jpg"
                                alt=""></div>
                        <div class="news-text">
                            <div class="news-name">Lorem ipsum dolor sit amet.</div>
                            <div class="news-desc">Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                                Eius repellat aliquam quidem, voluptatem sed nostrum recusandae.</div>
                            <!-- <div class="news-content"></div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Xem thêm-->
<div class="xemthem-btn">
    <a href="{{route('tintuc')}}" class="btn btn-success"> Xem thêm</a>
</div>