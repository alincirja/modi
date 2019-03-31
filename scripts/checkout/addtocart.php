<?php
session_start();
include_once "../../classes/Database.php";
$action = new Database();

if (isset($_POST["id"])) {
    $article = $action->getDataById("article", $_POST["id"]);
    if (!$article) {
        header("Location: ../../");
        exit();
    } else {
        if(!isset($_SESSION["cart_articles"])) {
            $_SESSION["cart_articles"] = array();
        }
        $_SESSION["cart_articles"][] = $_POST["id"];
    }
} else {
    header("Location: ../../");
    exit();
}