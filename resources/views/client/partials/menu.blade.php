<?php
use App\Http\Controllers\Clients\IndexController;
?>
<div class="menu">
    <div class="wrap-content">
        <ul class="menu-main">
            <li class="menu-main-li">
                <a href="http://127.0.0.1:8000/" title="Trang chủ">
                    Trang chủ
                </a>
            </li>
            <li class=" menu-main-li dropdown mega-dropdown active">
                <a href="{{ route('product') }}" class="dropdown-toggle" title="Danh mục sản phẩm"
                    data-toggle="dropdown">Danh mục sản phẩm </a>
                <div class="dropdown-menu mega-dropdown-menu" style="display: block !important;">
                    <div class="">
                        <div class="col-md-2 col-sm-2 ht-tab">
                            <ul class="nav nav-tabs" role="tablist">
                                @if (!IndexController::MenuCategory()->isEmpty())
                                    @foreach (IndexController::MenuCategory() as $v)
                                        <li class="">
                                            <a href="#tab-id-{{ $v->id }}" role="tab" data-toggle="tab"
                                                class="menucategory-first-title">{{ $v->name }}</a>
                                        </li>
                                    @endforeach
                                @endif
                            </ul>
                        </div>
                        <div class="col-md-10 col-sm-10 ht-tab">
                            <div class="tab-content">
                                @foreach (IndexController::MenuCategory() as $v)
                                    <div class="tab-pane"
                                        id="tab-id-{{ $v->id }}">
                                        @foreach ($v->children as $menucategorysecond)
                                            <div class="col-md-4 ht-ul">
                                                <div class="menucategory-second-title">
                                                    <a
                                                        href="{{ route('categoryid.categoryidproduct', ['id' => $menucategorysecond->id]) }}">{{ $menucategorysecond->name }}</a>
                                                </div>
                                                <ul class="nav-list list-inline">
                                                    @foreach ($menucategorysecond->children as $menucategorythird)
                                                        <li><a href="{{ route('categoryid.categoryidproduct', ['id' => $menucategorythird->id]) }}"
                                                                class="menucategory-thrid-title">{{ $menucategorythird->name }}</a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endforeach
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li class="menu-main-li">
                <a href="{{ route('aboutus') }}" title="Về chúng tôi">
                    Về chúng tôi
                </a>
            </li>
            <li class="menu-main-li">
                <a href="{{ route('news') }}" title="Tin tức & sự kiện">
                    Tin tức & sự kiện
                </a>
            </li>
            <li class="menu-main-li">
                <a href=" " title="Tìm kiếm">
                    Tìm kiếm <i class="fa-brands fa-searchengin"></i>
                </a>
            </li>
            <li class="menu-partials ">
                <div class="flex-menu-partials">

                    <div class="menu-user-option">
                        <div class="menu-bottom-personalized">
                            <div class="flex-menu-bottom-personalized">


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
                                <div class="menu-bottom-account-positon" data-bs-toggle="modal"
                                    data-bs-target="#account-modal">
                                    @if (Auth::guard('member')->check())
                                        <div class="menu-bottom-account">
                                            <div class="menu-bottom-account-icon">
                                                <i class="fa-solid fa-user"></i>
                                            </div>
                                            <div class="menu-bottom-account-text">
                                                Xin chào: {{ $user->name }}
                                            </div>
                                        </div>
                                    @else
                                        <div class="menu-bottom-account">
                                            <div class="menu-bottom-account-icon">
                                                <i class="fa-solid fa-user"></i>
                                            </div>
                                            <div class="menu-bottom-account-text">
                                                Đăng nhập / Đăng kí
                                            </div>
                                        </div>
                                    @endif

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="menu-translate">
                        <div class="box-changelang">
                            <div id="google_language_translator"></div>
                            <div class="lang_current">
                                <img src="{{ asset('index/imgs/vi-flag.svg') }}" class="img-lang"
                                    alt="Google Translate">
                            </div>
                            <div class="box-showlang">
                                <div class="lang  col-lang">
                                    <a href="" data-value="vi|vi" data-active="/vi/vi" class="changeLanguage"
                                        onclick="doGoogleLanguageTranslator('vi|vi'); return false;">
                                        <img class="hvr-float vi-flag" src="{{ asset('index/imgs/vi-flag.svg') }}"
                                            alt="Việt Nam" />
                                    </a>
                                    <a href="" data-value="vi|en" data-active="/vi/en" class="changeLanguage"
                                        onclick="doGoogleLanguageTranslator('vi|en'); return false;">
                                        <img class="hvr-float eng-flag" src="{{ asset('index/imgs/en-flag.svg') }}"
                                            alt="England" />
                                    </a>
                                    <a href="" data-value="vi|ja" data-active="/vi/ja" class="changeLanguage"
                                        onclick="doGoogleLanguageTranslator('vi|ja'); return false;">
                                        <img class="hvr-float cn-flag" src="{{ asset('index/imgs/jp-flag.svg') }}"
                                            alt="Japan" />
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</div>
