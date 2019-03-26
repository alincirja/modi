<?php
    $authPage = isset($_GET["auth"]) && ($_GET["auth"] === "register" || $_GET["auth"] === "reset") ? $_GET["auth"] : "login";

    include_once "templates/global/head.php";

    setSeo();

    include_once "templates/global/header.php";

    switch ($authPage) {
        case "register":
            setPageHeading("Inregistrare");
            break;

        case "reset":
            setPageHeading("Resetare Parola");

        default:
            setPageHeading("Autentificare");
            break;
    }
?>

<section id="main" class="main-content main-content-authentification">
    <div class="container">
        <?php include_once "templates/authentification/form-" . $authPage . ".php"; ?>
    </div>
</section>

<?php include_once "templates/global/footer.php"; ?>