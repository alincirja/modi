<?php
    include_once "classes/Category.php";
    include_once "classes/Article.php";
    $action = new Category();
    $articles = $action->getData("article");
    $articleObj = new Article();

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
                    <?php $image = $articleObj->getDefaultImage($article["id"]); ?>
                    <div class="featured-image">
                        <div class="embed-responsive embed-responsive-1by1">
                            <img src="<?php echo PATH_IMG . $image["name"]; ?>" alt="" class="embed-responsive-item">
                        </div>
                    </div>
                    <h6><?php echo $article["name"]; ?></h6>
                    <div class="price">
                        <?php echo getVisualPrice($article["price"]); ?>
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