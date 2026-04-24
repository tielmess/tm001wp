<?php   
/**
 * WP_TM001 Theme Customizer
 *
 * @package WP_TM001
 */ 

function wp_tm001_customize_register( $wp_customize ) {
// Footer Copyright Customizer
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

// Hero Section Customizer
    $wp_customize->add_section( 'sec_hero' , array(
        'title'      => __( 'Hero Section', 'wp_tm001' ),
        'priority'   => 30,
        'description' => 'Customize the hero section of your theme',
    ) );

    $wp_customize->add_setting( 'set_hero_title' , array(
        'default'   => 'Welcome to WP-TM001 Theme',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'set_hero_title', array(
        'label'      => __( 'Hero Title', 'wp_tm001' ),
        'section'    => 'sec_hero',
        'settings'   => 'set_hero_title',
        'type'       => 'text',
    ) );

    $wp_customize->add_setting( 'set_hero_text' , array(
        'default'   => 'This is a custom WordPress theme built for learning and experimentation.',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_textarea_field',
    ) );
    $wp_customize->add_control( 'set_hero_text', array(
        'label'      => __( 'Hero Text', 'wp_tm001' ),
        'section'    => 'sec_hero',
        'settings'   => 'set_hero_text',
        'type'       => 'textarea',
    ) );

    $wp_customize->add_setting( 'set_hero_button_text' , array(
        'default'   => 'Learn More',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_text_field',
    ) );        
    $wp_customize->add_control( 'set_hero_button_text', array(
        'label'      => __( 'Hero Button Text', 'wp_tm001' ),
        'section'    => 'sec_hero',
        'settings'   => 'set_hero_button_text',
        'type'       => 'text',
    ) );

    $wp_customize->add_setting( 'set_hero_button_link' , array(
        'type' => 'theme_mod',  
        'default'   => '#',
        'transport' => 'refresh',
        'sanitize_callback' => 'esc_url_raw',
    ) );
    $wp_customize->add_control( 'set_hero_button_link', array(
        'label'      => __( 'Hero Button Link', 'wp_tm001' ),
        'section'    => 'sec_hero',
        'description' => 'Enter the URL for the hero button',
        'settings'   => 'set_hero_button_link',
        'type'       => 'url',
    ) );    

    $wp_customize->add_setting( 'set_hero_height' , array(
        'default'   => 500,
        'sanitize_callback' => 'absint',
    ) );
    $wp_customize->add_control( 'set_hero_height', array(
        'label'      => __( 'Hero Section Height (px)', 'wp_tm001' ),
        'section'    => 'sec_hero',
        'settings'   => 'set_hero_height',
        'type'       => 'number',
        'input_attrs' => array(
            'min' => 300,
            'max' => 1000,
            'step' => 50,
        ),  
    ) );

    $wp_customize->add_setting( 'set_hero_background' , array(
        'type' => 'theme_mod',
        'sanitize_callback' => 'absint',
    ) );
    $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'set_hero_background', array(
        'label'      => __( 'Hero Background Image', 'wp_tm001' ),
        'section'    => 'sec_hero',
        'settings'   => 'set_hero_background',
        'mime_type'  => 'image',
    ) ) );
}   
add_action( 'customize_register', 'wp_tm001_customize_register' );
