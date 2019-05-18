<?php
    if (!isset($_GET["id"]) || empty($_GET["id"])) {
        header("Location: shop");
    }

    include_once "templates/global/head.php";

    setSeo();

    include_once "templates/global/header.php";

    include_once "classes/Article.php";
    $articleObj = new Article();
    $article = $articleObj->getDataById("article", $_GET["id"]);
    $images = $articleObj->getImages($article["id"]);
    $category = $articleObj->getForeignData("category", $article["id_category"]);
    setPageHeading($article["name"]);
?>

<section id="main" class="main-content main-content-shop">
    <div class="container">
        <div class="article-single">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-5">
                <?php if (count($images)) { ?>
                    <div id="articleCarousel" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <?php foreach ($images as $key=>$image) { ?>
                            <div class="carousel-item <?php echo $key === 0 ? "active" : ""; ?>">
                                <img class="d-block w-100" src="<?php echo PATH_IMG . $image["name"]; ?>">
                            </div>
                            <?php } ?>
                        </div>
                        <?php if (count($images) > 1) { ?>
                        <a class="carousel-control-prev" href="#articleCarousel" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#articleCarousel" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                        <?php } ?>
                    </div>
                <?php } else { ?>
                    <div class="alert alert-warning">Nu sunt imagini disponibile</div>
                <?php } ?>
                </div>
                <div class="col-12 col-md-6 col-lg-7">
                    <h2 class="d-flex justify-content-between">
                        <?php echo $article["name"]; ?>
                        <small><?php echo getVisualPrice($article["price"]); ?></small>
                    </h2>

                    <div class="category"><?php echo $category["name"]; ?></div>

                    <div class="dates">
                        <?php if (strlen($article["date_start"]) > 9) { ?>
                            <div>
                                <label>De la:</label>
                                <span>
                                <?php
                                    $dateStart = new DateTime($article["date_start"]);
                                    echo $dateStart->format("D, d M Y | G:i");
                                ?>
                                </span>
                            </div>
                        <?php }
                            if (strlen($article["date_end"]) > 9) { ?>
                            <div>
                                <label>Pana la:</label>
                                <span>
                                <?php
                                    $dateEnd = new DateTime($article["date_end"]);
                                    echo $dateEnd->format("D, d M Y | G:i");
                                ?>
                                </span>
                            </div>
                        <?php } ?>
                    </div>

                    <div class="description">
                        <?php echo $article["description"]; ?>
                    </div>

                    <div class="add-to-cart mt-4">
                        <a href="<?php echo ROOT_URL; ?>scripts/checkout/addtocart" data-id="<?php echo $article["id"]; ?>"
                            class="btn btn-lg btn-primary addtocart"><i class="fas fa-fw fa-cart-plus"></i> Adauga in cos</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include_once "templates/global/footer.php"; ?>