<?php
include_once "../../../classes/Article.php";
$articleObj = new Article();

if (isset($_POST["action"]) && $_POST["action"] === "deleteArticle") {
    $articleObj->deleteById("article", $_POST["articleId"]);
} else {
    $articleObj->sendUserMsg("danger", "Action not set");
}