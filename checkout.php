<?php
    $checkoutPage = isset($_GET["page"]) && ($_GET["page"] === "success") ? $_GET["page"] : "cart";

    include_once "templates/global/head.php";

    if (!loggedIn()) {
        header("Location: authentification");
        exit();
    }

    setSeo();

    include_once "templates/global/header.php";

    switch ($checkoutPage) {
        case "success":
            setPageHeading("Success");
            break;

        default:
            setPageHeading("Cosul Meu");
            break;
    }
?>

<section id="main" class="main-content main-content-authentification">
    <div class="container">
        <?php include_once "templates/checkout/" . $checkoutPage . ".php"; ?>
    </div>
</section>

<?php include_once "templates/global/footer.php"; ?>