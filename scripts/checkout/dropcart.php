<?php
session_start();
if (isset($_POST["action"])) {
    switch ($_POST["action"]) {
        case "dropCart":
            unset($_SESSION["cart_articles"]);
            break;
        case "dropDonation":
            unset($_SESSION["donation_amount"]);
            break;
        default:
            unset($_SESSION["cart_articles"]);
            unset($_SESSION["donation_amount"]);
            break;
    }
}