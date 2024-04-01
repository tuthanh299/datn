 
function AccountBtnClick() {
    var openUserBtn = document.getElementById("open-user-btn");
    var closeUserBtn = document.getElementById("close-user-btn");
    var userAccount = document.querySelector(".menu-bottom-account-hidden");

    openUserBtn.addEventListener("click", toggleUserAccount);
    closeUserBtn.addEventListener("click", toggleUserAccount);

    function toggleUserAccount() {
        if (userAccount.style.display === "none") {
            userAccount.style.display = "block";
        } else {
            userAccount.style.display = "none";
        }
    }
}

 
function CartBtnClick() {
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

 function TranslateClick() {
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

 
function PeShiner() {
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

/* Slick */
function SlickPage() {
    if ($(".slick-slideshow").length) {
        $(".slick-slideshow").slick({
            dots: true,
            infinite: true,
            autoplaySpeed: 3000,
            slidesToShow: 1,
            slidesToScroll: 1,
            adaptiveHeight: true,
            autoplay: false,
            arrows: true,
            fade: true,
        });
    }
    // if ($(".slick-product-outstanding").length) {
    //     $(".slick-product-outstanding").slick({
    //         dots: true,
    //         infinite: true,
    //         autoplaySpeed: 3000,
    //         slidesToShow: 4,
    //         slidesToScroll: 1,
    //         adaptiveHeight: true,
    //         autoplay: false,
    //         arrows: true,
    //         fade: true,
    //     });
    // }
}
function ProductTnteract() {
    
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
});
 
$(document).ready(function () {
    $(".cart-product-add").each(function () {
        let productQuantityCart = $(this).find(".product-quantity-cart");
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


// Gọi tất cả các hàm khi tài liệu đã sẵn sàng
$(document).ready(function () {
    AccountBtnClick();
    CartBtnClick();
    TranslateClick();
    PeShiner();
    SlickPage();
    ProductTnteract();
});
