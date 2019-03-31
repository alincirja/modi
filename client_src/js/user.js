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