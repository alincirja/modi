<?php
include "../../../classes/Image.php";
if (isset($_POST["action"]) && $_POST["action"] === "addImage") {
    if ($_FILES["imageFile"]) {
        $image = new Image();
        $image->upload($_FILES["imageFile"]);
    }
} else {
    header("Location: ../../../");
}