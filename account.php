<?php
    include_once "templates/global/head.php";

    if (!loggedIn()) {
        header("Location: ./");
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
        </div>
    </div>
</section>

<?php include_once "templates/global/footer.php"; ?>