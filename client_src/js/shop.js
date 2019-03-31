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