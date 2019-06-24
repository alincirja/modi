<?php
    include_once "templates/global/head.php";

    setSeo("contact");

    include_once "templates/global/header.php";

    setPageHeading("Contact");
?>

<section id="main" class="main-content main-content-contact">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6 col-lg-4">
                <h4 class="line-title">Contact Info</h4>
                <div class="card">
                    <div class="card-body">
                        <p>Always on the road for our customer's desire!</p>
                        <div class="contact-list">
                            <div class="contact-item d-flex flex-nowrap">
                                <div class="icon"><i class="fas fa-fw fa-map-marked-alt"></i></div>
                                <div class="info">
                                    <p><span class="text-primary">Adresa:</span> 121, Open Road, Strada 13 Decembrie, Făgăraș, Brașov, România</p>
                                </div>
                            </div>
                            <div class="contact-item d-flex flex-nowrap">
                                <div class="icon"><i class="fas fa-fw fa-phone"></i></div>
                                <div class="info">
                                    <p><span class="text-primary">Telefon:</span> +40 762 273 554</p>
                                </div>
                            </div>
                            <div class="contact-item d-flex flex-nowrap">
                                <div class="icon"><i class="fas fa-fw fa-envelope"></i></div>
                                <div class="info">
                                    <p><span class="text-primary">Email:</span> contact@openroad.ro</p>
                                </div>
                            </div>
                        </div>

                        <ul class="list-unstyled list-inline social-list m-0">
                            <li><a href="#"><i class="fab fa-fw fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fab fa-fw fa-instagram"></i></a></li>
                            <li><a href="#"><i class="fab fa-fw fa-youtube"></i></a></li>
                            <li><a href="#"><i class="fab fa-fw fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-8">
                <h4 class="line-title">Contact Form</h4>
                <div class="card">
                    <div class="card-body">
                        <?php include_once "templates/content-pages/contact-form.php"; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include_once "templates/global/footer.php"; ?>