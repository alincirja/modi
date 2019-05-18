<?php
if (isset($_POST["action"]) && $_POST["action"] === "deleteAddress") {
    $addressId = $_POST["addressId"];
    include_once "../../classes/Address.php";
    $addressObj = new Address();
    $addressObj->deleteById("address", $addressId);
}