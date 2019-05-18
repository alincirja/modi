<?php
include "../../../classes/Image.php";
if (isset($_POST["action"]) && $_POST["action"] === "deleteImage") {
    if (isset($_GET["id"]) && !empty($_GET["id"])) {
        $image = new Image();
        $image->delete($_GET["id"]);
    }
} else {
    header("Location: ../../../");
}