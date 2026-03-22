<?php

function wptm001_load_scripts() {
    // Enqueue the main stylesheet
    wp_enqueue_style( 'wptm001-style', get_stylesheet_uri(), array(), '1.0', 'all' );
    wp_enqueue_script( 'wptm001-script', get_template_directory_uri() . '/js/app.js', array(), '1.0', true ); /* true means load in footer */
}
add_action( 'wp_enqueue_scripts', 'wptm001_load_scripts' );
