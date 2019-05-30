"use strict";
import $ from "jquery";

/**
 * INSERT IMAGE
 */
$("#insertImageForm").on("submit", e => {
    e.preventDefault();
    const $form = $(e.currentTarget);

    $form.find(".alert").remove();
    let formData = new FormData($form[0]);
    $.ajax({
        url: "scripts/admin/image/insert.php",
        type: "POST",
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        success: function(data) {
            const dataJSON = JSON.parse(data);
            $form.append("<div class='alert alert-"+dataJSON.type+"'>"+dataJSON.msg+"</div>");
            if (dataJSON.type === "success") {
                location.reload();
            }
        },
        error: function(err) {
            console.log(err);
        }
    });
});

$(".deleteImage").on("click", e => {
    e.preventDefault();
    const item = $(e.currentTarget);
    const data = {
        "action": "deleteImage"
    }
    $.ajax({
        url: $(item).attr("href"),
        type: "POST",
        data: data,
        success: function(data) {
            console.log(data);
            const dataJSON = JSON.parse(data);
            if (dataJSON.type === "success") {
                location.reload();
            }
        },
        error: function(err) {
            console.log(err);
        }
    });
    return false;
});

$(document).on("click", ".toggleOrderDetails", e => {
    e.preventDefault();
    const $thisOrder = $(e.currentTarget).closest(".order");
    if ($thisOrder.hasClass("opened")) {
        $thisOrder.removeClass("opened");
    } else {
        $(".order-list .order").removeClass("opened");
        $thisOrder.addClass("opened");
    }
});

$(document).on("click", ".save-status", e => {
    e.preventDefault();
    const $this = $(e.currentTarget);
    $this.closest(".status-update").find(".alert").remove();
    const id = $this.data("id");
    const value = $(document).find("#orderStatus" + id).val();
    const data = {
        "action": "updateStatus",
        "orderId": id,
        "value": value
    }
    console.log(data);

    $.ajax({
        url: "scripts/admin/order/status.php",
        type: "POST",
        data: data,
        success: res => {
            console.log(res);
            const dataJSON = JSON.parse(res);
            $this.closest(".status-update").append("<div class='alert alert-"+dataJSON.type+"'>"+dataJSON.msg+"</div>");
            setTimeout(() => {
                $this.closest(".status-update").find(".alert").remove();
            }, 5000);
        },
        error: err => {
            console.log(err);
        }
    });
});

$(".orders-filter").on("change", e => {
    const data = {
        "orderStatus": $("#statusFilter").val(),
        "customerId": $("#userFilter").val()
    }
    $.ajax({
        url: "templates/admin/orders/listing.php",
        type: "POST",
        data: data,
        success: res => {
            $(".order-list").html(res);
        },
        error: err => {
            console.log(err);
        }
    })
});

$("[name=newCategoryRadio]").on("change", e => {
    const newCat = $(e.currentTarget).val() === "true" ? true : false;

    if (newCat) {
        $("#selectCategory").hide();
        $("#newCategory").show();
    } else {
        $("#selectCategory").show();
        $("#newCategory").hide();
    }
});

$("#catLevel1").on("change", e => {
    const $this = $(e.currentTarget);
    const data = {
        "parentCat": $this.val()
    }
    $.ajax({
        url: "templates/admin/articles/subcategory-options.php",
        type: "POST",
        data: data,
        success: res => {
            $("#catLevel2").html(res);
        },
        error: err => {
            console.log(err);
        }
    });
    if ($this.val()) {
        $("#selectCategory").find(".level-2").show();
    } else {
        $("#selectCategory").find(".level-2").hide();
    }
});

$("#addNewArticleForm").on("submit", e => {
    e.preventDefault();
    const $form = $(e.currentTarget);
    $form.find(".alert").remove();

    $.ajax({
        url: "scripts/admin/article/new.php",
        type: "POST",
        data: $form.serialize() + "&action=newArticle",
        success: res => {
            const dataJSON = JSON.parse(res);
            $form.append('<div class="alert alert-' + dataJSON.type + '">' + dataJSON.msg + '</div>');
            if (dataJSON.type === "success") {
                $form[0].reset()
            }
        },
        error: err => {
            console.log(err);
        }
    });
});

$(document).on("click", ".updateArticleImage", e => {
    e.preventDefault();
    const $this = $(e.currentTarget);
    const data = {
        "action": $this.data("action"),
        "article": $this.data("article-id"),
        "image": $this.data("image-id")
    }
    $.ajax({
        url: $this.attr("href"),
        type: "POST",
        data: data,
        success: res => {
            const dataJSON = JSON.parse(res);
            if (dataJSON.type === "success") {
                location.reload();
            } else {
                console.log(res);
            }
        },
        error: err => {
            console.log(err)
        }
    })
});

$(document).on("click", ".deleteArticle", e => {
    e.preventDefault();
    const $this = $(e.currentTarget);
    const $tr = $this.closest("tr");
    const $feed = $(document).find("#feedback");
    const data = {
        "action": "deleteArticle",
        "articleId": $this.data("id")
    }
    $.ajax({
        url: $this.attr("href"),
        type: "POST",
        data: data,
        success: res => {
            const dataJSON = JSON.parse(res);
            if (dataJSON.type === "success") {
                $feed.append(`<div class="alert alert-success">${dataJSON.msg}</div>`);
                $tr.remove();
                setTimeout(() => {
                    $feed.empty();
                }, 5000);
            } else {
                console.log(res);
            }
        },
        error: err => {
            console.log(err);
        }
    });
});

$(document).on("click", ".message-item", e => {
    e.stopPropagation();
    $(e.currentTarget).siblings().removeClass("active");
    $.ajax({
        url: $(e.currentTarget).attr("data-url"),
        type: "GET",
        success: res => {
            $("#messageTemplate").html(res);
            $(e.currentTarget).addClass("active");
            if ($(e.currentTarget).hasClass("new")) {
                $.ajax({
                    url: "scripts/contact/status.php",
                    type: "POST",
                    data: {
                        "mark": "read",
                        "id": $(e.currentTarget).attr("data-id")
                    },
                    success: res => {
                        const dataJSON = JSON.parse(res);
                        if (dataJSON.type === "success") {
                            $(e.currentTarget).removeClass("new");
                        }
                    },
                    error: err => {
                        console.log(err);
                    }
                })
            }
        }
    });
});

$(document).on("click", ".set-msg-status", e => {
    e.preventDefault();
    const $this = $(e.currentTarget);
    $.ajax({
        url: $this.attr("href"),
        type: "POST",
        data: {
            "mark": $this.attr("data-mark"),
            "id": $this.attr("data-id")
        },
        success: res => {
            $(".message-item[data-id=" + $this.attr("data-id") + "]").trigger("click");
        }
    });
});

$("#subjectFilter").on("change", e => {
    const value = $(e.currentTarget).val();
    if (value) {
        $(".messages-list").find("li").map((index, item) => {
            $(item).show();
            if ($(item).data("filter") != value) {
                $(item).hide();
            }
        });
    } else {
        $(".messages-list").find("li").show();
    }
});
