<?php
    include_once "classes/Category.php";
    $action = new Category();
    $articles = $action->getData("article");

    $category_slug = isset($_GET["category"]) ? $_GET["category"] : "";
    $category_id = "";
    if ($category_slug) {
        $current_category = mysqli_query($action->connect, "SELECT * FROM category WHERE slug='" . $category_slug . "'");
        if ($current_category->num_rows) {
            $row = mysqli_fetch_assoc($current_category);
            if ($row["id_parent"] == 0) {
                $category_id = array();
                $subCats = $action->getByParent($row["id"]);
                foreach ($subCats as $cat) {
                    $category_id[] = $cat["id"];
                }
                $articles = $action->getCustomData("SELECT * FROM article WHERE id_category IN (" . implode(", ", $category_id) . ")");
            } else {
                $category_id = $row["id"];
                $articles = $action->getCustomData("SELECT * FROM article WHERE id_category='" . $category_id . "'");
            }
        }
    }

    if (count($articles)) { ?>
        <div class="row">
        <?php foreach ($articles  as $article) { ?>
            <div class="col-12 col-sm-6 col-md-6 col-lg-4">
                <article id="article-<?php echo $article["id"]; ?>" class="article">
                    <?php
                        $images = $action->getCustomData("SELECT * FROM article_image WHERE id_article='" . $article["id"] . "'");
                        $featured = false;
                        if (count($images)) {
                            for ($i = 0; $i < count($images); $i++) {
                                if ($images[$i]["featured"]) {
                                    $featured = $images[$i]["id_image"];
                                } else {
                                    $featured = $images[0]["id_image"];
                                }
                            }
                        }
                        if ($featured) {
                            $image = $action->getDataById("image", $featured);
                    ?>
                        <div class="featured-image">
                            <div class="embed-responsive embed-responsive-1by1">
                                <img src="<?php echo ROOT_PATH; ?>static/img/<?php echo $image["name"]; ?>" alt="" class="embed-responsive-item">
                            </div>
                        </div>
                    <?php
                        }
                    ?>
                    <h6><?php echo $article["name"]; ?></h6>
                    <?php
                        $price_min_float = number_format((float)$article["price_min"], 2, '.', '');
                        $price_min_string = strval($price_min_float);
                        $price_min_array = explode(".", $price_min_string);

                        $price_max_float = number_format((float)$article["price_max"], 2, '.', '');
                        $price_max_string = strval($price_max_float);
                        $price_max_array = explode(".", $price_max_string);
                    ?>
                    <div class="price">
                        <span class="min"><?php echo $price_min_array[0]; ?><sup><?php echo $price_min_array[1]; ?></sup><small><?php echo CURRENCY; ?></small></span>
                        -
                        <span class="max"><?php echo $price_max_array[0]; ?><sup><?php echo $price_max_array[1]; ?></sup><small><?php echo CURRENCY; ?></small></span>
                    </div>
                    <div class="add-to-cart">
                            <a href="<?php echo ROOT_URL; ?>scripts/checkout/addtocart" data-id="<?php echo $article["id"]; ?>"
                            class="btn btn-primary addtocart"><i class="fas fa-fw fa-cart-plus"></i> Adauga in cos</a>
                    </div>
                </article>
            </div>
        <?php } ?>
        </div>
    <?php } else { ?>
        <div class="alert alert-warning">Nu exista articole in aceasta categorie.</div>
    <?php }
?>