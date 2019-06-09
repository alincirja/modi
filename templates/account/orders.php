<?php
    include_once "classes/Order.php";
    $order = new Order();
    $myOrders = $order->getCustomData("SELECT * FROM order_list WHERE id_user='" . $_SESSION["id"] . "' ORDER BY date DESC");

    if (count($myOrders)) {
?>
    <h2>Comenzile mele</h2>
    <div class="order-list row">
<?php
        foreach ($myOrders as $order) {
?>
        <div class="col-12 col-md-6 col-lg-4">
            <div class="order card mb-4">
                <div class="card-body">
                    <?php if ($order["donation_amount"]) { ?>
                        <small class="badge badge-success">Donatie: <?php echo getVisualPrice($order["donation_amount"]); ?></small>
                    <?php } ?>
                    <h5>Comanda nr. <?php echo $order["id"]; ?></h5>
                    <?php
                        $date = new DateTime($order["date"]);
                    ?>
                    <div class="order-date">Plasata pe: <?php echo $date->format("d M Y, H:i"); ?></div>
                    <div class="order-total">Total <?php echo getVisualPrice($order["total_price"] + $order["shipping_cost"] + $order["donation_amount"]); ?></div>
                    <h6 class="order-status text-primary mt-1"><?php echo $order["status"]; ?></h6>
                    <a href="<?php echo ROOT_URL; ?>account?sec=orderdetails&id=<?php echo $order["id"] ?>" class="btn btn-sm btn-outline-primary">Detalii Comanda</a>
                </div>
            </div>
        </div>
<?php
        }
?>
    </div>
<?php
    }
?>