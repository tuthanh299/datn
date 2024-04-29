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
}
AOS.init({
    once: false,
});
$(document).ready(function () {
    PeShiner();
    TranslateClick();
    setupBackToTop();
    CartBtnClick();
    ProductTnteract();
    SlickPage();
    AllRun();
});
