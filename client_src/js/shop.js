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
    $this.closest(".container").find(".alert").remove();
    const data = {
        action: "placeOrder",
        id_address: $(document).find("[name=selectedAddress]:checked").val(),
        order_details: $(document).find("[name=orderMessage]").val(),
        delivery_time: $(document).find("#orderDeliveryDate").val() + " " + 
            $(document).find("#orderDeliveryTimeHour").val() + ":" + 
            $(document).find("#orderDeliveryTimeMinute").val(),
        total_price: $(document).find("[name=orderSubtotal]").val(),
        donation_amount: $(document).find("[name=orderDonation]").val(),
        shipping_cost: $(document).find("[name=orderShipping]").val()
    }
    $.ajax({
        url: "scripts/checkout/order.php",
        method: "POST",
        data: data,
        success: response => {
            console.log(response);
            const dataJSON = JSON.parse(response);
            if (dataJSON.type === "success") {
                $.ajax({
                    url: "scripts/checkout/dropcart.php",
                    type: "POST",
                    data: {
                        "action": "dropAll"
                    },
                    success: () => {
                        location.replace($this.attr("href") + "?page=success");
                    }
                });
            } else {
                $this.closest(".container").append(`<div class="alert alert-${dataJSON.type}">${dataJSON.msg}</div>`);
            }
        },
        error: err => {
            console.log(err);
        }
    });
});

/**
 * DELIVERY
 */
$(document).on("change", "#orderDeliveryDate", e => {
    const dateSelected = e.target.value;
    const today = $(e.target).attr("data-today");
    const $fieldHour = $("#orderDeliveryTimeHour");
    const $fieldMins = $("#orderDeliveryTimeMins");
    if (dateSelected) {
        if (dateSelected === today) {
            const minH = Number($fieldHour.attr("data-current-hour")) + 1;
            if (minH > Number($fieldHour.attr("max"))) {
                alert("Astazi nu se mai pot face livrari.");
                $(e.target).val("");
            } else {
                $fieldHour.attr("min", minH);
            }
        } else {
            $fieldHour.attr("min", "0");
        }
    }
});

/**
 * DONATION
 */
$(document).on("click", ".btn-donation", e => {
    const $target = $(e.currentTarget).closest(".btn-donation");
    const targetVal = $target.attr("value");
    const $showBtn =$(".btn-donation[value=show]");
    const $form = $("#donationForm");
    const donationAmount = $form.find("[name=donationAmount]").val();

    if (targetVal === "show") {
        $showBtn.addClass("d-none");
        $form.removeClass("d-none");
    } else {
        $.ajax({
            url: $target.attr("data-url"),
            type: "POST",
            data: {
                "action": $target.attr("data-action"),
                "donationAmount": donationAmount
            },
            success: res => {
                location.reload();
            }
        });
    }
});