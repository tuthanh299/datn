/* Open user btn */
window.onload = function() {
    // Lấy phần tử với id "open-user-btn"
    var openBtn = document.getElementById('open-user-btn');
    // Lấy phần tử với id "close-user-btn"
    var closeBtn = document.getElementById('close-user-btn');
    // Lấy phần tử với class "header-bottom-account-hidden"
    var account = document.querySelector('.header-bottom-account-hidden');

    // Thêm sự kiện click cho nút mở và nút đóng
    openBtn.addEventListener('click', toggleAccount);
    closeBtn.addEventListener('click', toggleAccount);

    function toggleAccount() {
        // Kiểm tra nếu phần tử account đang hiển thị hay không
        if (account.style.display === 'none') {
            // Nếu không, hiển thị nó
            account.style.display = 'block';
        } else {
            // Nếu có, ẩn nó
            account.style.display = 'none';
        }
    }
}
