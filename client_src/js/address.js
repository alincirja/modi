"use strict";
import $ from "jquery";

/**
 * REGISTER
 */
$("#shippingAddressForm").on("submit", e => {
    e.preventDefault();
    const action = "addressAdd";
    const form = e.currentTarget;
    const inCart = $(form).find("#inCart") ? true : false;
    $(form).find(".alert").remove();
    $.ajax({
        url: "scripts/address/new.php",
        type: "POST",
        data: $(form).serialize() + "&action=" + action,
        success: function(data) {
            //console.log(data);
            const dataJSON = JSON.parse(data);
            $(form).append("<div class='alert alert-"+dataJSON.type+" mt-3'>"+dataJSON.msg+"</div>");
            if (dataJSON.type === "success") {
                $(form)[0].reset();
                if (inCart) {
                    location.reload();
                }
            }
        },
        error: function(err) {
            alert(err);
        }
    });
});

$("#showNewAddress").on("click", e => {
    e.preventDefault();
    $(e.currentTarget).hide();
    $("#newAddress").removeClass("d-none");
});

$("#hideNewAddress").on("click", e => {
    e.preventDefault();
    $("#newAddress").addClass("d-none");
    $("#showNewAddress").show();
});