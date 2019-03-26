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
                                <li><a href="#">Despre Noi</a></li>
                                <li><a href="#">FAQ</a></li>
                                <li><a href="#">Feedback</a></li>
                                <li><a href="#">Contact</a></li>
                            </ul>
                        </div>
                        <div class="col-12 col-md-6 col-lg-3">
                            <h6>My Account</h6>
                            <ul class="list-unstyled">
                                <li><a href="#">Dashboard</a></li>
                                <li><a href="#">Login</a></li>
                                <li><a href="#">Inregistrare</a></li>
                                <li><a href="#">Resetare Parola</a></li>
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