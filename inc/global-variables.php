<?php
// Site Vars
define("SITE", "Open Road");
define("TAGLINE", "Always on the road for our customer's desire");
define("CURRENCY", "RON");
define("SHIPPING_PRICE", 25);

// Define URL
define("ROOT_PATH", "/openroad/");
define("ROOT_URL", "http://localhost:82/openroad/");

define("PATH_STATIC", ROOT_PATH . "static/");
define("PATH_IMG", PATH_STATIC . "img/");

define("LOGOUT", ROOT_PATH . "scripts/user/logout.php?session=end");

date_default_timezone_set("Europe/Bucharest");

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
    if (isset($_SESSION["rights"]) && $_SESSION["rights"] === "admin") {
        return true;
    } else {
        return false;
    }
}

// visual price
function getVisualPrice($price) {
    $price_float = number_format((float)$price, 2, ".", "");
    $price_string = strval($price_float);
    $price_array = explode(".", $price_string);
    return '<span class="price">' . $price_array[0] . '<sup>' . $price_array[1] . '</sup><small>' . CURRENCY . '</small></span>';
}

// check for home page
function isHome() {
    return basename($_SERVER['PHP_SELF']) === "index.php" ? true : false;
}

// set page heading
function setPageHeading($heading) {
    include_once "templates/global/page-heading.php";
}

// SEO
function setSeo($slug = "index") {
    $seo = array(
        "index" => array (
            "title" => SITE . " | " . TAGLINE,
            "description" => TAGLINE,
            "keywords" => "key word for searching purpose"
        ),
        "contact" => array(
            "title" => "Contact | " . SITE,
            "description" => TAGLINE,
            "keywords" => "contact Open Road caritate"
        )
    );

    echo "<title>" . $seo[$slug]["title"] . "</title>";
    echo "<meta name='description' content='" . $seo[$slug]["description"] . "'>";
    echo "<meta name='keywords' content='" . $seo[$slug]["keywords"] . "'>";
    echo "<meta name='author' content='Silvia Brassoi'>";
}