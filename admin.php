<?php
    include_once "templates/global/head.php";
    if (!isAdmin()) {
        header("Location: ./auth");
        exit();
    }

    setSeo();

    include_once "templates/global/header.php";

    setPageHeading("Administrare");
?>

<section class="admin-nav">
<div class="container-fluid text-center">
    <?php include_once "templates/admin/navigation.php"; ?>
</div>
</section>

<section id="main" class="main-content main-admin">
    <div class="container">
        <?php if (isset($_GET["page"]) && ($_GET["page"] === "articles" || $_GET["page"] === "orders" || $_GET["page"] === "images")) {
            include_once "templates/admin/" . $_GET["page"] . ".php";
        } else {
            include_once "templates/admin/dashboard.php";
        } ?>
    </div>
</section>

<?php include_once "templates/global/footer.php"; ?>