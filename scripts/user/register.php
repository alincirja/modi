<?php
include_once "../../classes/User.php";

if (isset($_POST["action"]) && $_POST["action"] === "userRegister") {
    $user = new User();

    $info["fname"] = mysqli_real_escape_string($user->connect, $_POST["registerFirstName"]);
    $info["lname"] = mysqli_real_escape_string($user->connect, $_POST["registerLastName"]);
    $info["email"] = mysqli_real_escape_string($user->connect, $_POST["registerEmail"]);
    $info["password"] = mysqli_real_escape_string($user->connect, $_POST["registerPassword"]);

    $user->register($info);
} else {
    header("Location: ../../");
    exit();
}