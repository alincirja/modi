<?php
include "../../../classes/Order.php";
if (isset($_POST["action"]) && $_POST["action"] === "updateStatus") {
    if ((isset($_POST["orderId"]) && !empty($_POST["orderId"])) && (isset($_POST["value"]) && !empty($_POST["value"]))) {
        $order = new Order();
        $order->setStatus($_POST["value"], $_POST["orderId"]);
    } else {
        header("Location: ../../../");
    }
} else {
    header("Location: ../../../");
}