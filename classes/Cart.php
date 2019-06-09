<?php
include_once "Article.php";

class Cart extends Article {
    public function getCartSubTotal() {
        $occur = array_count_values($_SESSION["cart_articles"]);
        $total = 0;
        foreach ($occur as $id => $count) {
            $article = $this->getDataById("article", $id);
            $price = number_format((float)$article["price"], 2, ".", "");

            $subtotal = $price * $count;
            $total += $subtotal;
        }
        return $total;
    }
}