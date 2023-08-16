<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0,
        minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<header class="header">
    <div class="container header__container">
        <a class="header__logo-wrapper" href="/">
            <img class="header__logo" src="<?= get_template_directory_uri(); ?>/asset/image/logo.png" alt="logo">
        </a>

        <a href="#" class="header__menu-open-btn js-header-menu-open-btn">
            <svg>
                <use xlink:href="#hamburger-button"></use>
            </svg>

            <span>Menu</span>
        </a>

        <div class="header__menu-wrapper js-header-menu-body">
            <a class="header__menu-close-btn js-header-menu-close-btn" href="#">
                <svg>
                    <use xlink:href="#close"></use>
                </svg>
            </a>

	        <?php
	        wp_nav_menu( array(
		        'theme_location'  => 'header',
		        'container'       => 'nav',
		        'container_class' => 'header__menu js-header-menu-body',
		        'menu_class'      => 'header__menu-list',
		        'items_wrap'      => '<ul class="%2$s">%3$s</ul>'
	        ) );
	        ?>
        </div>
    </div>
</header>