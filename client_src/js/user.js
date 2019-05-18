"use strict";
import $ from "jquery";

/**
 * REGISTER
 */
$("#formRegister").on("submit", e => {
    e.preventDefault();
    const action = "userRegister";
    const form = e.currentTarget;
    $(form).find(".alert").remove();
    $.ajax({
        url: "scripts/user/register.php",
        type: "POST",
        data: $(form).serialize() + "&action=" + action,
        success: function(data) {
            //console.log(data);
            const dataJSON = JSON.parse(data);
            $(form).append("<div class='alert alert-"+dataJSON.type+" mt-3'>"+dataJSON.msg+"</div>");
            if (dataJSON.type === "success") {
                $(form)[0].reset();
            }
        },
        error: function(err) {
            alert(err);
        }
    });
});

/**
 * LOGIN
 */
$("#formLogin").on("submit", e => {
    e.preventDefault();
    const action = "userLogin";
    const form = e.currentTarget;
    $(form).find(".alert").remove();
    $.ajax({
        url: "scripts/user/login.php",
        type: "POST",
        data: $(form).serialize() + "&action=" + action,
        success: function(data) {
            console.log(data);
            const dataJSON = JSON.parse(data);
            if (dataJSON.type === "success") {
                window.location.replace(dataJSON.msg);
            } else {
                $(form).append("<div class='alert alert-"+dataJSON.type+"'>"+dataJSON.msg+"</div>");
            }
        },
        error: function(err) {
            console.log(err);
        }
    });
});

/**
 * EDIT ADDRESS
 */
$(document).on("click", ".deleteAddress", e => {
    const alert = $("#deleteAlert" + $(e.currentTarget).data("id"));
    alert.removeClass("d-none");
});

$(document).on("click", ".hideDeleteAddressAlert", e => {
    $(e.currentTarget).closest(".alert").addClass("d-none");
});

$(document).on("click", ".confirmAddressDelete", e => {
    e.preventDefault();
    const $this = $(e.currentTarget);
    const data = {
        action: "deleteAddress",
        addressId: $this.data("id")
    }

    $.ajax({
        method: "POST",
        url: $this.attr("href"),
        data: data,
        success: res => {
            console.log(res);
            const dataJSON = JSON.parse(res);
            if (dataJSON.type === "success") {
                window.location.reload();
            } else {
                $this.closest(".card-body").append("<div class='alert alert-"+dataJSON.type+"'>"+dataJSON.msg+"</div>");
            }
        }
    })
});

$(document).on("submit", "#updatePasswordForm", e => {
    e.preventDefault();
    const $form = $(e.currentTarget);
    $form.find(".alert").remove();
    $.ajax({
        url: "scripts/user/update-password.php",
        type: "POST",
        data: $form.serialize() + "&action=updatePassword",
        success: function(data) {
            console.log(data);
            const dataJSON = JSON.parse(data);
            if (dataJSON.type === "success") {
                $form.parent().append("<div class='alert alert-"+dataJSON.type+"'>"+dataJSON.msg+"</div>");
                $form.addClass("d-none");
            } else {
                $form.append("<div class='alert alert-"+dataJSON.type+"'>"+dataJSON.msg+"</div>");
            }
        },
        error: function(err) {
            console.log(err);
        }
    });
});

$(document).on("submit", "#updateProfileForm", e => {
    e.preventDefault();
    const $form = $(e.currentTarget);
    $form.find(".alert").remove();
    $.ajax({
        url: "scripts/user/update-profile.php",
        type: "POST",
        data: $form.serialize() + "&action=updateProfile",
        success: function(data) {
            console.log(data);
            const dataJSON = JSON.parse(data);
            $form.append("<div class='alert alert-"+dataJSON.type+"'>"+dataJSON.msg+"</div>");
        },
        error: function(err) {
            console.log(err);
        }
    });
})