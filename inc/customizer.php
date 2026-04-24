<?php   
/**
 * WP_TM001 Theme Customizer
 *
 * @package WP_TM001
 */ 

function wp_tm001_customize_register( $wp_customize ) {
    $wp_customize->add_section( 'sec_copyright' , array(
        'title'      => __( 'Copyright Settings', 'wp_tm001' ),
        'priority'   => 30,
        'description' => 'Copyright information for the footer',
    ) );
    $wp_customize->add_setting( 'set_copyright' , array(
        'default'   => 'Copyright 2026 WP_TM001. All rights reserved.',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'set_copyright', array(
        'label'      => __( 'Copyright Information', 'wp_tm001' ),
        'section'    => 'sec_copyright',
        'settings'   => 'set_copyright',
        'type'       => 'text',
    ) );
}   
add_action( 'customize_register', 'wp_tm001_customize_register' );
