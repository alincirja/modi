<h6>Cosul Meu</h6>
<ul class="minicart-list">
<?php
include_once "classes/Database.php";
$action = new Database();

$occur = array_count_values($_SESSION["cart_articles"]);
foreach ($occur as $id => $count) {
    $article = $action->getDataById("article", $id);
    $category = $action->getForeignData("category", $article["id_category"]);
?>
    <li class="minicart-item" id="<?php echo $id; ?>">
        <div class="row no-gutters flex-nowrap">
            <div class="col">
                <div class="name">
                    <?php echo $article["name"]; ?>
                    <small><?php echo $category["name"]; ?></small>
                </div>
            </div>
            <div class="col">
                <div class="count">
                    x<?php echo $count; ?>
                </div>
            </div>
            <div class="col">
                <div class="price-action">
                <?php
                    $price_min_float = number_format((float)$article["price_min"], 2, '.', '');
                    $price_min_string = strval($price_min_float);
                    $price_min_array = explode(".", $price_min_string);

                    $price_max_float = number_format((float)$article["price_max"], 2, '.', '');
                    $price_max_string = strval($price_max_float);
                    $price_max_array = explode(".", $price_max_string);
                ?>
                    <div class="price">
                        <span class="min"><?php echo $price_min_array[0]; ?><sup><?php echo $price_min_array[1]; ?></sup><small><?php echo CURRENCY; ?></small></span>
                        -
                        <span class="max"><?php echo $price_max_array[0]; ?><sup><?php echo $price_max_array[1]; ?></sup><small><?php echo CURRENCY; ?></small></span>
                    </div>
                    <div class="action text-right">
                        <a href="<?php echo ROOT_URL; ?>scripts/checkout/removefromcart" data-id="<?php echo $id; ?>"
                        class="btn btn-sm btn-outline-primary removefromcart"><i class="fas fa-times"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </li>
<?php
}
?>
</ul>
<div class="text-center p-2">
    <a href="<?php echo ROOT_URL; ?>checkout?page=cart" class="btn btn-sm btn-primary">Vezi Cosul</a>
</div>