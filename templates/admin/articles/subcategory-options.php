
<?php
    if (isset($_POST["parentCat"]) && $_POST["parentCat"] != 0) {
        include_once "../../../classes/Category.php";
        $catObj = new Category();
        $level1 = $catObj->getCustomData("SELECT * FROM category WHERE id_parent='" . $_POST["parentCat"] . "'");
        foreach ($level1 as $cat) {
            echo '<option value="' . $cat["id"] . '">' . $cat["name"] . '</option>';
        }
    } else {
        echo '<option>- selectati nivel 1 -</option>';
    }
?>