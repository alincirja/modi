<?php
    include_once "templates/global/head.php";

    setSeo("index");

    include_once "templates/global/header.php";
?>

<div class="hero home-hero d-flex align-items-center">
    <div class="container">
        <div class="home-logo text-center mb-5">
            <img src="<?php echo PATH_IMG; ?>logo.png" alt="">
        </div>
        <h1><?php echo TAGLINE; ?></h1>
        <div class="row justify-content-center">
            <div class="col-12 col-sm-6 col-md-5 col-lg-4 col-xl-3">
                <a href="#" class="btn btn-block btn-primary">Despre Noi</a>
            </div>
            <div class="col-12 col-sm-6 col-md-5 col-lg-4 col-xl-3">
                <a href="<?php echo ROOT_URL; ?>auth" class="btn btn-block btn-outline-primary">Autentificare</a>
            </div>
        </div>
    </div><!--/.container-->
</div>

<?php include_once "templates/global/footer.php"; ?>