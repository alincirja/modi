<?php
include_once "Database.php";

class Article extends Database {
    private $table = "article";
    private $table_image = "image";
    private $table_article_image = "article_image";

    public function getDefaultImage($id) {
        $images = $this->getCustomData("SELECT * FROM " . $this->table_article_image . " WHERE id_article='" . $id . "'");
        $featured = false;
        $image = array();
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
            $image = $this->getDataById($this->table_image, $featured);
        }
        return $image;
    }
}