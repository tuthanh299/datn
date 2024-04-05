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

/* Preview Photo */
function previewImage(event) {
    var reader = new FileReader();
    reader.onload = function () {
        var output = document.getElementById("preview");
        output.src = reader.result;
        output.style.display = "block";
    };
    reader.readAsDataURL(event.target.files[0]);
}
class ImagePreviewer {
    constructor(previewElementId) {
        this.previewElement = document.getElementById(previewElementId);
    }

    previewImage(event) {
        var reader = new FileReader();
        reader.onload = () => {
            this.previewElement.src = reader.result;
            this.previewElement.style.display = "block";
        };
        reader.readAsDataURL(event.target.files[0]);
    }
}

var previewer1 = new ImagePreviewer('preview1');
var previewer2 = new ImagePreviewer('preview2');

$(".select2_option").select2({
    placeholder: "Chọn vai trò",
});

/* Validate name input */
// document.querySelector('input[name="name"]').addEventListener('input', function (e) {
//     e.target.value = e.target.value.replace(/[^a-zA-Z0-9\s]/g, '');
// });

/* Select2 */
/* Admin select roles */
