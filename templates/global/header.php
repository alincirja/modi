<?php
    session_start();
    include_once "inc/global-variables.php";
?>

<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php echo isset($pageTitle) ? $pageTitle : SITE . " | " . TAGLINE; ?></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="<?php echo PATH_STATIC . "css/style.css"; ?>">
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="#">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        <header id="header" class="site-header">
            <div class="container">
                <div class="row">
                    <div class="col-4 col-lg-3 col-xl-2">
                        <div class="site-logo">
                            <a href="<?php echo ROOT_URL; ?>" title="<?php echo SITE; ?>"><?php echo SITE; ?></a>
                        </div>
                    </div>
                    <div class="col-12 col-lg-9 col-xl-10">
                        <nav id="nav" class="site-nav">
                            <ul class="nav">
                                <li><a href="<?php echo ROOT_URL; ?>">Acasa</a></li>
                                <li><a href="<?php echo ROOT_URL; ?>">Meniu</a>
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
                                <li><a href="<?php echo ROOT_URL; ?>">Despre</a></li>
                                <li><a href="<?php echo ROOT_URL; ?>">Q&A</a></li>
                                <li><a href="<?php echo ROOT_URL; ?>">Feedback</a></li>
                                <li><a href="<?php echo ROOT_URL; ?>">Contact</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </header>