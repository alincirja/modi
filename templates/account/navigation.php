<div class="card">
    <div class="card-body">
        <ul class="list-unstyled account-nav">
            <li><a href="<?php echo ROOT_URL; ?>account?sec=info" class="<?php echo isset($_GET["sec"]) && $_GET["sec"] === "info" ? " active " : ""; ?>"
            >Profil</a></li>
            <li><a href="<?php echo ROOT_URL; ?>account?sec=orders" class="<?php echo isset($_GET["sec"]) && $_GET["sec"] === "orders" ? " active " : ""; ?>"
            >Comenzi</a></li>
            <li><a href="<?php echo ROOT_URL; ?>account?sec=address" class="<?php echo isset($_GET["sec"]) && $_GET["sec"] === "address" ? " active " : ""; ?>"
            >Adrese</a></li>
            <li><a href="<?php echo LOGOUT; ?>">Logout</a></li>
        </ul>
    </div>
</div>