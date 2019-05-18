<?php
    if (count($_POST)) {
        include_once "../../../classes/Order.php";
        include_once "../../../classes/Article.php";
        include_once "../../../inc/global-variables.php";
    } else {
        include_once "classes/Order.php";
        include_once "classes/Article.php";
    }
    $orderObj = new Order();
    $articleObj = new Article();
    $status = isset($_POST["orderStatus"]) ? $_POST["orderStatus"] : "";
    $dateStart = isset($_POST["dateStart"]) ? $_POST["dateStart"] : "";
    $dateEnd = isset($_POST["dateEnd"]) ? $_POST["dateEnd"] : "";
    $customerId = isset($_POST["customerId"]) ? $_POST["customerId"] : "";
    //$orders = $orderObj->getCustomData("SELECT * FROM order_list ORDER BY date DESC");
    $orders = $orderObj->getCustomData("SELECT * FROM order_list WHERE status LIKE '%" . $status . "%' AND id_user LIKE '%" . $customerId . "%' ORDER BY date DESC");

    if (count($orders)) {
        foreach ($orders as $order) { ?>
        <div class="order order-<?php echo $order["id"]; ?>">
            <div class="row align-items-center">
                <div class="col-1">
                    <label>#</label>
                    <div class="order-val"><?php echo $order["id"]; ?></div>
                </div>
                <div class="col-auto">
                    <label>Data</label>
                    <div class="order-val"><?php $date = new DateTime($order["date"]); echo $date->format("d M Y, H:i"); ?></div>
                </div>
                <div class="col-auto">
                    <label>Client</label>
                    <div class="order-val">
                        <?php
                            $client = $orderObj->getForeignData("user", $order["id_user"]);
                            echo "#" . $client["id"] . " " . $client["first_name"] . " " . $client["last_name"];
                        ?>
                    </div>
                </div>
                <div class="col-auto">
                    <label>Total</label>
                    <div class="order-val"><?php echo getVisualPrice($order["total_price"]); ?></div>
                </div>
                <div class="col-auto ml-auto status-update">
                    <label>Status</label>
                    <div class="order-val">
                        <i class="fas fa-edit text-primary"></i>
                        <input type="text" class="status-update-field" name="orderStatus<?php echo $order["id"]; ?>" id="orderStatus<?php echo $order["id"]; ?>" value="<?php echo $order["status"]; ?>">
                        <button type="button" class="save-status" data-id="<?php echo $order["id"]; ?>"><i class="fas fa-save"></i></button>
                    </div>
                </div>
                <div class="col-auto">
                    <label>&nbsp;</label>
                    <div class="order-val">
                        <button class="btn btn-sm btn-outline-primary toggleOrderDetails">Detalii</button>
                    </div>
                </div>
            </div>
            <div class="order-details">
                <div class="articles">
                    <div class="row">
                    <?php
                        $products = $orderObj->getCustomData("SELECT * FROM order_article, article WHERE order_article.id_article = article.id AND order_article.id_order='" . $order["id"] . "'");

                        if (count($products)) {
                            foreach ($products as $product) { ?>
                            <div class="col-auto mb-3">
                                <div class="product">
                                    <div class="row">
                                        <div class="col-auto">
                                            <?php $image = $articleObj->getDefaultImage($product["id_article"]); ?>
                                            <div class="image" style="background-image: url(<?php echo PATH_IMG . $image["name"]; ?>)"></div>
                                        </div>
                                        <div class="col-auto pl-0">
                                            <h6><?php echo $product["name"]; ?></h6>
                                            <div><strong><?php echo getVisualPrice($product["quantity"] * $product["price"]); ?></strong></div>
                                            <?php echo "x" . $product["quantity"] . " " . $product["measure"]; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php }
                        } ?>
                    </div>
                </div>
                <div class="details">
                    <label>Mentiuni</label>
                    <div class="order-val"><?php echo $order["details"] ? $order["details"] : " - "; ?></div>
                </div>
            </div>
        </div>
    <?php }
    } ?>