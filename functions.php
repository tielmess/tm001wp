<?php

function wptm001_load_scripts() {
    // Enqueue the main stylesheet
    wp_enqueue_style( 'wptm001-style', get_stylesheet_uri(), array(), '1.0', 'all' );
}
add_action( 'wp_enqueue_scripts', 'wptm001_load_scripts' );
