<div class="modal fade" id="account-modal" tabindex="-1" role="dialog" aria-labelledby="account-modal-label"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body modal-account">
                <div class="modal-line d-flex justify-content-center align-items-center gap-2">
                    <div class="tab-account-button" onclick="openCity(event, 'tab-login')" id="defaultOpen">Đăng Nhập
                    </div>
                    <div class="tab-account-button" onclick="openCity(event, 'tab-signup')">Đăng ký</div>
                </div>
                <div id="tab-login" class="tabcontent">
                    <form id="login-form-member" class="form" action="" method="post">
                        @csrf
                        <div>
                            <div class="input-group mb-2">
                                <div class="input-group-append login-input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-user"></span>
                                    </div>
                                </div>
                                <input type="text" name="email" value="{{ old('email') }}"
                                    class="form-control text-sm " placeholder="Nhập email" autocomplete="off" />
                            </div>
                            <label class="emailMember-error error"  for="emailMember" style=""></label>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-append login-input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                            <input type="password" name="password" id="password" class="form-control text-sm"
                                placeholder="Nhập mật khẩu" />
                            <div class="input-group-append">
                                <div class="input-group-text show-password">
                                    <span class="fas fa-eye"></span>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="form-check form-check-login mb-0">
                                <label for="remember-me" class="text-info"><span>Ghi nhớ đăng nhập</span>
                                    <span class="align-middle">
                                        <input id="remember-me" name="remember_me" type="checkbox"></span></label><br>
                            </div>
                            <div class="form-check form-check-login mb-0">
                                <a href="">Quên mật khẩu?</a>
                            </div>
                        </div>

                        <div class="text-center text-lg-start mt-3 btn-login-member">
                            <input type="submit" id="remember-me" name="remember_me"
                                class="btn-lg btn btn-sm bg-danger btn-block w-100" value="Đăng Nhập">
                        </div>
                        <div class="no-account-text text-center">
                            <div>
                                Chưa có tài khoản? <a onclick="openCity(event, 'tab-signup')">Đăng ký</a>
                            </div>
                            <div>
                                <div>Hoặc đăng nhập với: <a href=""><i class="fa-brands fa-google"></i></a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <div id="tab-signup" class="tabcontent">
                    <form id="login-form-member" class="form" action="" method="post">
                        @csrf
                        <div>
                            <label class="mb-1">Họ tên:</label>
                            <div class="input-group mb-2">
                                <div class="input-group-append login-input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-user"></span>
                                    </div>
                                </div>
                                <input type="text" name="" class="form-control text-sm "
                                    placeholder="Nhập họ tên" autocomplete="off" />
                            </div>
                        </div>
                        <div>
                            <label class="mb-1">Số điện thoại:</label>
                            <div class="input-group mb-2">
                                <div class="input-group-append login-input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas  fa-phone"></span>
                                    </div>
                                </div>
                                <input type="text" name="" class="form-control text-sm "
                                    placeholder="Nhập số điện thoại" autocomplete="off" />
                            </div>
                        </div>
                        <div>
                            <label class="mb-1">Email:</label>
                            <div class="input-group mb-2">
                                <div class="input-group-append login-input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-envelope"></span>
                                    </div>
                                </div>
                                <input type="text" name="email" value="{{ old('email') }}"
                                    class="form-control text-sm " placeholder="Nhập email" autocomplete="off" />
                            </div>
                            <label class="emailMember-error error"   for="emailMember"
                                style=""></label>
                        </div>

                        <div>
                            <label class="mb-1">Mật khẩu:</label>
                            <div class="input-group mb-3">
                                <div class="input-group-append login-input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-lock"></span>
                                    </div>
                                </div>
                                <input type="password" name="password" id="password" class="form-control text-sm"
                                    placeholder="Nhập mật khẩu" />
                                <div class="input-group-append">
                                    <div class="input-group-text show-password">
                                        <span class="fas fa-eye"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <label class="mb-1">Nhập lại mật khẩu:</label>
                            <div class="input-group mb-3">
                                <div class="input-group-append login-input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-lock"></span>
                                    </div>
                                </div>
                                <input type="password" name="re-password" id="re-password"
                                    class="form-control text-sm" placeholder="Nhập lại mật khẩu" />
                                <div class="input-group-append">
                                    <div class="input-group-text show-password">
                                        <span class="fas fa-eye"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-center text-lg-start mt-3 btn-login-member">
                            <input type="submit" class="btn-lg btn btn-sm bg-danger btn-block w-100"
                                value="Đăng ký">
                        </div> 
                    </form> 
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    /* Tab */
    function openCity(evt, cityName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tab-account-button");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].classList.remove("active");
        }
        document.getElementById(cityName).style.display = "block";
        evt.currentTarget.classList.add("active");
    }
    document.getElementById("defaultOpen").click();
    /* Validate Email */ 
    document.addEventListener('DOMContentLoaded', function() {
        var emailInputsLogin = document.querySelectorAll('#tab-login input[name="email"]');
        var emailInputsSignup = document.querySelectorAll('#tab-signup input[name="email"]');
        var emailRegex = /^[a-zA-Z0-9._]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

        function validateEmail(input, errorLabel) {
            if (!input.value) {
                errorLabel.textContent = 'Vui lòng nhập email.';
                errorLabel.style.display = 'block';
            } else if (!emailRegex.test(input.value)) {
                errorLabel.textContent = 'Vui lòng nhập email đúng định dạng.';
                errorLabel.style.display = 'block';
            } else {
                errorLabel.style.display = 'none';
            }
        } 
        emailInputsLogin.forEach(function(emailInput) {
            var emailErrorLabel = emailInput.parentElement.nextElementSibling;
            emailInput.addEventListener('input', function() {
                validateEmail(emailInput, emailErrorLabel);
            });
        }); 
        emailInputsSignup.forEach(function(emailInput) {
            var emailErrorLabel = emailInput.parentElement.nextElementSibling;
            emailInput.addEventListener('input', function() {
                validateEmail(emailInput, emailErrorLabel);
            });
        });
    });
</script>
