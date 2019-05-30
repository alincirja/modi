"use strict";
import $ from "jquery";

$(".faq-list").on("click", ".question", e => {
    e.preventDefault();
    const $this = $(e.currentTarget).closest("li");
    if ($this.hasClass("expanded")) {
        $this.removeClass("expanded");
    } else {
        $(".faq-list").find("li").removeClass("expanded");
        $this.addClass("expanded");
    }
});

$("#contactSubject").on("change", e => {
    const value = $(e.currentTarget).val();
    if (value === "feedback") {
        $(".occupation-wrap").removeClass("d-none").find("input").attr("required", true);
        $(".title-wrap").removeClass("d-none").find("input").attr("required", true);
    } else {
        $(".occupation-wrap").addClass("d-none").find("input").attr("required", false);
        $(".title-wrap").addClass("d-none").find("input").attr("required", false);
    }
});

$("#contactForm").on("submit", event => {
    event.preventDefault();
    $(event.currentTarget).find(".alert").remove();
    $.ajax({
        url: "scripts/contact/add.php",
        type: "POST",
        data: $(event.currentTarget).serialize(),
        success: res => {
            const jsonData = JSON.parse(res);
            $(event.currentTarget).append("<div class='mt-2 alert alert-" + jsonData.type + "'>" + jsonData.msg + "</div>");
            if (jsonData.type === "success") {
                $(event.currentTarget)[0].reset();
            }
        },
        error: err => {
            console.log(err);
        }
    });
});
