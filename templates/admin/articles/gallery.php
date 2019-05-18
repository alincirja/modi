<?php
    $articleId = isset($_GET["id"]) ? $_GET["id"] : false;

    if ($articleId) {
        include_once "classes/Article.php";
        $action = new Database();
        $articleObj = new Article();
        $article = $action->getDataById("article", $articleId);

        if ($article) {
            $images = $action->getData("image");
            $articleImages = $articleObj->getImages($article["id"]);
?>
        <h2>Galerie: <?php echo $article["name"]; ?></h2>
        <div class="row gallery-setup">
            <div class="col-12 col-md-6">
                <h5>Imagini Disponibile</h5>
                <ul class="available-images images-list">
                <?php foreach ($images as $image) { ?>
                    <li>
                        <div style="background-image: url(<?php echo PATH_IMG . $image["name"]; ?>)" class="pt-5">
                            <div class="overlay">
                                <a href="scripts/admin/article/update-image" data-action="addImage" data-article-id="<?php echo $article["id"]; ?>" data-image-id="<?php echo $image["id"]; ?>" class="updateArticleImage btn btn-sm btn-outline-primary">Selecteaza</a>
                            </div>
                        </div>
                    </li>
                <?php } ?>
                </ul>
            </div>
            <div class="col-12 col-md-6">
                <h5>Imagini Atasate Articolului</h5>
                <ul class="article-images images-list">
                <?php foreach ($articleImages as $image) { ?>
                    <li>
                        <div style="background-image: url(<?php echo PATH_IMG . $image["name"]; ?>)" class="pt-5">
                            <div class="overlay">
                                <a href="scripts/admin/article/update-image" data-action="removeImage" data-article-id="<?php echo $article["id"]; ?>" data-image-id="<?php echo $image["id"]; ?>" class="updateArticleImage btn btn-sm btn-outline-danger">Elimina</a>
                            </div>
                        </div>
                    </li>
                <?php } ?>
                </ul>
            </div>
        </div>
<?php   } else {
            header("Location: ./");
        }
    } else {
        header("Location: ./");
    } ?>