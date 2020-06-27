$(".add-to-cart-button").on("click", function () {
    let id = $(".add-to-cart-button").attr("data-id");
    let quantity = parseInt($("#quantity").val());
    $.ajax({
        type: "POST",
        url: "http://local:8080/sandbox-ecommerce/products/cart",
        data: {
            id,
            quantity
        },
        success: function (response) {
            alert(response);
        }
    });
});