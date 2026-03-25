<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php wp_title(); ?></title>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <div id="page" class="site">
        <header>
            <section class="top-bar">
                <div class="logo">
                    <a href="<?php echo home_url(); ?>"><?php bloginfo( 'name' ); ?></a>
                </div>
                <div class="searchbox">
                    <form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
                        <input type="search" class="search-field" placeholder="Search..." value="<?php echo get_search_query(); ?>" name="s" />
                        <button type="submit" class="search-submit">Search</button>
                    </form>
                </div>
            </section>  
            <section class="menu-area">
                <nav class="main-nav" role="navigation" aria-label="<?php esc_attr_e( 'Primary Menu', 'wptm001' ); ?>">
                    <?php
                    wp_nav_menu( array(
                        'theme_location' => 'primary',
                        'container' => false,
                        'menu_class' => 'nav-menu',
                    ) );
                    ?>
                </nav>
            </section>             
        </header>