<?php
    include_once "templates/global/head.php";

    setSeo();

    include_once "templates/global/header.php";

    setPageHeading("Statistici");

    include_once "classes/Database.php";
    $action = new Database();
?>

<section id="main" class="main-content main-content-stats">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6 col-xl-4">
                <div class="card">
                    <div class="card-body">
                        <h5>Comenzi</h5>
                        <?php
                            $statusLabels = "";
                            $statusVals = "";
                            $statusStat = $action->getCustomData("SELECT status, count(status) as nr FROM order_list GROUP BY status");
                            for ($i = count($statusStat) - 1; $i >= 0; $i--) {
                                $statusLabels .= $i > 0 ? $statusStat[$i]["status"] ."," : $statusStat[$i]["status"];
                                $statusVals .= $i > 0 ? $statusStat[$i]["nr"] ."," : $statusStat[$i]["nr"];
                            }
                        ?>
                        <canvas id="chartOrders" width="400" height="400"
                            data-labels="<?php echo $statusLabels; ?>"
                            data-vals="<?php echo $statusVals; ?>"
                        ></canvas>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-6 col-xl-4">
                <div class="card">
                    <div class="card-body">
                        <h5>Categorii Populare</h5>
                        <?php
                            $artsLabels = "";
                            $artsVals = "";
                            $orderedArticles = $action->getCustomData("SELECT article.name, category.name as cat_name, count(order_article.id_article) as nr FROM order_article, article, category WHERE order_article.id_article = article.id AND article.id_category = category.id GROUP BY order_article.id_article");
                            for ($i = count($orderedArticles) - 1; $i >= 0; $i--) {
                                if ($orderedArticles[$i]["nr"] > 2) {
                                    $artsLabels .= $i > 0 ? $orderedArticles[$i]["cat_name"] ."," : $orderedArticles[$i]["cat_name"];
                                    $artsVals .= $i > 0 ? $orderedArticles[$i]["nr"] ."," : $orderedArticles[$i]["nr"];
                                }
                            }
                        ?>
                        <canvas id="chartCategories" width="400" height="400"
                            data-labels="<?php echo $artsLabels; ?>"
                            data-vals="<?php echo $artsVals; ?>"
                        ></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include_once "templates/global/footer.php"; ?>