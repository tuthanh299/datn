<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ</title>
    <?php
$cssFiles = glob('index/css/*.css');
foreach ($cssFiles as $file) {
    echo '<link rel="stylesheet" type="text/css" href="' . $file . '">';

}
?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <?php
$jsFiles = glob(public_path('index/js/*.js'));
foreach ($jsFiles as $file) {
    $file = str_replace(public_path(), '', $file);
    echo '<script src="' .$file . '"></script>';
}
?>
</head>

<body>
    <div class="wrap-container">
        <!-- Header -->
        <div class="header">
            <div class="header-top">
                <div class="wrap-content">
                    <div class="flex-header-top">
                        <div class="header-top-address">
                            <a href target="_blank">
                                <i class="fa-solid fa-location-dot"></i>
                                Địa chỉ:
                                16-18 Hai Ba Trung Street, Ben Nghe Ward,
                                District 1,Ho
                                Chi Minh City
                            </a>
                        </div>
                        <div class="header-top-social">
                            <div class="flex-social">
                                <div class="social-item">
                                    <a href target="_blank">
                                        <i class="fa-brands fa-facebook"></i>
                                    </a>
                                </div>
                                <div class="social-item">
                                    <a href target="_blank">
                                        <i class="fa-brands fa-instagram"></i>
                                    </a>
                                </div>
                                <div class="social-item">
                                    <a href target="_blank">
                                        <i class="fa-brands fa-x-twitter"></i>
                                    </a>
                                </div>
                                <div class="social-item">
                                    <a href target="_blank">
                                        <i class="fa-brands fa-youtube"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-bottom">
                <div class="wrap-content">
                    <div class="flex-header-bottom">
                        <div class="header-bottom-logo">
                            <img src="data:image/png;base64,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"
                                alt>
                        </div>
                        <div class="header-bottom-banner">
                            <img src="https://www.buffalostreetbooks.com/sites/buffalostreetbooks.com/files/styles/slideshow_image_1/public/PATREON%20CAMPAIGN%20BANNER.png?itok=itx73PNq"
                                alt>
                        </div>
                        <div class="header-bottom-contact">
                            <div class="flex-header-bottom-contact">
                                <div class="header-bottom-contact-img">
                                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRsUrVUDIHp1hRpBesplVZXHOaKfLI2oyxpgQ&s"
                                        alt>
                                </div>
                                <div class="header-bottom-contact-info">
                                    <div class="header-bottom-contact-text">
                                        Hotline liên hệ:
                                    </div>
                                    <div class="header-bottom-contact-num">
                                        <a href="tel:0768848015">0768848015</a>
                                    </div>
                                    <div class="header-bottom-contact-num">
                                        <a href="tel:0768848015">0768848015</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="header-bottom-personalized">
                            <div class="flex-header-bottom-personalized">
                                <div class="header-bottom-account-positon">
                                    <div id="open-user-btn" class="header-bottom-account">
                                        <div class="header-bottom-account-icon">
                                            <i class="fa-solid fa-user"></i>
                                        </div>
                                        <div class="header-bottom-account-text">
                                            Tài khoản
                                        </div>
                                    </div>
                                    <div class="header-bottom-account-hidden">
                                        <div class="header-bottom-account-hidden-cover">
                                            <div class="flex-header-bottom-account-hidden-cover">
                                                <div class="header-bottom-account-hidden-cover-text">
                                                    Tài khoản của tôi
                                                </div>
                                                <div id="close-user-btn"
                                                    class="header-bottom-account-hidden-cover-close-btn">
                                                    <i class="fa-solid fa-circle-xmark"></i>
                                                </div>
                                            </div>
                                            <div class="header-bottom-account-hidden-btn">
                                                <div class="flex-header-bottom-account-hidden-btn">
                                                    <div class="header-bottom-account-hidden-login">
                                                        <a href="login">Đăng nhập</a>
                                                    </div>
                                                    <div class="header-bottom-account-hidden-register">
                                                        <a href="register">Đăng ký</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="header-bottom-cart-icon-position">
                                    <div id="open-cart-list" class="header-bottom-cart">
                                        <div class="header-bottom-cart-icon">
                                            <i class="fa-solid fa-cart-shopping"></i>
                                            <div class="header-bottom-cart-num">
                                                0
                                            </div>
                                        </div>
                                        <div class="header-bottom-cart-text">
                                            Giỏ hàng
                                        </div>
                                    </div>
                                    <div class="header-bottom-cart-icon-hidden">
                                        <div class="flex-header-bottom-cart-icon-hidden-cover">
                                            <div class="header-bottom-cart-icon-hidden-cover-text">
                                                Sản phẩm trong giỏ hàng
                                            </div>
                                            <div id="close-user-btn"
                                                class="header-bottom-cart-icon-hidden-cover-close-btn">
                                                <i class="fa-solid fa-circle-xmark"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Menu -->
        <div class="menu">
            <div class="wrap-content">
                <ul class="menu-main">
                    <li>
                        <a href="trang-chu" title="Trang chủ">
                            Trang chủ
                        </a>
                    </li>
                    <li>
                        <a href="ve-chung-toi" title="Về chúng tôi">
                            Về chúng tôi
                        </a>
                    </li>
                    <li>
                        <a href="ve-chung-toi" title="Về chúng tôi">
                            Về chúng tôi
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</body>

</html>