<?php
session_start();
include "../../inc/global-variables.php";
include "../../classes/User.php";

if (isset($_POST["action"]) && $_POST["action"] === "userLogin") {
    $user = new User();

    $login["email"] = mysqli_real_escape_string($user->connect, $_POST["loginEmail"]);
    $login["password"] = mysqli_real_escape_string($user->connect, $_POST["loginPassword"]);
    $login["redirect"] = ROOT_URL . "account";

    $user->login($login);
} else {
    header("Location: ../../");
    exit();
}