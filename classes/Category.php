<?php
include_once "Database.php";

class Category extends Database {
    private $table = "category";

    public function getByParent($level = 0) {
        $categories = mysqli_query($this->connect, "SELECT * FROM " . $this->table . " WHERE id_parent='" . $level . "'");
        $array = array();

        if ($categories->num_rows > 0) {
            while ($row = mysqli_fetch_assoc($categories)) {
                $array[] = $row;
            }
        }

        return $array;
    }
}