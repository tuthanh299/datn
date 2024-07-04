function isExist(className) {
    return document.getElementsByClassName(className).length > 0;
}

/* PreviewImage */
function previewImage(inputId, previewId) {
    const fileInput = document.getElementById(inputId);
    const output = document.getElementById(previewId);

    if (fileInput && output) {
        fileInput.addEventListener("change", function (event) {
            if (event.target.files.length > 0) {
                const reader = new FileReader();
                reader.onload = function () {
                    output.innerHTML =
                        '<img class="rounded" src="' +
                        reader.result +
                        '" alt="Preview Photo">';
                };
                reader.readAsDataURL(event.target.files[0]);
            }
        });
    }
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
function SumoSelectImportInvoive() {
    if (isExist("sumoselectimportinvoice")) {
        $(".sumoselectimportinvoice").SumoSelect({
            okCancelInMulti: true,
            placeholder: "Chọn sản phẩm",
        });
        $(".sumoselectimportinvoice").on("change", function () {
            var productId = $(this).val();

            $.ajax({
                url: $(this).data("url"),
                type: "GET",
                data: { productId: productId },

                success: function (response) {
                    $(".list-product-call-by-ajax").empty();
                    $.each(response.products, function (index, product) {
                        var productBlock = `
                            <div class="col-4 product-call-by-ajax" id="${product.id}">
                                <div class="card card-primary card-outline text-sm">
                                <input type="hidden" name="product_id[]" value="${product.id}" class="form-control">
                                    <div class="card-header">
                                        <h3 class="card-title">
                                            <strong>${product.name}</strong>
                                        </h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="">Số lượng nhập</label>
                                            <input type="number" name="quantity[]"  value="" class="form-control quantity-input">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Giá nhập / sản phẩm</label>
                                            <input type="number" name="import_price[]" value=""  class="form-control format-price import_price">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        `;
                        $(".list-product-call-by-ajax").append(productBlock);
                    });
                },
                error: function (xhr, status, error) {
                    console.log(error);
                },
            });
        });
    }
}

function calculateTotalPrice() {
    var totalPrice = 0;
    $(".product-call-by-ajax").each(function () {
        var quantity = $(this).find('input[name="quantity[]"]').val();
        var importPrice = $(this).find('input[name="import_price[]"]').val();
        if (quantity && importPrice) {
            totalPrice += parseFloat(quantity) * parseFloat(importPrice);
        }
    });
    setTimeout(function () {
        $('input[name="total_price"]').val(totalPrice.toFixed(2));
    }, 2000);
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

function calculate() {
    

    $("body").on("change", "input.import_price, input.quantity-input", function () {
        let _total = 0;

        $("body")
            .find(".product-call-by-ajax")
            .each(function () {
                const currentPrice = $(this).find("input.import_price").val()?parseInt($(this).find("input.import_price").val()):0;
                const quantity = $(this).find('input[name="quantity[]"]').val()?parseInt($(this).find('input[name="quantity[]"]').val()):0;

                let tempTotal = 0;
                tempTotal += currentPrice * quantity;

                _total += tempTotal;
                $('input[name="total_price"]').val(_total);
            });
    });
}

window.onload = function () {
    if (window.location.search) {
        window.history.replaceState(
            {},
            document.title,
            window.location.pathname + "?search_keyword="
        );
    }
};
$(document).ready(function () {
    $('input[name="quantity[]"], input[name="import_price[]"]').on(
        "change",
        calculateTotalPrice
    );
    calculate();
    JsAdmin();
    CheckRole();
    initializeSelect2();
    SumoSelectImportInvoive();
    previewImage("file-zone", "photoUpload-preview"); // Cho Favicon
    previewImage("file-zone2", "photoUpload-preview2"); // Cho Logo
});
