<?php
session_start();
include_once "../../classes/Address.php";

if (isset($_POST["action"]) && $_POST["action"] === "addressAdd") {
    $addressObj = new Address();

    $info["name"] = mysqli_real_escape_string($addressObj->connect, $_POST["shipName"]);
    $info["phone"] = mysqli_real_escape_string($addressObj->connect, $_POST["shipPhone"]);
    $info["county"] = mysqli_real_escape_string($addressObj->connect, $_POST["shipCounty"]);
    $info["city"] = mysqli_real_escape_string($addressObj->connect, $_POST["shipCity"]);
    $info["address"] = mysqli_real_escape_string($addressObj->connect, $_POST["shipAddress"]);
    $info["id_user"] = $_SESSION["id"];

    $addressObj->addNew($info);
} else {
    header("Location: ../../");
    exit();
}