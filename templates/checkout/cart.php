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
<div class="row">
    <div class="col-12 col-md-6 col-lg-8">
        <?php if (isset($_SESSION["donation_amount"]) && $_SESSION["donation_amount"] > 0) { ?>
            <button class="btn btn-sm btn-outline-info btn-donation" value="show">Ati donat <?php echo getVisualPrice($_SESSION["donation_amount"]); ?> <small>(editare)</small></button>
        <?php } else { ?>
            <button class="btn btn-info btn-donation" value="show">Doneaza</button>
        <?php } ?>
        <div class="alert alert-info d-none" id="donationForm">
            <div class="row align-items-center">
                <div class="col-auto">
                    <strong>Donez</strong> 
                </div>
                <div class="col-2 p-0">
                    <input type="number" min="0" step="0.1" value="<?php echo isset($_SESSION["donation_amount"]) ? $_SESSION["donation_amount"] : 0; ?>" name="donationAmount" class="form-control">
                </div>
                <div class="col-auto pl-1">
                    <small>RON</small> 
                </div>
                <div class="col-auto ml-auto">
                    <button class="btn btn-sm btn-info btn-donation" value="done" data-action="addDonation" data-url="scripts/checkout/adddonation.php"><i class="fas fa-check"></i></button>
                    <button class="btn btn-sm btn-outline-info btn-donation" value="drop" data-action="dropDonation" data-url="scripts/checkout/dropcart.php"><i class="fas fa-times"></i></button>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-6 col-lg-3 ml-auto">
        <div class="total-cart">
            <table class="table table-borderless table-sm text-right">
                <tr>
                    <td>Subtotal:</td>
                    <td>
                        <?php echo getVisualPrice($cartObj->getCartSubTotal()); ?>
                    </td>
                </tr>
                <tr>
                    <td>Cost livrare:</td>
                    <td>
                        <?php echo getVisualPrice(SHIPPING_PRICE); ?>
                    </td>
                </tr>
                <?php if (isset($_SESSION["donation_amount"]) && $_SESSION["donation_amount"] > 0) { ?>
                <tr>
                    <td>Donatie:</td>
                    <td>
                        <?php echo getVisualPrice($_SESSION["donation_amount"]); ?>
                    </td>
                </tr>
                <?php } ?>
                <tr>
                    <td><h6 class="m-0">Total:</h6></td>
                    <td>
                        <?php
                            $cartTotal = $cartObj->getCartSubTotal() + SHIPPING_PRICE + (isset($_SESSION["donation_amount"]) ? $_SESSION["donation_amount"] : 0);
                            echo getVisualPrice($cartTotal);
                        ?>
                    </td>
                </tr>
            </table>
            <input type="hidden" name="orderSubtotal" value="<?php echo $cartObj->getCartSubTotal(); ?>">
            <input type="hidden" name="orderShipping" value="<?php echo SHIPPING_PRICE; ?>">
            <input type="hidden" name="orderDonation" value="<?php echo isset($_SESSION["donation_amount"]) ? $_SESSION["donation_amount"] : 0; ?>">
        </div>
    </div>
</div>

<h4 class="line-title">Livrare</h4>
<div class="row align-items-end mt-4">
    <div class="col">
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
        <div class="delivery-time mb-4">
            <h6>Data si ora livrarii</h6>
            <div class="row align-items-center">
                <div class="col-4">
                    <input type="date" name="orderDeliveryDate" id="orderDeliveryDate" class="form-control" data-today="<?php echo date("Y-m-d"); ?>" min="<?php echo date("Y-m-d"); ?>">
                </div>
                <div class="col-2 p-0">
                    <input type="number" placeholder="Ora" data-current-hour="<?php echo date("H"); ?>" min="0" max="23" class="form-control" id="orderDeliveryTimeHour" name="orderDeliveryTimeHour">
                </div>
                <div class="col-auto">
                    :
                </div>
                <div class="col-2 p-0">
                    <input type="number" placeholder="Min" data-current-hour="<?php echo date("i"); ?>" min="0" step="5" max="59" class="form-control" id="orderDeliveryTimeMinute" name="orderDeliveryTimeMinute">
                </div>
            </div>
        </div>
        <h6>Detalii aditionale</h6>
        <textarea name="orderMessage" id="orderMessage" class="form-control" rows="7" placeholder="In caz de ceva, altceva..."></textarea>
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