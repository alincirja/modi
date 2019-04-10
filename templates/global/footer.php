        <?php if (!isHome()) { ?>
            <footer id="footer" class="site-footer">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-md-6 col-lg-4">
                            <h6>Misiune</h6>
                            <p>E un fapt bine stabilit că cititorul va fi sustras de conţinutul citibil al unei pagini atunci când se uită la aşezarea în pagină. Scopul utilizării a Lorem Ipsum, este acela că are o distribuţie a literelor mai mult sau mai puţin normale, faţă de utilizarea</p>
                        </div>
                        <div class="col-12 col-md-6 col-lg-3">
                            <h6>Quick links</h6>
                            <ul class="list-unstyled">
                                <li><a href="<?php echo ROOT_URL; ?>about">Despre Noi</a></li>
                                <li><a href="<?php echo ROOT_URL; ?>faq">FAQ</a></li>
                                <li><a href="<?php echo ROOT_URL; ?>feedback">Feedback</a></li>
                                <li><a href="<?php echo ROOT_URL; ?>contact">Contact</a></li>
                            </ul>
                        </div>
                        <div class="col-12 col-md-6 col-lg-3">
                            <h6>My Account</h6>
                            <ul class="list-unstyled">
                                <?php if (loggedIn()) { ?>
                                <li><a href="<?php echo ROOT_URL; ?>account">Dashboard</a></li>
                                <li><a href="<?php echo LOGOUT; ?>">Logout</a></li>
                                <?php } else { ?>
                                <li><a href="<?php echo ROOT_URL; ?>authentification">Login</a></li>
                                <li><a href="<?php echo ROOT_URL; ?>authentification?auth=register">Inregistrare</a></li>
                                <?php } ?>
                            </ul>
                        </div>
                        <div class="col-12 col-md-6 col-lg-2">
                            <h6>Social Media</h6>
                            <ul class="list-unstyled">
                                <li><a href="#">Facebook</a></li>
                                <li><a href="#">Instagram</a></li>
                                <li><a href="#">Linkedin</a></li>
                                <li><a href="#">Twitter</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="copy">
                        &copy;
                        <?php echo date("Y") . " " . SITE; ?>.
                        Toate drepturile rezervate.
                    </div>
                </div>
            </footer>
        <?php } ?>
        <script src="<?php echo PATH_STATIC . "js/main.min.js"; ?>" async defer></script>
    </body>
</html>