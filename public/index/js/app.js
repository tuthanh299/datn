function isExist(className) {
    return document.getElementsByClassName(className).length > 0;
}

function PeShiner() {
    if (!isExist($(".peShiner"))) {
        jQuery.browser = {};
        (function () {
            jQuery.browser.msie = false;
            jQuery.browser.version = 0;
            if (navigator.userAgent.match(/MSIE ([0-9]+)\./)) {
                jQuery.browser.msie = true;
                jQuery.browser.version = RegExp.$1;
            }
        })();
        $(window).bind("load", function () {
            $(".peShiner").each(function () {
                var api = $(this).peShiner({
                    api: true,
                    paused: true,
                    reverse: true,
                    repeat: 1,
                    color: "fireHL",
                });
                /* Color: monoHL, oceanHL, fireHL */
                api.resume();
            });
        });
    }
}

function TranslateClick() {
    if (!isExist($(".changeLanguage"))) {
        $(".changeLanguage").click(function (event) {
            var value = $(this).data("value");

            $(".changeLanguage").removeClass("active");
            $(this).addClass("active");
            var text_1 = $(".changeLanguage.active").html();
            $(".lang_current").html(text_1);
            doGoogleLanguageTranslator(value);
            return false;
        });
        $(".box-showlang").hide();
        $(".lang_current").click(function (e) {
            e.stopPropagation();
            $(".box-showlang").slideToggle();
        });
        $(".box-showlang").click(function (e) {
            e.stopPropagation();
        });
        $(document).click(function () {
            $(".box-showlang").slideUp();
        });
    }
}

function setupBackToTop() {
    "use strict";
    var progressPath = document.querySelector(".scrollToTop path");
    var pathLength = progressPath.getTotalLength();
    progressPath.style.transition = progressPath.style.WebkitTransition =
        "none";
    progressPath.style.strokeDasharray = pathLength + " " + pathLength;
    progressPath.style.strokeDashoffset = pathLength;
    progressPath.getBoundingClientRect();
    progressPath.style.transition = progressPath.style.WebkitTransition =
        "stroke-dashoffset 10ms linear";

    var updateProgress = function () {
        var scroll = $(window).scrollTop();
        var height = $(document).height() - $(window).height();
        var progress = pathLength - (scroll * pathLength) / height;
        progressPath.style.strokeDashoffset = progress;
    };

    updateProgress();
    $(window).scroll(updateProgress);

    var offset = 150;
    var duration = 550;

    $(window).on("scroll", function () {
        if ($(this).scrollTop() > offset) {
            $(".scrollToTop").addClass("active-progress");
        } else {
            $(".scrollToTop").removeClass("active-progress");
        }
    });

    $(".scrollToTop").on("click", function (event) {
        event.preventDefault();
        $("html, body").animate({ scrollTop: 0 }, duration);
        return false;
    });
}

function CartBtnClick() {
    if (!isExist($(".menu-bottom-cart-icon-hidden"))) {
        var openCartBtn = document.getElementById("open-cart-list");
        var closeCartBtn = document.getElementById("close-cart-btn");
        var cartIcon = document.querySelector(".menu-bottom-cart-icon-hidden");

        openCartBtn.addEventListener("click", toggleCartIcon);
        closeCartBtn.addEventListener("click", toggleCartIcon);

        function toggleCartIcon() {
            if (cartIcon.style.display === "none") {
                cartIcon.style.display = "block";
            } else {
                cartIcon.style.display = "none";
            }
        }
    }
}

function ProductTnteract() {
    if (!isExist($(".cart-product-add"))) {
        $(document).ready(function () {
            $(".increment-cart").click(function () {
                var value = parseInt($(this).prev(".quantity-input").val());
                $(this)
                    .prev(".quantity-input")
                    .val(value + 1);
            });

            $(".decrement-cart").click(function () {
                var value = parseInt($(this).next(".quantity-input").val());
                if (value > 0) {
                    $(this)
                        .next(".quantity-input")
                        .val(value - 1);
                }
            });

            $(".cart-product-add").each(function () {
                let productQuantityCart = $(this).find(
                    ".product-quantity-cart"
                );
                let quantityInput = $(this).find(".quantity-input");
                productQuantityCart.hide();
                $(this).hover(
                    function () {
                        productQuantityCart.show();
                        $(this).css("border", "solid 1px #ccc");
                    },
                    function () {
                        if (quantityInput.val() == 0) {
                            productQuantityCart.hide();
                            $(this).css("border", "");
                        }
                    }
                );
                quantityInput.on("input", function () {
                    if (quantityInput.val() != 0) {
                        productQuantityCart.show();
                        $(this).parent().css("border", "solid 1px #ccc");
                    } else {
                        productQuantityCart.hide();
                        $(this).parent().css("border", "");
                    }
                });
            });
        });

        $("input[type=number]").on("keydown", function (e) {
            if (e.key == "ArrowUp" || e.key == "ArrowDown") {
                e.preventDefault();
            }
        });
    }
}

function initializeSlick(selector, options) {
    if (!isExist($(selector))) {
        $(selector).slick(options);
    }
}

function SlickPage() {
    initializeSlick(".slick-slideshow", {
        dots: false,
        infinite: true,
        autoplaySpeed: 3000,
        slidesToShow: 1,
        slidesToScroll: 1,
        adaptiveHeight: false,
        autoplay: true,
        arrows: false,
        fade: true,
    });

    initializeSlick(".slick-news-ex", {
        dots: false,
        infinite: true,
        autoplaySpeed: 3500,
        slidesToShow: 4,
        slidesToScroll: 1,
        adaptiveHeight: false,
        autoplay: true,
        arrows: false,
        fade: false,
    });
    initializeSlick(".slick-product-outstanding", {
        dots: false,
        infinite: true,
        autoplaySpeed: 3500,
        slidesToShow: 5,
        slidesToScroll: 1,
        adaptiveHeight: false,
        autoplay: true,
        arrows: false,
        fade: false,
    });
    initializeSlick(".slick-publisher-ex", {
        dots: false,
        infinite: true,
        autoplaySpeed: 3500,
        slidesToShow: 8,
        slidesToScroll: 1,
        adaptiveHeight: false,
        autoplay: true,
        arrows: false,
        fade: false,
    });
    initializeSlick(".slick-other-news-internal", {
        dots: false,
        infinite: true,
        autoplaySpeed: 5000,
        slidesToShow: 3,
        slidesToScroll: 1,
        adaptiveHeight: true,
        vertical: true,
        verticalSwiping: true,
        autoplay: true,
        infinite: true,
        arrows: false,
    });
    initializeSlick(".slick-other-news-internal", {
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        fade: true,
        asNavFor: ".slick-video-small",
    });
    initializeSlick(".slick-other-news-internal", {
        slidesToShow: 3,
        slidesToScroll: 1,
        asNavFor: ".slick-video-large",
        dots: false,
        autoplay: true,
        centerMode: true,
        infinite: true,
        arrows: false,
        centerPadding: "0px",
        focusOnSelect: true,
        autoplaySpeed: 3000,
    });
    $(".slick-product-image-core").slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        fade: true,
        asNavFor: ".slick-product-image-detail",
    });
    $(".slick-product-image-detail").slick({
        slidesToShow: 5,
        slidesToScroll: 1,
        asNavFor: ".slick-product-image-core",
        dots: false,
        autoplay: true,
        centerMode: true,
        infinite: true,
        arrows: false,
        centerPadding: "0px",
        focusOnSelect: true,
        autoplaySpeed: 3000,
    });
}

function AllRun() {
    $(window).scroll(function () {
        var cach_top = $(window).scrollTop();
        var height_header = $(".header").height() + $(".menu").height();

        if (cach_top >= height_header) {
            if (
                !$(".menu").hasClass(
                    "fix-menu animate__animated animate__fadeIn"
                )
            ) {
                $(".menu").addClass(
                    "fix-menu animate__animated animate__fadeIn"
                );
            }
        } else {
            $(".menu").removeClass(
                "fix-menu animate__animated animate__fadeIn"
            );
        }
    });
    function ShowHideSocial() {
        $("body").on("click", ".show-btn-wrapper", function (e) {
            $(".show-btn-wrapper").toggleClass("toggle");
        });
    }
    setTimeout(ShowHideSocial, 2000);

    $(document).ready(function () {
        $(".flex-categorysecond").on(
            "click",
            ".categorysecond",
            function (event) {
                event.preventDefault();
                var categoryParentId = $(this).data("idf");
                var categoryId = $(this).data("ids");

                $(this)
                    .closest(".wrap-content")
                    .find(".flex-categorysecond .categorysecond")
                    .removeClass("active");
                $(this).addClass("active");

                $.ajax({
                    url: $(this).data("url"),
                    type: "GET",
                    data: { categoryId: categoryId },
                    success: function (response) {
                        $(".paging-product-category-" + categoryParentId).html(
                            ""
                        );
                        var productHtml = "";
                        if (response.products && response.products.length > 0) {
                            response.products.forEach(function (product) {
                                productHtml += 
                                '<div class="product-item" data-aos="fade-up" data-aos-duration="1000">' +
                                '<div class="product" data-aos="zoom-in-up">' +
                                '<div class="box-product text-decoration-none">' +
                                '<div class="position-relative overflow-hidden">' +
                                '<a class="pic-product" href="/product/' +
                                product.id +
                                '" title="' +
                                product.name +
                                '">' +
                                '<div class="pic-product-img scale-img hover_light">' +
                                '<img class="w-100" src="' +
                                product.product_photo_path +
                                '" alt="' +
                                product.name +
                                '">' +
                                "</div>" +
                                "</a>" +
                                "</div>" +
                                '<div class="info-product">' +
                                '<div class="name-product"><a class="text-split-2" href="/product/' +
                                product.id +
                                '" title="' +
                                product.name +
                                '">' +
                                product.name +
                                "</a></div>" +
                                '<div class="-cart">' +
                                '<div class="product-quantity">' +
                                '<span class="product-quantity-text">Còn hàng:</span>' +
                                '<span class="product-quantity-num-sub-text">' +
                                '<span class="product-quantity-num">4</span>' +
                                '<span class="product-quantity-num-sub-text">sản phẩm</span>' +
                                "</span>" +
                                "</div>" +
                                "</div>" +
                                '<div class="flex-price-cart-product">' +
                                '<div class="price-product">' +
                                '<div class="price-new">' +
                                product.sale_price +
                                "</div>" +
                                '<div class="price-old">' +
                                product.regular_price +
                                "</div>" +
                                '<div class="discount">' +
                                product.discount +
                                "%</div>" +
                                "</div>" +
                                '<div class="cart-product-add">' +
                                '<div class="flex-cart-product-add-quantity">' +
                                '<div class="product-quantity-cart">' +
                                '<div class="product-quantity-cart-flex">' +
                                '<button class="decrement-cart">-</button>' +
                                '<input type="number" class="quantity-input" value="0" min="0">' +
                                '<button class="increment-cart">+</button>' +
                                "</div>" +
                                "</div>" +
                                '<div class="cart-product-add-btn">' +
                                '<i class="fa-solid fa-cart-shopping"></i>' +
                                "</div>" +
                                "</div>" +
                                "</div>" +
                                "</div>" +
                                "</div>" +
                                "</div>" +
                                "</div>" + 
                                "</div>";
                            });

                            $(
                                ".paging-product-category-" + categoryParentId
                            ).html(productHtml);
                        } else {
                            productHtml =
                                '<div class="alert alert-warning w-100 gr-100">' +
                                "<strong>Thông tin đang được cập nhật. Vui lòng kiểm tra lại sau để không bỏ lỡ bất kỳ nội dung mới nào!</strong>" +
                                "</div>";
                            $(
                                ".paging-product-category-" + categoryParentId
                            ).html(productHtml);
                        }
                    },
                    error: function (xhr, status, error) {
                        console.error(xhr.responseText);
                    },
                });
            }
        );
        $(".categorysecond.active").each(function (event) {            
            var categoryParentId = $(this).data("idf");
            var categoryId = $(this).data("ids"); 
            $.ajax({
                url: $(this).data("url"),
                type: "GET",
                data: { categoryId: categoryId },
                success: function (response) {
                    $(".paging-product-category-" + categoryParentId).html("");
                    var productHtml = "";
                    if (response.products && response.products.length > 0) {
                        response.products.forEach(function (product) {
                            productHtml += 
                                '<div class="product-item" data-aos="fade-up" data-aos-duration="1000">' +
                                '<div class="product" data-aos="zoom-in-up">' +
                                '<div class="box-product text-decoration-none">' +
                                '<div class="position-relative overflow-hidden">' +
                                '<a class="pic-product" href="/product/' +
                                product.id +
                                '" title="' +
                                product.name +
                                '">' +
                                '<div class="pic-product-img scale-img hover_light">' +
                                '<img class="w-100" src="' +
                                product.product_photo_path +
                                '" alt="' +
                                product.name +
                                '">' +
                                "</div>" +
                                "</a>" +
                                "</div>" +
                                '<div class="info-product">' +
                                '<div class="name-product"><a class="text-split-2" href="/product/' +
                                product.id +
                                '" title="' +
                                product.name +
                                '">' +
                                product.name +
                                "</a></div>" +
                                '<div class="-cart">' +
                                '<div class="product-quantity">' +
                                '<span class="product-quantity-text">Còn hàng:</span>' +
                                '<span class="product-quantity-num-sub-text">' +
                                '<span class="product-quantity-num">4</span>' +
                                '<span class="product-quantity-num-sub-text">sản phẩm</span>' +
                                "</span>" +
                                "</div>" +
                                "</div>" +
                                '<div class="flex-price-cart-product">' +
                                '<div class="price-product">' +
                                '<div class="price-new">' +
                                product.sale_price +
                                "</div>" +
                                '<div class="price-old">' +
                                product.regular_price +
                                "</div>" +
                                '<div class="discount">' +
                                product.discount +
                                "%</div>" +
                                "</div>" +
                                '<div class="cart-product-add">' +
                                '<div class="flex-cart-product-add-quantity">' +
                                '<div class="product-quantity-cart">' +
                                '<div class="product-quantity-cart-flex">' +
                                '<button class="decrement-cart">-</button>' +
                                '<input type="number" class="quantity-input" value="0" min="0">' +
                                '<button class="increment-cart">+</button>' +
                                "</div>" +
                                "</div>" +
                                '<div class="cart-product-add-btn">' +
                                '<i class="fa-solid fa-cart-shopping"></i>' +
                                "</div>" +
                                "</div>" +
                                "</div>" +
                                "</div>" +
                                "</div>" +
                                "</div>" +
                                "</div>" + 
                                "</div>";
                        }); 
                        $(".paging-product-category-" + categoryParentId).html(
                            productHtml
                        );
                    } else {
                        productHtml =
                            '<div class="alert alert-warning w-100 gr-100">' +
                            "<strong>Thông tin đang được cập nhật. Vui lòng kiểm tra lại sau để không bỏ lỡ bất kỳ nội dung mới nào!</strong>" +
                            "</div>";
                        $(".paging-product-category-" + categoryParentId).html(
                            productHtml
                        );
                    }
                },
                error: function (xhr, status, error) {
                    console.error(xhr.responseText);
                },
            });
        });
    });
}

$(document).ready(function () {
    AOS.init({
        once: false,
    });
    PeShiner();
    TranslateClick();
    setupBackToTop();
    CartBtnClick();
    ProductTnteract();
    SlickPage();

    AllRun();
});
