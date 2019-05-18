<?php
include_once "../../../classes/Article.php";
$articleObj = new Article();

if (isset($_POST["action"])) {
    $action = $_POST["action"];
    $articleObj->$action($_POST["article"], $_POST["image"]);
} else {
    $articleObj->sendUserMsg("danger", "Action not set");
}