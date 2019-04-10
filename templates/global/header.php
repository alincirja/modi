    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="#">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        <header id="header" class="site-header">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-4 col-lg-auto order-1">
                        <div class="site-logo">
                            <a href="<?php echo ROOT_URL; ?>" title="<?php echo SITE; ?>"><?php echo SITE; ?></a>
                        </div>
                    </div>
                    <div class="col-4 d-lg-none">
                        <button class="menu-toggle">
                            <span class="line line-1"></span>
                            <span class="line line-2"></span>
                            <span class="line line-3"></span>
                        </button>
                    </div>
                    <div class="col-4 col-lg-auto pl-0 order-3">
                        <div class="minicart">
                            <div class="icon">
                                <span><i class="fas fa-shopping-basket"></i></span>
                                <?php if (isset($_SESSION["cart_articles"]) && count($_SESSION["cart_articles"]) > 0) { ?>
                                <small class="badge badge-danger"><?php echo count($_SESSION["cart_articles"]); ?></small>
                                <?php } ?>
                            </div>
                            <div class="minicart-container" id="minicartContainer">
                            <?php if (isset($_SESSION["cart_articles"]) && count($_SESSION["cart_articles"])) {
                                include_once "templates/checkout/minicart.php";
                            } ?>
                            </div>
                        </div><!--/.mini-cart-->
                    </div>
                    <div class="col-12 col-lg-auto order-4 ml-auto order-lg-2">
                        <nav id="nav" class="site-nav">
                            <ul class="nav">
                                <li><a href="<?php echo ROOT_URL; ?>">Acasa</a></li>
                                <li><a href="<?php echo ROOT_URL; ?>shop">Modi Shop</a></li>
                                <li><a href="<?php echo ROOT_URL; ?>about">Despre</a></li>
                                <li><a href="<?php echo ROOT_URL; ?>faq">Q&A</a></li>
                                <li><a href="<?php echo ROOT_URL; ?>feedback">Feedback</a></li>
                                <li><a href="<?php echo ROOT_URL; ?>contact">Contact</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </header>