<?php
session_start();
include "../../classes/User.php";

if (isset($_POST["action"]) && $_POST["action"] == "updateProfile") {
    $user = new User();
    $info["id"] = $_SESSION["id"];
    $info["fname"] = mysqli_real_escape_string($user->connect, $_POST["fName"]);
    $info["lname"] = mysqli_real_escape_string($user->connect, $_POST["lName"]);
    $info["email"] = mysqli_real_escape_string($user->connect, $_POST["email"]);
    $info["phone"] = mysqli_real_escape_string($user->connect, $_POST["phone"]);

    $user->updateInfo($info);
} else {
    header("Location: ../../");
    exit();
}?>