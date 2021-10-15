<?php
/**
 * Main theme functions
 */

function amplify_scripts() {
    // wp_enqueue_style( 'style', get_stylesheet_uri() );
    wp_enqueue_style( 'style', get_template_directory_uri() . '/assets/css/style.css');
    wp_enqueue_style( 'boostrap-style', 'https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css', [], 1, 'all' );
    wp_enqueue_script( 'script', get_template_directory_uri() . '/assets/js/script.js', array ( 'jquery' ), 1.0, true);
    wp_enqueue_script( 'boostrap-script', 'https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js', array ( 'jquery' ),false, true);
    
  }
  add_action( 'wp_enqueue_scripts', 'amplify_scripts' );

  function theme_setup(){
    add_theme_support( 'title-tag' );
    add_theme_support( 'custom-logo', array(
        'height' => 60,
        'width'  => 225,
        'flex-height' => true,
        'flex-width'  => true,
        'header-text' => array( 'site-title', 'site-description' ),
    ) );
  }
  add_action('after_setup_theme', 'theme_setup');

  function register_menus() {
    register_nav_menus(
      array(
        'header-menu' => __( 'Header Menu' ),
        'footer-menu' => __( 'Footer Menu' ),
        'extra-menu' => __( 'Extra Menu' )
       )
     );
   }
   add_action( 'init', 'register_menus' );
