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
        "id_user"           => $_SESSION["id"],
        "id_address"        => isset($_POST["id_address"])      ? mysqli_real_escape_string($order->connect, $_POST["id_address"]) : null,
        "details"           => isset($_POST["order_details"])   ? mysqli_real_escape_string($order->connect, $_POST["order_details"]) : null,
        "total_price"       => isset($_POST["total_price"])     ? mysqli_real_escape_string($order->connect, $_POST["total_price"]) : null,
        "shipping_cost"     => isset($_POST["shipping_cost"])   ? mysqli_real_escape_string($order->connect, $_POST["shipping_cost"]) : null,
        "delivery_time"     => isset($_POST["delivery_time"])   ? mysqli_real_escape_string($order->connect, $_POST["delivery_time"]) : null,
        "donation_amount"   => isset($_POST["donation_amount"]) ? mysqli_real_escape_string($order->connect, $_POST["donation_amount"]) : 0
    );

    $order->create($info, $articles);
}
