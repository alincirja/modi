<?php

    function getTree($level = 0) {
        include_once "classes/Category.php";
        $action = new Category;
        $current_category = isset($_GET["category"]) ? $_GET["category"] : false;

        $categories = mysqli_query($action->connect, "SELECT * FROM category WHERE id_parent='" . $level . "'");
        $categoryList = "";
        if ($categories->num_rows > 0) {
            $categoryList .= "<ul>";
            foreach ($categories as $category) {
                $displayValue = $category["name_plural"] ? $category["name_plural"] : $category["name"];
                $current = $current_category && $current_category === $category["slug"] ? "active" : "";
                $categoryList .= "<li class='" . $current .  "'><a href='" . ROOT_URL . "shop?category=" . $category["slug"] . "'>" . $displayValue . "</a>";
                $categoryList .= getTree($category["id"]) . "</li>";
            }
            $categoryList .= "</ul>";
        }
        return $categoryList;
    }
?>

<div class="card">
    <div class="card-body">
        <div class="categories">
        <?php echo getTree(); ?>
        </div>
    </div>
</div>