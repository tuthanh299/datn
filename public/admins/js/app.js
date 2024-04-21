function isExist(ele) {
	return ele.length;
}

/* PreviewImage */
function previewImage(inputId, previewId) {
    const fileInput = document.getElementById(inputId);
    const output = document.getElementById(previewId);

    fileInput.addEventListener('change', function(event) {
        const reader = new FileReader();
        reader.onload = function() {
            output.innerHTML = '<img class="rounded" src="' + reader.result + '" alt="Preview Photo">';
        };
        reader.readAsDataURL(event.target.files[0]);
    });
}
/* Action delete */
function actionDelete(event) {
    event.preventDefault();
    let urlRequest = $(this).data("url");
    let that = $(this);
    Swal.fire({
        title: "Bạn có chắc không?",
        text: "Bạn sẽ không thể hoàn tác hành động này!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Có, hãy xóa nó!",
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: "GET",
                url: urlRequest,
                success: function (data) {
                    if (data.code == 200) {
                        that.parent().parent().remove();
                        Swal.fire({
                            title: "Đã xóa!",
                            text: "Tệp của bạn đã được xóa.",
                            icon: "success",
                        });
                    }
                },
                error: function () {},
            });
        }
    });
}
$(function () {
    $(document).on("click", ".action_delete", actionDelete);
});
/* Select  Roles User */
function initializeSelect2() {
    $(".select2_option").select2({
        placeholder: "Chọn vai trò",
    });
}
/* Call */
$(document).ready(function() {
    previewImage('file-zone', 'photoUpload-preview'); // Cho Favicon
    previewImage('file-zone2', 'photoUpload-preview2'); // Cho Logo
});
$(document).ready(function () {
    initializeSelect2();
});
$(document).ready(function () {
    $(".summernote").summernote();
});

 
