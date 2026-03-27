<?php

function wptm001_load_scripts() {
    // Enqueue the main stylesheet
    wp_enqueue_style( 'wptm001-style', get_stylesheet_uri(), array(), '1.0', 'all' );
    wp_enqueue_script( 'wptm001-script', get_template_directory_uri() . '/js/app.js', array(), '1.0', true ); /* true means load in footer */
}
add_action( 'wp_enqueue_scripts', 'wptm001_load_scripts' );



function wptm001_config() {
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
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
};

add_action( 'after_setup_theme', 'wptm001_config', 0 );   