"use strict";
import $ from "jquery";

/**
 * ADD TO CART
 */
$(document).on("click", ".addtocart", e => {
    e.preventDefault();
    const $this = $(e.currentTarget);
    const data = {
        id: $this.attr("data-id")
    }
    $.ajax({
        url: $this.attr("href"),
        method: "POST",
        data: data,
        success: response => {
            location.reload();
        },
        error: err => {
            console.log(err);
        }
    });
});

$(document).on("click", ".removefromcart", e => {
    e.preventDefault();
    const $this = $(e.currentTarget);
    const data = {
        id: $this.attr("data-id")
    }
    $.ajax({
        url: $this.attr("href"),
        method: "POST",
        data: data,
        success: response => {
            location.reload();
        },
        error: err => {
            console.log(err);
        }
    });
});

/**
 * PLACE ORDER
 */
$(document).on("click", "#placeOrder", e => {
    e.preventDefault();
    const $this = $(e.currentTarget);
    const data = {
        action: "placeOrder",
        id_address: $(document).find("[name=selectedAddress]:checked").val(),
        order_details: $(document).find("[name=orderMessage]").val()
    }
    $.ajax({
        url: "scripts/checkout/order.php",
        method: "POST",
        data: data,
        success: response => {
            //console.log(response);
            const dataJSON = JSON.parse(response);
            if (dataJSON.type === "success") {
                $.ajax({
                    url: "scripts/checkout/dropcart.php"
                });
                location.replace($this.attr("href") + "?page=success");
            }
        },
        error: err => {
            console.log(err);
        }
    });
});