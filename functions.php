<?php

require get_template_directory() . '/inc/customizer.php';

function wptm001_load_scripts() {
    // Enqueue the main stylesheet
    wp_enqueue_style( 'wptm001-style', get_stylesheet_uri(), array(), '1.0', 'all' );
    wp_enqueue_script( 'wptm001-script', get_template_directory_uri() . '/js/app.js', array(), '1.0', true ); /* true means load in footer */
}
add_action( 'wp_enqueue_scripts', 'wptm001_load_scripts' );



function wptm001_config() {

    $textdomain = 'wptm001';
    load_theme_textdomain( $textdomain, get_template_directory() . '/languages' );
    

    register_nav_menus( array(
        'primary' => __( 'Primary Menu', 'wptm001' ),
        'footer' => __( 'Footer Menu', 'wptm001' )
    ) );

    $args = array(
        'default-image'          => get_template_directory_uri() . '/assets/images/default-header.jpg',
        'width'                  => 2000,
        'height'                 => 250,
        'flex-width'             => true,
        'flex-height'            => true,
        'header-text'            => false,
        'uploads'                => true,
    );

    add_theme_support( 'custom-header', $args );
    add_theme_support( 'custom-logo', array (
        'height' => 100,
        'width' => 200,
        'flex-width' => true,
        'flex-height' => true,
    ) );
    add_theme_support('automatic-feed-links');
    add_theme_support( 'html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script'
    ) );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'title-tag' );
};

add_action( 'after_setup_theme', 'wptm001_config', 0 );   

add_action( 'widgets_init', 'wptm001_widgets' );
function wptm001_widgets() {
    register_sidebar( array(
        'name'          => __( 'Sidebar', 'wptm001' ),
        'id'            => 'sidebar-1',
        'description'   => __( 'Add widgets here to appear in your sidebar.', 'wptm001' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );
}   

if ( ! function_exists( 'wp_body_open' ) ) {
    function wp_body_open() {
        do_action( 'wp_body_open' );
    }
}

