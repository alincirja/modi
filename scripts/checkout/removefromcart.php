<?php
session_start();

if (isset($_POST["id"])) {
    foreach (array_keys($_SESSION["cart_articles"], $_POST["id"]) as $key) {
        unset($_SESSION["cart_articles"][$key]);
    }
} else {
    header("Location: ../../");
    exit();
}