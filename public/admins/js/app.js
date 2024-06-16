function isExist(className) {
    return document.getElementsByClassName(className).length > 0;
}

/* PreviewImage */
function previewImage(inputId, previewId) {
    const fileInput = document.getElementById(inputId);
    const output = document.getElementById(previewId);

    fileInput.addEventListener("change", function (event) {
        const reader = new FileReader();
        reader.onload = function () {
            output.innerHTML =
                '<img class="rounded" src="' +
                reader.result +
                '" alt="Preview Photo">';
        };
        reader.readAsDataURL(event.target.files[0]);
    });
}

/* Action delete */
function actionDelete(event) {
    event.preventDefault();
    if (!isExist("action_delete")) return;

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
    if (isExist("action_delete")) {
        $(document).on("click", ".action_delete", actionDelete);
    }
});

/* Select  Roles User */
function initializeSelect2() {
    if (!isExist("select2_option")) return;

    $(".select2_option").select2({
        placeholder: "Chọn vai trò",
    });
}
function CheckRole() {
    /* Role */
    $(".checkbox_parent").on("click", function () {
        $(this)
            .parents(".checkbox-role")
            .find(".checkbox_children")
            .prop("checked", $(this).prop("checked"));
    });
    $(".checkbox_all").on("click", function () {
        $(this)
            .parents()
            .find(".checkbox_parent,.checkbox_children")
            .prop("checked", $(this).prop("checked"));
    });
}
function JsAdmin() {
    if (isExist("summernote")) {
        $(".summernote").summernote();
    }
}

$(document).ready(function () {
    JsAdmin();
    CheckRole();
    initializeSelect2();
    previewImage("file-zone", "photoUpload-preview"); // Cho Favicon
    previewImage("file-zone2", "photoUpload-preview2"); // Cho Logo
});
