<?php
    include_once "classes/Order.php";
    include_once "classes/Article.php";
    $orderObj = new Order();
    $articleObj = new Article();
    $order = $orderObj->getDataById("order_list", $_GET["id"]);
    $products = $orderObj->getCustomData("SELECT * FROM order_article, article WHERE order_article.id_article = article.id AND order_article.id_order='" . $_GET["id"] . "'");
?>

<h2>Comanda nr. <?php echo $_GET["id"]; ?></h2>
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col">
                <?php $date = new DateTime($order["date"]); ?>
                <div class="order-date">Plasata pe: <strong><?php echo $date->format("d M Y, H:i"); ?></strong></div>
                <small class="d-inline-block mr-3">Cost Livrare: <strong><?php echo getVisualPrice($order["shipping_cost"]); ?></strong></small>
                <?php if ($order["donation_amount"]) { ?>
                    <small class="d-inline-block mr-3 text-success">Donatie: <strong><?php echo getVisualPrice($order["donation_amount"]); ?></strong></small>
                <?php } ?>
                <small class="d-inline-block mr-3">Subtotal: <strong><?php echo getVisualPrice($order["total_price"]); ?></strong></small>
                <div class="order-total d-inline-block alert alert-info mt-3 mb-0">Total: <strong><?php echo getVisualPrice($order["total_price"] + $order["shipping_cost"] + $order["donation_amount"]); ?></strong></div>
            </div>
            <div class="col text-right">
                <h6 class="order-status text-primary mt-1 mb-0"><?php echo $order["status"]; ?></h6>
            </div>
        </div>
    </div>
</div>
<h4 class="mt-3">Produse</h4>
<?php
    if (count($products)) {
?>
    <div class="card">
        <div class="card-body">
            <div class="product-list">
                <?php foreach ($products as $product) { ?>
                    <div class="product">
                        <div class="row align-items-center">
                            <div class="col-auto">
                                <?php
                                    $image = $articleObj->getDefaultImage($product["id_article"]);
                                ?>
                                <div class="image" style="background-image: url(<?php echo PATH_IMG . $image["name"]; ?>)"></div>
                            </div>
                            <div class="col-auto">
                                <?php echo $product["name"]; ?>
                            </div>
                            <div class="col-auto ml-auto text-right">
                                <div><strong><?php echo getVisualPrice($product["quantity"] * $product["price"]); ?></strong></div>
                                <?php echo $product["quantity"] . "x " . $product["measure"]; ?>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
<?php
    }
?>