<?php
    $checkoutPage = isset($_GET["page"]) && ($_GET["page"] === "checkout") ? $_GET["page"] : "cart";

    include_once "templates/global/head.php";

    if (!loggedIn()) {
        header("Location: authentification");
        exit();
    }

    setSeo();

    include_once "templates/global/header.php";

    switch ($checkoutPage) {
        case "checkout":
            setPageHeading("Finalizare Comanda");
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