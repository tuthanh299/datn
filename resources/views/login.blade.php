<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <?php
$cssFiles = glob('mdblogin/css/*.css');
foreach ($cssFiles as $file) {
    echo '<link rel="stylesheet" type="text/css" href="' . $file . '">';

}
?>
    <?php
$jsFiles = glob(public_path('mdblogin/js/*.js'));
foreach ($jsFiles as $file) {
    $file = str_replace(public_path(), '', $file);
    echo '<script src="' . $file . '"></script>';
}
?>
</head>

<body>

    <section class="vh-100">
        <div class="container-fluid h-custom">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-md-9 col-lg-6 col-xl-5">
                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp"
                        class="img-fluid" alt="Sample image">
                </div>
                <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                    <form id="login-form" class="form" action="" method="post">
                        @csrf
                        <div class="divider d-flex align-items-center my-4">
                            <p class="text-center fw-bold mx-3 mb-0">Sign in</p>
                        </div>
                        <!-- Email input -->
                        <div class="form-outline mb-4">
                            <input type="text" name="email" id="username" value="{{ old('email') }}"
                                class="form-control form-control-lg" placeholder="Enter a valid email address" />
                        </div>
                        <!-- Password input -->
                        <div class="form-outline mb-3 form-admin-login-pasword">
                            <input type="password" name="password" id="password" class="form-control form-control-lg"
                                placeholder="Enter password" />
                            <span toggle="#password" class="admin-login-pasword-show-hide fa fa-fw fa-eye field-icon toggle-password"></span>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="form-check mb-0">
                                <div class="form-group">
                                    <label for="remember-me" class="text-info"><span>Remember me</span> <span><input
                                                id="remember-me" name="remember_me" type="checkbox"></span></label><br>

                                </div>
                            </div>
                            <a href="#!" class="text-body">Forgot password?</a>
                        </div>
                        <div class="text-center text-lg-start mt-4 pt-2">
                            <input type="submit" id="remember-me" name="remember_me" class="btn btn-primary btn-lg"
                                value="Login" style="padding-left: 2.5rem; padding-right: 2.5rem;">
                            <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a href="#!"
                                    class="link-danger">Register</a></p>
                        </div>
                        @if ($errors->has('login_error'))
                        <div class="alert alert-danger">
                            {{ $errors->first('login_error') }}
                        </div>
                        @endif
                    </form>
                </div>
            </div>
        </div>
        <div
            class="d-flex flex-column flex-md-row text-center text-md-start justify-content-between py-4 px-4 px-xl-5 bg-primary">
            <!-- Copyright -->
            <div class="text-white mb-3 mb-md-0">
                Copyright © 2024 TL Bookstore. All rights reserved
            </div>
            <!-- Copyright -->
            <!-- Right -->
            <div>
                <a href="#!" class="text-white me-4">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="#!" class="text-white me-4">
                    <i class="fab fa-twitter"></i>
                </a>
                <a href="#!" class="text-white me-4">
                    <i class="fab fa-google"></i>
                </a>
                <a href="#!" class="text-white">
                    <i class="fab fa-linkedin-in"></i>
                </a>
            </div>
            <!-- Right -->
        </div>
    </section>


</body>

</html>