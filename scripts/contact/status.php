<?php
    include_once "../../classes/Database.php";
    $action = new Database();
    $marks = array("read", "unread", "public", "private");
    if (!isset($_POST["mark"]) || empty($_POST["mark"]) || !in_array($_POST["mark"], $marks)) {
        $action->sendUserMsg("danger", "Actiunea nu este permisa");
        exit();
    } else {
        switch ($_POST["mark"]) {
            case "read":
                $fields = array("new" => 0);
                $action->updateEntry("contact", $_POST["id"], $fields);
                break;
            case "unread":
                $fields = array("new" => 1);
                $action->updateEntry("contact", $_POST["id"], $fields);
                break;
            case "public":
                $fields = array("public" => 1);
                $action->updateEntry("contact", $_POST["id"], $fields);
                break;
            case "private":
                $fields = array("public" => 0);
                $action->updateEntry("contact", $_POST["id"], $fields);
                break;
            default:
                $action->sendUserMsg("danger", "Actiunea nu este permisa");
                break;
        }
    }
?>