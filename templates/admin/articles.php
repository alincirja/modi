<?php if (isset($_GET["sec"]) && ($_GET["sec"] === "new" || $_GET["sec"] === "gallery")) {
    include_once "templates/admin/articles/" . $_GET["sec"] . ".php";
} else {
    include_once "templates/admin/articles/listing.php";
} ?>