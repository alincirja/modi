<?php
    include_once "classes/Address.php";
    $address = new Address();
    $myAddresses = $address->getCustomData("SELECT * FROM address WHERE id_user='" . $_SESSION["id"] . "'");

    if (count($myAddresses)) {
?>
    <h2>Adrese de livrare</h2>
    <div class="address-list row">
<?php
        foreach ($myAddresses as $address) {
?>
        <div class="col-12 col-lg-6">
            <div class="address card mb-4">
                <div class="card-body">
                    <h6><?php echo $address["name"] . " - " . $address["phone"] ?></h6>
                    <div class="row justify-content-between align-items-center">
                        <div class="col-auto">
                            <?php echo $address["address"] . "<br>" . $address["county"] . ", " . $address["city"]; ?>
                        </div>
                        <div class="col-auto">
                            <button class="btn btn-sm btn-outline-danger deleteAddress" data-id="<?php echo $address["id"]; ?>">sterge</button>
                        </div>
                    </div>
                    <div class="alert alert-danger mt-2 mb-0 d-none" role="alert" id="deleteAlert<?php echo $address["id"]; ?>">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <small>Sigur doriti sa stergeti adresa?</small>
                            </div>
                            <div>
                                <button type="button" class="btn btn-sm btn-danger hideDeleteAddressAlert">
                                    <span aria-hidden="true">Nu</span>
                                </button>
                                <a href="<?php echo ROOT_PATH; ?>scripts/address/delete" data-id="<?php echo $address["id"]; ?>" class="btn btn-sm btn-outline-danger confirmAddressDelete">Da</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php
        }
?>
    </div>
    <button class="btn btn-outline-primary mt-3" id="showNewAddress">Adresa Noua</button>
<?php
    }
?>
<div id="newAddress" class="mt-3 <?php echo count($myAddresses) ? "d-none" : ""; ?>">
    <?php include_once "templates/account/user/address/form.php"; ?>
</div>