<?php
include_once "Database.php";

class User extends Database {
    private $table = "user";

    /**
     * GET USER BY PROVIDED ID
     */
    public function getById($id) {
        $sql = "SELECT * FROM " . $this->table . " WHERE id='" . $id . "'";
        $query = mysqli_query($this->connect, $sql);

        if ($query->num_rows == 1) {
            return $row = mysqli_fetch_assoc($query);
        }
    }

    /**
     * REGISTER NEW USER
     */
    public function register($info) {
        //Check for empty fields
        if (empty($info["fname"]) || empty($info["lname"]) || empty($info["email"]) || empty($info["password"])) {
            $this->sendUserMsg("danger", "Completati toate campurile");
            exit();
        } else {
            //Check for valid characters
            if (!preg_match("/^[a-zA-Z]*$/", $info["fname"]) || !preg_match("/^[a-zA-Z]*$/", $info["lname"])) {
                $this->sendUserMsg("danger", "Folositi doar litere latine in campul nume si prenume");
                exit();
            } else {
                //Check for valid email
                if (!filter_var($info["email"], FILTER_VALIDATE_EMAIL)) {
                    $this->sendUserMsg("danger", "Adresa de email nu este valida");
                    exit();
                } else {
                    //Check for existing email
                    $queryExist = "SELECT * FROM " . $this->table . " WHERE email='" . $info["email"] . "'";
                    $checkExist = mysqli_query($this->connect, $queryExist);
                    if ($checkExist->num_rows > 0) {
                        $this->sendUserMsg("danger", "Adresa de email este deja folosita in sistem");
                        exit();
                    } else {
                        //Hash password
                        $info["hashedPass"] = password_hash($info["password"], PASSWORD_DEFAULT);
                        
                        //Insert user
                        $sql = "INSERT INTO " . $this->table . " (first_name, last_name, email, password, age, sex) VALUES ('" . $info["fname"] . "', '" . $info["lname"] . "', '" . $info["email"] . "', '" . $info["hashedPass"] . "', '" . $info["age"] . "', '" . $info["sex"] . "')";
                        $result = mysqli_query($this->connect, $sql);
                        if ($result) {
                            $this->sendUserMsg("success", "Contul a fost creat.");
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

    /**
     * LOGIN USER
     */
    public function login($login) {
        if (empty($login["email"]) || empty($login["password"])) {
            $this->sendUserMsg("danger", "Ambele campuri sunt obligatorii");
            exit();
        } else {
            $sql = "SELECT * FROM " . $this->table . " WHERE email='" . $login["email"] . "'";
            $result = mysqli_query($this->connect, $sql);
            if ($result->num_rows < 1) {
                $this->sendUserMsg("danger", "Adresa de email si/sau parola sunt incorecte.");
                exit();
            } else {
                if ($row = mysqli_fetch_assoc($result)) {
                    //De-hasshing password
                    $hashedPassCheck = password_verify($login["password"], $row["password"]);
                    if ($hashedPassCheck == false) {
                        $this->sendUserMsg("danger", "Adresa de email si/sau parola sunt incorecte.");
                        exit();
                    } elseif ($hashedPassCheck == true) {
                        $_SESSION["id"] = $row["id"];
                        $_SESSION["email"] = $row["email"];
                        $_SESSION["fname"] = $row["first_name"];
                        $_SESSION["lname"] = $row["last_name"];
                        $_SESSION["register_date"] = $row["register_date"];
                        $_SESSION["rights"] = $row["rights"];

                        $this->sendUserMsg("success", $login["redirect"]);
                        exit();
                    }
                }
            }
        }
    }

    /**
     * UPDATE USER DETAILS
     */
    public function updateInfo($info) {
        if (empty($info["fname"]) || empty($info["email"])) {
            $this->sendUserMsg("danger", "Completati campurile oblligatorii");
            exit();
        } else {
            if (!preg_match("/^[a-zA-Z\s]*$/", $info["fname"]) || !preg_match("/^[a-zA-Z\s]*$/", $info["lname"])) {
                $this->sendUserMsg("danger", "Folositi doar litere latine in campul nume");
                exit();
            } else {
                //Check for valid email
                if (!filter_var($info["email"], FILTER_VALIDATE_EMAIL)) {
                    $this->sendUserMsg("danger", "Adresa de email nu este valida");
                    exit();
                } else {
                    $sql = "UPDATE " . $this->table . 
                    " SET first_name='" . $info["fname"] . 
                    "', last_name='" . $info["lname"] . 
                    "', email='" . $info["email"] . 
                    "', phone='" . $info["phone"] . 
                    "' WHERE id=" . $info["id"];
                    $result = mysqli_query($this->connect, $sql);
                    if ($result) {
                        $this->sendUserMsg("success", "Profilul a fost actualizat cu succes");
                        exit();
                    } else {
                        $this->sendUserMsg("danger", "Eroare BD " . mysqli_error($this->connect));
                        exit();
                    }
                }
            }
        }
    }

    /**
     * UPDATE USER PASSWORD
     */
    public function updatePassword($currentPassword, $password, $confirm, $id) {
        if (empty($currentPassword) || empty($password) || empty($confirm)) {
            $this->sendUserMsg("danger", "Campurile sunt obligatorii");
            exit();
        } else {
            if ($password != $confirm) {
                $this->sendUserMsg("danger", "Parolele nu coincid");
            } else {
                $sql = "SELECT password FROM " . $this->table . " WHERE id='" . $id . "'";
                $result = mysqli_query($this->connect, $sql);
                if ($row = mysqli_fetch_assoc($result)) {
                    $hashedPassCheck = password_verify($password, $row["password"]);
                    if ($hashedPassCheck == true) {
                        $newPassword = password_hash($password, PASSWORD_DEFAULT);
                        $sql = "UPDATE " . $this->table .
                        " SET password='" . $newPassword . "' WHERE id='" . $id . "'";
                        $result = mysqli_query($this->connect, $sql);
                        if ($result) {
                            $this->sendUserMsg("success", "Parola a fost schimbata cu succes");
                            exit();
                        } else {
                            $this->sendUserMsg("danger", "Eroare BD " . mysqli_error($this->connect));
                            exit();
                        }
                        exit();
                    } else {
                        $this->sendUserMsg("danger", "Parola este incorecta");
                        exit();
                    }
                }
            }
        }
    }
}
?>