<h6>Cosul Meu</h6>
<ul class="minicart-list">
<?php
include_once "classes/Article.php";
$action = new Database();
$articleObj = new Article();

$occur = array_count_values($_SESSION["cart_articles"]);
foreach ($occur as $id => $count) {
    $article = $action->getDataById("article", $id);
    $category = $action->getForeignData("category", $article["id_category"]);
?>
    <li class="minicart-item" id="<?php echo $id; ?>">
        <div class="row no-gutters flex-nowrap align-items-center">
            <div class="col">
                <?php $image = $articleObj->getDefaultImage($id); ?>
                <div class="image" style="background-image: url('<?php echo PATH_IMG . $image["name"]; ?>');"></div>
            </div>
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
                <div class="price">
                    <div class="price">
                        <?php echo getVisualPrice($article["price"]); ?>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="action text-right">
                    <a href="<?php echo ROOT_URL; ?>scripts/checkout/removefromcart" data-id="<?php echo $id; ?>" class="btn btn-sm btn-outline-danger removefromcart"><i class="fas fa-times"></i></a>
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