<?php
include_once "../../classes/Database.php";
$action = new Database();

if (isset($_POST["submitContact"])) {
    $fields = array(
        "name" => mysqli_real_escape_string($action->connect, $_POST["contactName"]),
        "email" => mysqli_real_escape_string($action->connect, $_POST["contactEmail"]),
        "phone" => mysqli_real_escape_string($action->connect, $_POST["contactPhone"]),
        "subject" => mysqli_real_escape_string($action->connect, $_POST["contactSubject"]),
        "message" => mysqli_real_escape_string($action->connect, $_POST["contactMessage"]),
        "occupation" => mysqli_real_escape_string($action->connect, $_POST["contactOccupation"]),
        "title" => mysqli_real_escape_string($action->connect, $_POST["contactTitle"])
    );

    $messageSent = $action->insertData("contact", $fields);
    if ($messageSent) {
        $action->sendUserMsg("success", "Mesajul a fost trimis");
    }
} else {
    $action->sendUserMsg("danger", "Not set");
}