<h4 class="line-title">Mesaje</h4>
<?php
    include_once "classes/Database.php";
    $action = new Database();
    $messages = $action->getData("contact");

    if (count($messages)) {
    $subjects = $action->getCustomData("SELECT * FROM contact GROUP BY subject");
?>
    <div class="row">
        <div class="col-12 col-md-4 col-lg-3">
            <select id="subjectFilter" class="form-control mb-3 text-capitalize">
                <option value="">-- toate subiectele --</option>
                <?php foreach ($subjects as $subject) { ?>
                    <option value="<?php echo $subject["subject"]; ?>" class="text-capitalize"><?php echo $subject["subject"]; ?></option>
                <?php } ?>
            </select>
            <ul class="messages-list list-unstyled">
                <?php foreach ($messages as $message) { ?>
                    <li class="message-item <?php echo $message["new"] ? "new" : ""; ?>" data-filter="<?php echo $message["subject"]; ?>" data-id="<?php echo $message["id"]; ?>" data-url="<?php echo ROOT_PATH . "templates/admin/messages/details?id=" . $message["id"]; ?>">
                        <div class="name"><?php echo $message["name"]; ?></div>
                        <time><?php echo $message["time"]; ?></time>
                    </li>
                <?php } ?>
            </ul>
        </div>
        <div class="col-12 col-md-8 col-lg-9">
            <div id="messageTemplate"></div>
        </div>
    </div>
<?php
    }
?>