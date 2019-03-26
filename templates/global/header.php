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
                                <small class="badge badge-danger">0</small>
                            </div>
                        </div><!--/.mini-cart-->
                    </div>
                    <div class="col-12 col-lg-auto order-4 ml-auto order-lg-2">
                        <nav id="nav" class="site-nav">
                            <ul class="nav">
                                <li><a href="<?php echo ROOT_URL; ?>">Acasa</a></li>
                                <li class="dropdown"><a href="<?php echo ROOT_URL; ?>">Meniu <i class="fas fa-chevron-down"></i></a>
                                    <ul class="nav-submenu">
                                        <li><a href="#">Cumparaturi</a>
                                            <ul class="nav--submenu">
                                                <li><a href="#">Alimente</a></li>
                                                <li><a href="#">Medicamente</a></li>
                                                <li><a href="#">Menaj</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="#">Evenimente</a>
                                            <ul class="nav--submenu">
                                                <li><a href="#">Film</a></li>
                                                <li><a href="#">Teatru</a></li>
                                                <li><a href="#">Opera</a></li>
                                                <li><a href="#">Concert</a></li>
                                                <li><a href="#">Festival</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="#">Promotii</a></li>
                                    </ul>
                                </li>
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