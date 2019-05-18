<?php
include_once "Database.php";

class Article extends Database {
    private $table = "article";
    private $table_image = "image";
    private $table_article_image = "article_image";
    private $table_category = "category";

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

    public function getImages($id) {
        $articleImages =  $this->getCustomData("SELECT * FROM " . $this->table_article_image . " WHERE id_article='" . $id . "'");
        $articleImagesIds = "";
        foreach ($articleImages as $key=>$image) {
            $articleImagesIds .= $image["id_image"];
            $articleImagesIds .= $key < count($articleImages) - 1 ? ", " : "";
        }
        return $this->getCustomData("SELECT * FROM " . $this->table_image . " WHERE id IN (" . $articleImagesIds . ")");
    }

    public function addNew($article, $category) {
        $articleCategoryId = $category["id"];
        if ($category["new"]) {
            if (empty($category["name"])) {
                $this->sendUserMsg("danger", "Numele categoriei este obligatoriu");
                exit();
            } else {
                $newCatInsert = mysqli_query($this->connect, "INSERT INTO " . $this->table_category . " (id_parent, name, name_plural) VALUES ('" . $category["parentId"] . "','" . $category["name"] . "','" . $category["namePlural"] . "')");
                if ($newCatInsert) {
                    $articleCategoryId = $this->connect->insert_id;
                } else {
                    $this->sendUserMsg("danger", "Eroare BD (la inserarea categoriei): " . mysqli_error($this->connect));
                    exit();
                }
            }
        } else {
            if (empty($article["name"]) || empty($article["price"]) || empty($article["measure"])) {
                $this->sendUserMsg("danger", "Completati campurile obligatorii.");
                exit();
            } else {
                $newArticleInsert = mysqli_query($this->connect,
                    "INSERT INTO " . $this->table . " (name, id_category, description, date_start, date_end, price, measure) VALUES ('" . $article["name"] . "','" . $articleCategoryId . "','" . $article["description"] . "','" . $article["dateStart"] . "','" . $article["dateEnd"] . "','" . $article["price"] . "','" . $article["measure"] . "')");
                if ($newArticleInsert) {
                    $lastArticle = $this->connect->insert_id;
                    $this->sendUserMsg("success", "Articolul a fost adaugat. <a class='alert-link' href='?page=articles&sec=gallery&id=".$lastArticle."'>Galerie</a>");
                    exit();
                } else {
                    $this->sendUserMsg("danger", "Eroare BD (la inserarea articolului): " . mysqli_error($this->connect));
                    exit();
                }
            }
        }
    }

    public function addImage($article, $image) {
        if (empty($article) || empty($image)) {
            $this->sendUserMsg("danger", "Imaginea sau articolul nu sunt de gasit");
            exit();
        } else {
            $imageAdded = mysqli_query($this->connect,
                "INSERT INTO " . $this->table_article_image . " (id_article, id_image) VALUES ('".$article."','".$image."')");
            if ($imageAdded) {
                $this->sendUserMsg("success", "Imaginea a fost adaugata cu succes");
                exit();
            } else {
                $this->sendUserMsg("danger", "Eroare BD: " . mysqli_error($this->connect));
                exit();
            }
        }
    }

    public function removeImage($article, $image) {
        if (empty($article) || empty($image)) {
            $this->sendUserMsg("danger", "Imaginea sau articolul nu sunt de gasit");
            exit();
        } else {
            $imageRemoved = mysqli_query($this->connect,
                "DELETE FROM " . $this->table_article_image . " WHERE id_article='".$article."' AND id_image='".$image."'");
            if ($imageRemoved) {
                $this->sendUserMsg("success", "Imaginea a fost eliminata cu succes");
                exit();
            } else {
                $this->sendUserMsg("danger", "Eroare BD: " . mysqli_error($this->connect));
                exit();
            }
        }
    }

    public function makeFeatImage($article, $image) {
        if (empty($article) || empty($image)) {
            $this->sendUserMsg("danger", "Imaginea sau articolul nu sunt de gasit");
            exit();
        } else {
            $featured = mysqli_query($this->connect,
                "UPDATE " . $this->table_article_image . " SET featured='1' WHERE id_article='".$article."' AND id_image='".$image."'");
            if ($featured) {
                $this->sendUserMsg("success", "Succes");
                exit();
            } else {
                $this->sendUserMsg("danger", "Eroare BD: " . mysqli_error($this->connect));
                exit();
            }
        }
    }
}