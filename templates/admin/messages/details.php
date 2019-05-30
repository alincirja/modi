<?php
    include_once "../../../inc/global-variables.php";
    $errorAlert = '<div class="alert alert-warning">Mesajul nu a fost gasit</div>';
    if (!isset($_GET["id"]) || empty($_GET["id"])) {
        echo $errorAlert;
        exit();
    } else {
        include_once "../../../classes/Database.php";
        $action = new Database();
        $message = $action->getDataById("contact", $_GET["id"]);

        if (!$message) {
            echo $errorAlert;
            exit();
        }
?>
    <div class="message">
        <p>
            <span>Subiect:</span>
            <strong class="text-primary text-capitalize"><?php echo $message["subject"]; ?></strong>
        </p>
        <h5><?php echo $message["title"]; ?></h5>
        <p><?php echo $message["message"]; ?></p>
        <p>
            <h6 class="m-0"><?php echo $message["name"]; ?></h6>
            <small><?php echo $message["occupation"]; ?></small>
            <div class="phone"><?php echo $message["phone"]; ?></div>
            <div class="email"><a href="mailto:<?php echo $message["email"]; ?>"><?php echo $message["email"]; ?></a></div>
        </p>
        <?php if ($message["subject"] === "feedback") { ?>
            <div class="text-right">
                <?php if (!$message["public"]) { ?>
                    <a class="set-msg-status btn btn-sm btn-outline-primary" href="<?php echo ROOT_PATH; ?>scripts/contact/status" data-id="<?php echo $message["id"]; ?>" data-mark="public">Publica in Feedback</a>
                <?php } else { ?>
                    <a class="set-msg-status btn btn-sm btn-outline-primary" href="<?php echo ROOT_PATH; ?>scripts/contact/status" data-id="<?php echo $message["id"]; ?>" data-mark="private">Scoate din Feedback</a>
                <?php } ?>
            </div>
        <?php } ?>
    </div>
<?php
    }
?>