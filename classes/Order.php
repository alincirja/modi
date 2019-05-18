<?php
include_once "Database.php";

class Order extends Database {
    private $table = "order_list";
    private $table_order_article = "order_article";

    public function create($info, $articles) {
        if (!count($info) || !count($articles) || empty($info["id_user"]) || empty($info["id_address"])) {
            $this->sendUserMsg("danger", "Comanda nu poate fi plasata");
            exit();
        } else {
            $sql = "INSERT INTO " . $this->table . " (id_user, id_address, details, total_price) VALUES ('" . $info["id_user"] . "','" . $info["id_address"] . "','" . $info["details"] . "','" . $info["total_price"] . "')";
            $result = mysqli_query($this->connect, $sql);
            if ($result) {
                $last_id = $this->connect->insert_id;
                if ($last_id) {
                    $sqlVals = "";
                    foreach($articles as $key => $article) {
                        $sqlVals .= "('" . $last_id . "', '" . $article["id"] . "', '" . $article["qtd"] . "')";
                        $sqlVals .= $key === count($articles) - 1 ? "" : ", ";
                    }
                    $sql = "INSERT INTO " . $this->table_order_article . " (id_order, id_article, quantity) VALUES " . $sqlVals;
                    $result = mysqli_query($this->connect, $sql);
                    if ($result) {
                        $this->sendUserMsg("success", "Comanda a fost plasata cu success");
                        exit();
                    }
                }
            } else {
                $this->sendUserMsg("danger", "Eroare BD: " . mysqli_error($this->connect));
                exit();
            }
        }
    }

    public function setStatus($status, $id) {
        $sql = "UPDATE " . $this->table . " SET status='" . $status . "' WHERE id='" . $id . "'";
        $query = mysqli_query($this->connect, $sql);
        if ($query) {
            $this->sendUserMsg("success", "Comanda a fost actualizata.");
            exit();
        } else {
            $this->sendUserMsg("danger", "Eroare BD " . mysqli_error($this->connect));
            exit();
        }
    }
}
