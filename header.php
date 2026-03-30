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
                    <?php
                    if( has_custom_logo() ) {
                        the_custom_logo();
                    } else {
                        echo '<a href="' . home_url() . '">' . get_bloginfo( 'name' ) . '</a>';
                    }   
                    ?>
                </div>
                <div class="searchbox">
                    <form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
                        <input type="search" class="search-field" placeholder="Search..." value="<?php echo get_search_query(); ?>" name="s" />
                        <button type="submit" class="search-submit">Search</button>
                    </form>
                </div>
            </section>  
            <section class="menu-area">
                <div class="controls">
                    <!-- Main navigation with ARIA attributes -->
                    <nav class="main-nav" role="navigation" aria-label="<?php esc_attr_e( 'Primary Menu', 'wptm001' ); ?>">
                        <div class="panel">
                            <?php
                                wp_nav_menu( array(
                                    'theme_location' => 'primary',
                                    'container' => false,
                                    'menu_class' => 'nav-menu',
                                ) );
                            ?>
                        </div>
                    </nav>

                    <button
                    id="burger"
                    class="burger"
                    aria-label="Menu"
                    aria-controls="site-nav"
                    aria-expanded="false"
                    >
                    <span class="lines"><span></span></span>
                    </button>

                    <!-- Theme toggle button with ARIA attributes -->
                    <!-- <button
                    class="theme-toggle"
                    id="theme-toggle"
                    aria-label="Toggle dark mode"
                    aria-pressed="false"
                    type="button"
                    >
                    🌙
                    </button> -->
                </div>
                <!-- /.controls -->
            </section>             
        </header>