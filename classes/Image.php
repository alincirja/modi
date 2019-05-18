<?php
include_once "Database.php";

class Image extends Database {
    private $table = "image";
    private $table_article_image = "article_image";

    public function upload($image) {
        if ($image) {
            if ($image["error"] != 0) {
                $this->sendUserMsg("danger", "Imaginea selectata nu este valida.");
                exit();
            } else {
                $allowed = ["png", "jpg", "jpeg"];
                $sizeLimit = 2000000;
                $fileNameAsArray = explode(".", $image["name"]);
                $fileExtension = strtolower(end($fileNameAsArray));

                if (!in_array($fileExtension, $allowed)) {
                    $this->sendUserMsg("danger", "Imaginile de tip '." . $fileExtension . "', nu sunt acceptate. Va rugam folositi imagini de tip: " . implode(", ", $allowed));
                    exit();
                } else {
                    if ($image["size"] > $sizeLimit) {
                        $this->sendUserMsg("danger", "Imaginea este mai mare de 2MB");
                        exit();
                    } else {
                        $imageName = uniqid() . preg_replace('/\s/', '', $image["name"]);
                        $finalDest = "../../../static/img/" . $imageName;
                        move_uploaded_file($image["tmp_name"], $finalDest);
                        $image = $imageName;

                        $sql = "INSERT INTO " . $this->table . " (name) VALUES ('" . $image . "')";
                        $query = mysqli_query($this->connect, $sql);
                        if ($query) {
                            $this->sendUserMsg("success", "Imaginea a fost adaugata cu succes");
                            exit();
                        } else {
                            $this->sendUserMsg("danger", "Eroare BD: " . mysqli_error($this->connect));
                            exit();
                        }
                    }
                }
            }
        }
    }

    public function delete($id) {
        $sql = "DELETE FROM " . $this->table . " WHERE id='" . $id . "'";
        $query = mysqli_query($this->connect, $sql);
        if ($query) {
            $sql1 = "DELETE FROM " . $this->table_article_image . " WHERE id_image='" . $id . "'";
            $query1 = mysqli_query($this->connect, $sql1);
            if ($query1) {
                $this->sendUserMsg("success", "Imaginea a fost stearsa.");
                exit();
            } else {
                $this->sendUserMsg("danger", "Eroare BD: " . mysqli_error($this->connect));
                exit();
            }
        } else {
            $this->sendUserMsg("danger", "Eroare BD: " . mysqli_error($this->connect));
            exit();
        }
    }
}
