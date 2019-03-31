<?php
    include_once "templates/global/head.php";

    setSeo();

    include_once "templates/global/header.php";

    setPageHeading("MODI Shop");
?>

<section id="main" class="main-content main-content-shop">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-4 col-lg-3">
                <?php include_once "templates/shop/categories.php"; ?>
            </div>
            <div class="col-12 col-md-8 col-lg-9">
                <div id="articles">
                    <?php include_once "templates/shop/articles.php"; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include_once "templates/global/footer.php"; ?>