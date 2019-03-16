<?php
// Site Vars
define("SITE", "Modi");
define("TAGLINE", "Ajutorul tau de incredere");

// Define URL
define("ROOT_PATH", "/modi/");
define("ROOT_URL", "http://localhost/modi/");

define("PATH_STATIC", ROOT_PATH . "static/");
define("PATH_IMG", PATH_STATIC . "img/");

// Check logged usser
function loggedIn() {
    if (isset($_SESSION["email"]) && $_SESSION["email"] != "") {
        return true;
    } else {
        return false;
    }
}

// Check for admin
function isAdmin() {
    if (isset($_SESSION["rights"]) && $_SESSION["rights"] == "admin") {
        return true;
    } else {
        return false;
    }
}