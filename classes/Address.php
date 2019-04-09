<?php
include_once "Database.php";

class Address extends Database {
    private $table = "address";

    /**
     * ADD NEW ADDRESS
     */
    public function addNew($address = array()) {
        if (!count($address)) {
            $this->sendUserMsg("danger", "Toate campurile sunt oblogatorii.");
            exit();
        } else {
            $emptyVals = false;
            foreach ($address as $item) {
                if (empty($item)) {
                    $emptyVals += 1;
                }
            }

            if ($emptyVals) {
                $this->sendUserMsg("danger", "Toate campurile sunt oblogatorii.");
                exit();
            } else {
                $sql = "INSERT INTO " . $this->table . " (name, phone, address, city, county, id_user) VALUES ('" . $address["name"] . "', '" . $address["phone"] . "', '" . $address["address"] . "', '" . $address["city"] . "', '" . $address["county"] . "', '" . $address["id_user"] . "')";
                $result = mysqli_query($this->connect, $sql);
                if ($result) {
                    $this->sendUserMsg("success", "Adresa a fost adaugata cu succes");
                    exit();
                } else {
                    $this->sendUserMsg("danger", "Eroare BD: " . mysqli_error($this->connect));
                    exit();
                }
            }
        }
    }

    /**
     * GET ADDRESSES BY PROVIDED USER ID
     */
    public function getByUserId($id) {
        $sql = "SELECT * FROM " . $this->table . " WHERE id_user='" . $id . "'";

        $array = array();
        $query = mysqli_query($this->connect, $sql);

        if ($query->num_rows > 0) {
            while ($row = mysqli_fetch_assoc($query)) {
                $array[] = $row;
            }
            
        }
        return $array;
    }
}