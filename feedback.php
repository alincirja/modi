<?php
    include_once "templates/global/head.php";

    setSeo();

    include_once "templates/global/header.php";

    setPageHeading("Parerile Utilizatorilor");

    include_once "classes/Database.php";
    $action = new Database();
    $feed = $action->getCustomData("SELECT * FROM contact WHERE subject='feedback' AND public='1' ORDER BY id DESC");
?>

<section id="main" class="main-content main-content-feedback">
    <div class="container">
        <?php if (count($feed)) { ?>
            <div class="row">
            <?php foreach ($feed as $item) { ?>
                <div class="col-12 mb-5">
                    <div class="card">
                        <div class="card-body">
                            <div class="feedback-item">
                                <i class="quote fas fa-quote-left"></i>
                                <h4><?php echo $item["title"]; ?></h4>
                                <p><?php echo $item["message"]; ?></p>
                                <div class="author">
                                    <h4><?php echo $item["name"]; ?></h4>
                                    <p class="text-primary"><?php echo $item["occupation"]; ?></p>
                                </div>
                            </div><!--/.feedback-item-->
                        </div>
                    </div>
                </div>
            <?php } ?>
            </div>
        <?php } ?>
    </div>
</section>

<?php include_once "templates/global/footer.php"; ?>