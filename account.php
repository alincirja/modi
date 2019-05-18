<?php
    include_once "templates/global/head.php";

    if (!loggedIn()) {
        header("Location: ./auth");
    }

    setSeo();

    include_once "templates/global/header.php";

    setPageHeading("Contul Meu");
?>

<section id="main" class="main-content main-content-account">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-4 col-lg-3 col-xl-2">
                <?php include_once "templates/account/navigation.php"; ?>
            </div>
            <div class="col-12 col-md-8 col-lg-9 col-xl-10">
                <?php if (isset($_GET["sec"]) && ($_GET["sec"] === "info" || $_GET["sec"] === "orders" || $_GET["sec"] === "address" || $_GET["sec"] === "orderdetails")) {
                    include_once "templates/account/" . $_GET["sec"] . ".php";
                } else {
                    include_once "templates/account/info.php";
                } ?>
            </div>
        </div>
    </div>
</section>

<?php include_once "templates/global/footer.php"; ?>