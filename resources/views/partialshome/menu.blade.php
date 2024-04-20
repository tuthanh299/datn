<div class="menu">
    <div class="wrap-content">
        <ul class="menu-main">
            <li>
                <a href="{{route('homepage')}}" title="Trang chủ" title="Trang chủ">
                    Trang chủ
                </a>
            </li>
            <li>
                <a href="danh-muc-san-pham" title="Danh mục" title="Danh mục sản phẩm">
                    Danh mục sản phẩm
                </a>
            </li>
            <li>
                <a href="ve-chung-toi" title="Về chúng tôi" title="Về chúng tôi">
                    Về chúng tôi
                </a>
            </li>
            <li>
                <a href="tin-tuc-su-kien" title="Tin tức & sự kiện" title="Tin tức & sự kiện">
                    Tin tức & sự kiện
                </a>
            </li>
            <li class="search-menu">
                
            </li>
            <li class="menu-partials">
                <div class="flex-menu-partials">
                    <div class="menu-translate">
                        <div class="box-changelang">
                            <div id="google_language_translator"></div>
                            <div class="lang_current">
                                <img src="index/imgs/vi-flag.svg" class="img-lang" alt="Google Translate">
                            </div>
                            <div class="box-showlang">
                                <div class="lang  col-lang">
                                    <a href="" data-value="vi|vi" data-active="/vi/vi" class="changeLanguage"
                                        onclick="doGoogleLanguageTranslator('vi|vi'); return false;">
                                        <img class="hvr-float vi-flag" src="index/imgs/vi-flag.svg" alt="Việt Nam"/>
                                    </a>
                                    <a href="" data-value="vi|en" data-active="/vi/en" class="changeLanguage"
                                        onclick="doGoogleLanguageTranslator('vi|en'); return false;">
                                        <img class="hvr-float eng-flag" src="index/imgs/en-flag.svg" alt="England"/>
                                    </a>
                                    <a href="" data-value="vi|ja" data-active="/vi/ja" class="changeLanguage"
                                        onclick="doGoogleLanguageTranslator('vi|ja'); return false;">
                                        <img class="hvr-float cn-flag" src="index/imgs/jp-flag.svg" alt="Japan"/>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="menu-user-option">
                        <div class="menu-bottom-personalized">
                            <div class="flex-menu-bottom-personalized">
                                @if ($user == null)
                                <div class="menu-bottom-account-positon">
                                    <div id="open-user-btn" class="menu-bottom-account">
                                        <div class="menu-bottom-account-icon">
                                            <i class="fa-solid fa-user"></i>
                                        </div>
                                        <div class="menu-bottom-account-text">
                                            Tài khoản
                                        </div>
                                    </div>
                                    <div class="menu-bottom-account-hidden">
                                        <div class="menu-bottom-account-hidden-cover">
                                            <div class="flex-menu-bottom-account-hidden-cover">
                                                <div class="menu-bottom-account-hidden-cover-text">
                                                </div>
                                                <div id="close-user-btn"
                                                    class="menu-bottom-account-hidden-cover-close-btn">
                                                    <i class="fa-solid fa-circle-xmark"></i>
                                                </div>
                                            </div>
                                            <div class="menu-bottom-account-hidden-btn">
                                                <div class="flex-menu-bottom-account-hidden-btn">
                                                    <div class="menu-bottom-account-hidden-login">
                                                        <a href="{{route('user.login')}}">Đăng
                                                            nhập</a>
                                                    </div>
                                                    <div class="menu-bottom-account-hidden-register">
                                                        <a href="register">Đăng
                                                            ký</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @else
                                <div class="menu-bottom-account-positon">
                                    <div id="open-user-btn" class="menu-bottom-account">
                                        <div class="menu-bottom-account-icon">
                                            <i class="fa-solid fa-user"></i>
                                        </div>
                                        <div class="menu-bottom-account-text">
                                            Xin chào {{$user->name}}
                                        </div>
                                    </div>
                                    <div class="menu-bottom-account-hidden">
                                        <div class="menu-bottom-account-hidden-cover">
                                            <div class="flex-menu-bottom-account-hidden-cover">
                                                <div class="menu-bottom-account-hidden-cover-text">
                                                    Tài khoản của tôi
                                                </div>
                                                <div id="close-user-btn"
                                                    class="menu-bottom-account-hidden-cover-close-btn">
                                                    <i class="fa-solid fa-circle-xmark"></i>
                                                </div>
                                            </div>
                                            <div class="menu-bottom-account-hidden-btn">
                                                <div class="flex-menu-bottom-account-hidden-btn">
                                                    <div class="menu-bottom-account-hidden-login">
                                                        <a href="#">Thông tin</a>
                                                    </div>
                                                    <div class="menu-bottom-account-hidden-register">
                                                        <a href="{{route('userlogout')}}">Đăng xuất</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endif

                                <a href="#">
                                    <div class="menu-bottom-cart-icon-position">
                                        <div id="open-cart-list" class="menu-bottom-cart">
                                            <div class="menu-bottom-cart-icon">
                                                <i class="fa-solid fa-cart-shopping"></i>
                                                <div class="menu-bottom-cart-num">
                                                    0
                                                </div>
                                            </div>
                                            <div class="menu-bottom-cart-text">
                                                Giỏ hàng
                                            </div>
                                        </div>
                                        <div class="menu-bottom-cart-icon-hidden">
                                            <div class="flex-menu-bottom-cart-icon-hidden-cover">
                                                <div class="menu-bottom-cart-icon-hidden-cover-text">
                                                    Sản phẩm trong giỏ hàng
                                                </div>
                                                <div id="close-cart-btn"
                                                    class="menu-bottom-cart-icon-hidden-cover-close-btn">
                                                    <i class="fa-solid fa-circle-xmark"></i>
                                                </div>
                                            </div>
                                            <div class="menu-bottom-cart-list">
                                                <!-- If here -->
                                                <div class="menu-bottom-cart-list-scroll">
    
                                                </div>
    
                                                <div class="menu-bottom-cart-list-none">
                                                    Bạn chưa có sản phẩm nào
                                                    trong giỏ hàng!
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>

                            </div>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</div>