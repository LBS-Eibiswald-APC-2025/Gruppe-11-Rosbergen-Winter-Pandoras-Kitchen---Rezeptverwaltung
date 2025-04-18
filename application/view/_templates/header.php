<!doctype html>
<html>
<head>
    <title>Pandora's Kitchen</title>
    <!-- META -->
    <meta charset="utf-8">
    <!-- send empty favicon fallback to prevent user's browser hitting the server for lots of favicon requests resulting in 404s -->
    <link rel="icon" href="data:;base64,=">
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="<?= Config::get('URL'); ?>images/Favicon2.png">

    <!-- CSS -->
    <link rel="stylesheet" href="<?php echo Config::get('URL'); ?>css/style.css"/>
    <link rel="stylesheet" href="<?php echo Config::get('URL'); ?>css/normalize.css"/>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=local_dining"/>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha384-vtXRMe3mGCbOeY7l30aIg8H9p3GdeSe4IFlP6G8JMa7o7lXvnz3GFKzPxzJdPfGK"
            crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css"/>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

    <!-- SCRIPT JS -->
    <script src="../public/js/script.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- CSS MULTISELECT -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

</head>
<body>
<!-- wrapper, to center website -->
<div class="wrapper">
    <div class="content_wrapper">
        <div class="flex_wrapper">
            <!-- logo -->
            <div class="logo"></div>
            <!-- navigation -->
            <div class="flex_wrapper">
                <ul class="navigation">

                    <li <?php if (View::checkForActiveController($filename, "index")) {
                        echo ' class="active" ';
                    } ?> >
                        <a href="<?php echo Config::get('URL'); ?>index/index">Home</a>
                    </li>

                    <li <?php if (View::checkForActiveController($filename, "PandorasKitchen")) {
                        echo ' class="active" ';
                    } ?> >
                        <a href="<?php echo Config::get('URL'); ?>PandorasKitchen/index">Pandora's Kitchen</a>
                    </li>

                    <li <?php if (View::checkForActiveController($filename, "RecipeSearch")) {
                        echo ' class="active" ';
                    } ?> >
                        <a href="<?php echo Config::get('URL'); ?>RecipeSearch/index">Recipes</a>
                    </li>

                    <?php if (Session::userIsLoggedIn()) { ?>
                        <!-- Show Register button only for admin users -->
                        <?php if (Session::userIsAdmin()) { ?>
                            <li <?php if (View::checkForActiveControllerAndAction($filename, "register/index")) {
                                echo ' class="active" ';
                            } ?> >
                                <a href="<?php echo Config::get('URL'); ?>register/index">Register</a>
                            </li>
                        <?php } ?>
					

                    <?php } else { ?>
                        <!-- for not logged in users -->
                        <li <?php if (View::checkForActiveControllerAndAction($filename, "register/index")) {
                            echo ' class="active" ';
                        } ?> >
                            <a href="<?php echo Config::get('URL'); ?>register/index">Register</a>
                        </li>
                        <li <?php if (View::checkForActiveControllerAndAction($filename, "login/index")) {
                            echo ' class="active" ';
                        } ?> >
                            <a href="<?php echo Config::get('URL'); ?>login/index">Login</a>
                        </li>
                    <?php } ?>
                </ul>
            </div>
            <!-- my account -->
            <ul class="navigation right">
                <?php if (Session::userIsLoggedIn()) : ?>
                    <li <?php if (View::checkForActiveController($filename, "user")) {
                        echo ' class="active" ';
                    } ?> >
                        <a href="<?php echo Config::get('URL'); ?>user/index">My Account</a>
                        <ul class="navigation-submenu">

                            <li <?php if (View::checkForActiveController($filename, "user")) {
                                echo ' class="active" ';
                            } ?> >
                                <a href="<?php echo Config::get('URL'); ?>user/edituseremail">Edit my email</a>
                            </li>
                            <li <?php if (View::checkForActiveController($filename, "user")) {
                                echo ' class="active" ';
                            } ?> >
                                <a href="<?php echo Config::get('URL'); ?>user/changePassword">Set Password</a>
                            </li>
                            <li class="navigation-submenu-last-element" <?php if (View::checkForActiveController($filename, "login")) {
                                echo ' class="active" ';
                            } ?> >
                                <a href="<?php echo Config::get('URL'); ?>login/logout">Logout</a>
                            </li>
                        </ul>
                    </li>
                    <?php if (Session::get("user_account_type") == 7) : ?>
                        <li <?php if (View::checkForActiveController($filename, "admin")) {
                            echo ' class="active" ';
                        } ?> >
                            <a href="<?php echo Config::get('URL'); ?>admin/">Admin</a>
                        </li>
                    <?php endif; ?>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</div>

<!-- Header Img -->
<div class="header_img"></div>