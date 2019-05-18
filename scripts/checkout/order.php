<?php
if (isset($_POST["action"]) && $_POST["action"] === "placeOrder") {
    session_start();
    include_once "../../classes/Order.php";
    $order = new Order();

    $occur = array_count_values($_SESSION["cart_articles"]);
    $articles= array();
    foreach ($occur as $id => $count) {
        array_push($articles, array("id" => $id, "qtd" => $count));
    }

    $info = array(
        "id_user" => $_SESSION["id"],
        "id_address" => $_POST["id_address"],
        "details" => $_POST["order_details"],
        "total_price" => $_POST["total_price"]
    );

    $order->create($info, $articles);
}
