<?php
include_once "../../../classes/Article.php";
$articleObj = new Article();

if (isset($_POST["action"]) && $_POST["action"] === "newArticle") {
    $category["new"] = $_POST["newCategoryRadio"] === "true" ? true : false;
    if ($category["new"]) {
        $category["name"] = mysqli_real_escape_string($articleObj->connect, $_POST["newCatName"]);
        $category["namePlural"] = mysqli_real_escape_string($articleObj->connect, $_POST["newCatNamePlural"]);
        $category["parentId"] = mysqli_real_escape_string($articleObj->connect, $_POST["newCatParent"]);
    } else {
        $category["id"] = isset($_POST["catLevel2"]) ? mysqli_real_escape_string($articleObj->connect, $_POST["catLevel2"]) : null;
    }

    $eventDateStart = !empty($_POST["articleDateStart"]) ? mysqli_real_escape_string($articleObj->connect, $_POST["articleDateStart"]) : null;
    $eventTimeStart = !empty($_POST["articleTimeStart"]) ? mysqli_real_escape_string($articleObj->connect, $_POST["articleTimeStart"]) : null;
    $eventDateEnd = !empty($_POST["articleDateEnd"]) ? mysqli_real_escape_string($articleObj->connect, $_POST["articleDateEnd"]) : null;
    $eventTimeEnd = !empty($_POST["articleTimeEnd"]) ? mysqli_real_escape_string($articleObj->connect, $_POST["articleTimeEnd"]) : null;

    $article["name"] = mysqli_real_escape_string($articleObj->connect, $_POST["articleName"]);
    $article["description"] = mysqli_real_escape_string($articleObj->connect, $_POST["articleDesc"]);
    $article["measure"] = mysqli_real_escape_string($articleObj->connect, $_POST["articleMeasure"]);
    $article["price"] = mysqli_real_escape_string($articleObj->connect, $_POST["articlePrice"]);
    $article["dateStart"] = $eventDateStart . " " . $eventTimeStart;
    $article["dateEnd"] = $eventDateEnd . " " . $eventTimeEnd;

    $articleObj->addNew($article, $category);
    print_r($article);
} else {
    echo $articleObj->sendUserMsg("danger", "Actiunea nu a fost setata");
}