<?php
    include_once "classes/Database.php";
    $actionObj = new Database();
    $orders = $actionObj->getCustomData("SELECT * FROM order_list GROUP BY status");
    $users = $actionObj->getData("user");
?>
<h2>Comenzi</h2>
<?php if (count($orders)) { ?>
<div class="order-listing">
    <div class="row">
        <div class="col-auto">
            <div class="form-group">
                <select name="statusFilter" id="statusFilter" class="form-control orders-filter">
                    <option value="">---</option>
                    <?php foreach ($orders as $order) { ?>
                        <option value="<?php echo $order["status"]; ?>"><?php echo $order["status"]; ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
        <div class="col-auto">
            <div class="form-group">
                <select name="userFilter" id="userFilter" class="form-control orders-filter">
                    <option value="">---</option>
                    <?php foreach ($users as $user) { ?>
                        <option value="<?php echo $user["id"]; ?>"><?php echo $user["first_name"] . " " . $user["last_name"]; ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
    </div>
</div>

<div class="order-list">
    <?php include_once "orders/listing.php"; ?>
</div>
<?php } ?>