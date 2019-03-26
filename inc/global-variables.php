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
            "keywords" => "contact modi caritate"
        )
    );

    echo "<title>" . $seo[$slug]["title"] . "</title>";
    echo "<meta name='description' content='" . $seo[$slug]["description"] . "'>";
    echo "<meta name='keywords' content='" . $seo[$slug]["keywords"] . "'>";
    echo "<meta name='author' content='Silvia Brassoi'>";
}