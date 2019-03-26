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
