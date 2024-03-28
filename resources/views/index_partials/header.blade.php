<div class="header-banner wow animate__fadeInLeft" data-wow-duration="2s""">
    <img src="{{asset('assets/images/slideshow/bannerheader.png')}}" alt="">
</div>
<!--  -->
<div class="header">
    <div class="header-top">
        <div class="wrap-content">
            <div class="header__navbar">
                <ul class="header__navbar-list">
                    <a href="https://bom.so/pPF8sq" class="header__navbar-item header__navbar-item--separate "
                        target="new">
                        <i class="header__navbar-icon fa-solid fa-location-dot"></i>
                        65 Huỳnh Thúc Kháng, P Bến Nghé, Q 1, TP HCM
                    </a>

                    <li class="header__navbar-item">
                        <span class="header__navbar-title--no-pointer">Kết nối</span>
                        <a href="https://bom.so/tyvGGr" class="header__navbar-icon-link">
                            <i class="header__navbar-icon fa-brands fa-facebook"></i>
                        </a>
                        <a href="" class="header__navbar-icon-link">
                            <i class="header__navbar-icon fa-brands fa-square-instagram"></i>
                        </a>
                    </li>
                </ul>

                <ul class="header__navbar-list">
                    <li class="header__navbar-item">
                        <a href="" class="header__navbar-item-link">
                            <i class="header__navbar-icon fa-solid fa-bell"></i>
                            Thông Báo
                        </a>
                        <!-- Click vào chuông hiện thông báo -->
                        <div class="header__notify">
                            <header class="header__notify-header">
                                <h3>Thông báo mới nhận</h3>
                            </header>
                            <ul class="header__notify-list">
                                <li class="header__notify-item header__notify-item--viewed">
                                    <a class="header__notify-link" href="">
                                        <span> <img class="header__notify-img" src="./assets/images/logo/logo.png"
                                                alt="" class="header__notify-img">
                                        </span>
                                        <div class="header__notify-infor">
                                            <span class="header__notify-name">Mắt Biếc Xuất Bản 2019</span>
                                            <span class="header__notify-desc">Tác giả Nguyễn Nhật
                                                Ánh...</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="header__notify-item header__notify-item--viewed">
                                    <a class="header__notify-link" href="">
                                        <span> <img class="header__notify-img" src="./assets/images/logo/logo.png"
                                                alt="" class="header__notify-img">
                                        </span>
                                        <div class="header__notify-infor">
                                            <span class="header__notify-name">Mắt Biếc Xuất Bản 2019</span>
                                            <span class="header__notify-desc">Tác giả Nguyễn Nhật
                                                Ánh...</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="header__notify-item header__notify-item--viewed">
                                    <a class="header__notify-link" href="">
                                        <span> <img class="header__notify-img" src="./assets/images/logo/logo.png"
                                                alt="" class="header__notify-img">
                                        </span>
                                        <div class="header__notify-infor">
                                            <span class="header__notify-name">Mắt Biếc Xuất Bản 2019</span>
                                            <span class="header__notify-desc">Tác giả Nguyễn Nhật
                                                Ánh...</span>
                                        </div>
                                    </a>
                                </li>

                            </ul>
                            <div class="header__notify-footer">
                                <a href="" class="header__notify-footer-btn">Xem tất cả</a>
                            </div>
                        </div>

                    </li>
                    <li class="header__navbar-item">
                        <a href="" class="header__navbar-item-link">
                            <i class="header__navbar-icon fa-solid fa-circle-question"></i>
                            Trợ Giúp
                        </a>
                    </li>
                    <!-- đăng kí đăng nhập Tú làm sao hover vô nó đậm lên nhá, 
                        với lại làm cái separate đừng trùng với tên nút đăng nhập luôn-->
                    @if (isset($_COOKIE['is_logged']) && $_COOKIE['is_logged']== 1)
                    <li class="header__navbar-item">
                        <a href="#">
                            <div class="header__navbar-item">Xin chào: {{ $user1[0]->HoTen }}</div>
                        </a>
                        <div class="header__navbar-item header__navbar-item--separate">|</div>
                        <a href="{{ route('dangxuat') }}" class="header__navbar-item">
                            Đăng xuất
                        </a>
                    </li>
                    @else
                    <li class="header__navbar-item">
                        <a href="{{ route('dangki') }}" class="header__navbar-item">
                            Đăng kí
                        </a>
                        <div class="header__navbar-item header__navbar-item--separate">|</div>
                        <a href="{{ route('dangnhap') }}" class="header__navbar-item">
                            Đăng nhập
                        </a>
                    </li>

                    @endif
                </ul>

            </div>
        </div>
    </div>
    <!-- Header with search -->
    <div class="header-bottom">
        <div class="wrap-content">
            <div class="header-with-search ">
                <div class="logo">
                    <div class="header__logo  ">
                        <div class="peShiner">
                        <a class=" " href="{{route('index')}}"><img class="header__logo-img   "
                                src="{{asset('assets/images/logo/logo.png')}}" alt=""></a>
                        </div>
                        <div class="info-company">
                            <div class="header__cpnname">LT Bookstore</div>
                            <div class="company_desc">Tri thức là sức mạnh</div>
                        </div> 
                    </div>
                </div>
                <div class="header__search">
                    <div class="header__search-input-wrap">
                        <input type="text" class="header__search-input" placeholder="Nhập từ khóa để tìm kiếm">
                        <!-- Search history -->
                        <div class="header__search-history">
                            <h3 class="header__search-history-heading">Lịch sử tìm kiếm</h3>
                            <ul class="header__search-history-list">
                                <li class="header__search-history-items">
                                    <a href="">Thương nhớ Trà Long</a>
                                </li>
                                <li class="header__search-history-items">
                                    <a href="">Cô gái đến từ hôm qua</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <button class="header__search-btn">
                        <i class="header__search-btn-icon fa-solid fa-magnifying-glass"></i>
                    </button>
                </div>
                <!-- Cart -->
                <!-- FadeIn chưa chuẩn -->

                <div class="header__cart">
                    <a href="#">
                        <div class="header__cart-wrap"><i class="header__cart-icon fa-solid fa-cart-shopping"></i>
                            <span class="header__cart-notice">
                                3
                            </span>
                            <!-- No cart: header__cart-list-no-cart-->
                            <div class="header__cart-list ">
                                <img src="./assets/images/chi-tiet/no-cart.png" alt="" class="header__cart-no-cart-img">
                                <span class="header__cart-list-no-cart-msg">Chưa có sản phẩm</span>

                                <h4 class="header__cart-heading">Sản phẩm đã thêm</h4>
                                <ul class="header__cart-list-item">
                                    <!-- Cart item -->
                                    <li class="header__cart-item">
                                        <img src="https://salt.tikicdn.com/cache/100x100/ts/review/9e/80/22/ff1656d3fbc597360c5cce278d4b838c.jpg.webp"
                                            alt="" class="header__cart-img">
                                        <div class="header__cart-item-info -wrap">
                                            <div class="header__cart-item-head">
                                                <div class="header__cart-item-name">Thương nhớ Trà Long
                                                </div>
                                                <div class="header__cart-item-price-wrap">
                                                    <span class="header__cart-item-price">100.000đ</span>
                                                    <span class="header__cart-item-x">x</span>
                                                    <span class="header__cart-item-qnt">2</span>
                                                </div>
                                            </div>
                                            <div class="header__cart-item-body">
                                                <span class="header__cart-item-desc">Loại sản phẩm: Tiểu
                                                    thuyết</span>
                                                <span class="header__cart-item-remove">Xóa</span>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="header__cart-item">
                                        <img src="https://salt.tikicdn.com/cache/100x100/ts/review/9e/80/22/ff1656d3fbc597360c5cce278d4b838c.jpg.webp"
                                            alt="" class="header__cart-img ">
                                        <div class="header__cart-item-info -wrap">
                                            <div class="header__cart-item-head">
                                                <div class="header__cart-item-name">Thương nhớ Trà Long
                                                </div>
                                                <div class="header__cart-item-price-wrap">
                                                    <span class="header__cart-item-price">100.000đ</span>
                                                    <span class="header__cart-item-x">x</span>
                                                    <span class="header__cart-item-qnt">2</span>
                                                </div>
                                            </div>
                                            <div class="header__cart-item-body">
                                                <span class="header__cart-item-desc">Loại sản phẩm: Tiểu
                                                    thuyết</span>
                                                <span class="header__cart-item-remove">Xóa</span>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="header__cart-item">
                                        <img src="https://salt.tikicdn.com/cache/100x100/ts/review/9e/80/22/ff1656d3fbc597360c5cce278d4b838c.jpg.webp"
                                            alt="" class="header__cart-img">
                                        <div class="header__cart-item-info -wrap">
                                            <div class="header__cart-item-head">
                                                <div class="header__cart-item-name">Thương nhớ Trà Long
                                                </div>
                                                <div class="header__cart-item-price-wrap">
                                                    <span class="header__cart-item-price">100.000đ</span>
                                                    <span class="header__cart-item-x">x</span>
                                                    <span class="header__cart-item-qnt">2</span>
                                                </div>
                                            </div>
                                            <div class="header__cart-item-body">
                                                <span class="header__cart-item-desc">Loại sản phẩm: Tiểu
                                                    thuyết</span>
                                                <span class="header__cart-item-remove">Xóa</span>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                                <a href="#"
                                    class="header__cart-view-cart btn btn-primary">Xem Giỏ Hàng
                                </a>
                                <form action="{{ route('vnpay') }}" method="POST">
                                    @csrf
                                    <button type ="submit" name="redirect"> Thanh toán bằng VNPAY </button>
                                </form>
                                <form action="{{ route('vnpay') }}" method="POST">
                                    @csrf
                                    <button type ="submit" name="redirect"> Thanh toán MOMO </button>
                                </form>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>