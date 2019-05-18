<?php
    function setActive($slug) {
        if (isset($_GET["page"]) && $_GET["page"] === $slug) {
            echo "active";
        } else {
            return;
        }
    }
?>

<ul class="nav-list">
    <li><a class="<?php setActive("articles") ?>" href="<?php echo ROOT_URL; ?>admin?page=articles">Articole</a></li>
    <li><a class="<?php setActive("orders") ?>" href="<?php echo ROOT_URL; ?>admin?page=orders">Comenzi</a></li>
    <li><a class="<?php setActive("images") ?>" href="<?php echo ROOT_URL; ?>admin?page=images">Imagini</a></li>
</ul>