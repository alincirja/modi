<?php
session_start();
include "../../classes/User.php";

if (isset($_POST["action"]) && $_POST["action"] === "updatePassword") {
    $user = new User();

    $id = $_SESSION["id"];
    $currentPassword = mysqli_real_escape_string($user->connect, $_POST["password"]);
    $password = mysqli_real_escape_string($user->connect, $_POST["newPassword"]);
    $confirm = mysqli_real_escape_string($user->connect, $_POST["confirmNewPassword"]);

    $user->updatePassword($currentPassword, $password, $confirm, $id);
}