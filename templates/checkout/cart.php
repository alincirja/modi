<ul class="cart-table">
<?php
include_once "classes/Article.php";
include_once "classes/Cart.php";
include_once "classes/Address.php";
$action = new Database();
$articleObj = new Article();
$addressObj = new Address();
$cartObj = new Cart();

$occur = array_count_values($_SESSION["cart_articles"]);
foreach ($occur as $id => $count) {
    $article = $action->getDataById("article", $id);
    $category = $action->getForeignData("category", $article["id_category"]);
?>
    <li class="cart-item" id="<?php echo $id; ?>">
        <div class="row flex-nowrap align-items-center">
            <div class="col-auto">
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
                    <?php echo getVisualPrice($article["price"]); ?>
                </div>
            </div>
            <div class="col">
                <div class="action text-right">
                    <a href="<?php echo ROOT_URL; ?>scripts/checkout/removefromcart" data-id="<?php echo $id; ?>"
                    class="btn btn-sm btn-outline-danger removefromcart"><i class="fas fa-times"></i></a>
                </div>
            </div>
        </div>
    </li>
<?php
}
?>
</ul>
<div class="total-cart text-right">
    <h5><span class="label">Total:</span> <strong class="value"><?php echo getVisualPrice($cartObj->getCartTotal()); ?></strong></h5>
</div>
<div class="row align-items-end mt-4">
    <div class="col">
        <h4 class="line-title">Livrare</h4>
        <div class="shipping">
        <?php
            $userAddresses = $addressObj->getByUserId($_SESSION["id"]);
            if (count($userAddresses)) {
        ?>
            <div id="selectAddress">
                <h6>Selectati adresa de livrare</h6>
        <?php
                foreach ($userAddresses as $key=>$address) {
        ?>
                <div class="address-item">
                    <input type="radio" name="selectedAddress" id="selectedAddress<?php echo $address["id"]; ?>" value="<?php echo $address["id"] ?>" <?php echo $key === 0 ? "checked" : ""; ?>>
                    <label for="selectedAddress<?php echo $address["id"]; ?>" class="address-item-label">
                        <strong>Persoana de contact</strong>
                        <span><?php echo $address["name"] . " - " . $address["phone"]; ?></span>
                        <strong>Adresa de livrare</strong>
                        <span><?php echo $address["address"] . " - " . $address["city"] . ", " . $address["county"]; ?></span>
                    </label>
                </div>
        <?php
                }
        ?>
                <button class="btn btn-outline-primary mt-3" id="showNewAddress">Adresa Noua</button>
            </div>
        <?php
            }
        ?>
            <div id="newAddress" class="mt-3 <?php echo count($userAddresses) ? "d-none" : ""; ?>">
                <?php include_once "templates/account/user/address/form.php"; ?>
            </div>
        </div>
    </div>
    <div class="col">
        <h4 class="line-title">Detalii aditionale</h4>
        <textarea name="orderMessage" id="orderMessage" class="form-control" rows="15" placeholder="In caz de ceva, altceva..."></textarea>
    </div>
</div>

<div class="row justify-content-end mt-5">
    <div class="col-auto">
        <a href="<?php echo ROOT_URL; ?>shop" class="btn btn-lg btn-outline-primary">Continua Cumparaturile</a>
    </div>
    <div class="col-auto">
        <a href="<?php echo ROOT_URL; ?>checkout" class="btn btn-lg btn-primary" id="placeOrder">Finalizare</a>
    </div>
</div>