<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Barlow+Condensed:wght@500;700&family=Roboto:ital,wght@0,300;0,400;0,500;0,700;1,400&display=swap"
        rel="stylesheet">

    <title>Yarik Legkiy | Blog</title>

    <?php wp_head();?>

</head>

<body>
    <!-- header start -->
    <header class="header">
        <div class="header__wrapper">
            <a href="<?php echo home_url(); ?>" class="header__logo">
                <h1 class="header__logo--title"><?php bloginfo('name'); ?></h1>
                <p class="header__logo--subtitle"><?php bloginfo('description'); ?></p>
            </a>            
            <?php get_search_form(); ?>
            <div class="burger">
                <div class="burger__lines">
                    <span class="burger__line--left"></span>
                    <span class="burger__line--right"></span>
                </div>
            </div>
            <div class="header__bottom">
                <?php wp_nav_menu(array(
                    'theme_location'  => 'header-menu',
                    'container'       => null,
                    'menu_class'      => 'header__nav',
                )); ?>  
            </div>
        </div>
    </header>
    <!-- header end -->

    <!-- socials start -->
    <section class="socials">
        <ul class="socials__items">
            <?php wp_nav_menu(array(
                    'theme_location'  => 'socials-menu',
                    'container'       => null,
                    'items_wrap'      => '%3$s'
            )); ?>
        </ul>
    </section>
    <!-- socials end -->