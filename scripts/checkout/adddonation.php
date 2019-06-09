<?php
session_start();
include_once "../../classes/Database.php";
$action = new Database();

if (isset($_POST["action"]) && $_POST["action"] === "addDonation") {
    $_SESSION["donation_amount"] = (float)$_POST["donationAmount"];
}