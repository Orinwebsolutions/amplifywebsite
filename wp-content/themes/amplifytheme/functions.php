<?php
/**
 * Main theme functions
 */
define( 'AMPLIFY_THEME_PATH', plugin_dir_path( __FILE__ ) );
include_once( AMPLIFY_THEME_PATH. 'inc/widgets.php' );

function amplify_scripts() {
    // wp_enqueue_style( 'style', get_stylesheet_uri() );
    wp_enqueue_style( 'style', get_template_directory_uri() . '/assets/css/style.css');
    wp_enqueue_style( 'boostrap-style', 'https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css', [], 1, 'all' );
    wp_enqueue_style( 'owl-style', get_template_directory_uri() . '/assets/css/owl.carousel.min.css', [], 1, 'all' );
    wp_enqueue_style( 'owl-theme-style', get_template_directory_uri() . '/assets/css/owl.theme.default.min.css', [], 1, 'all' );
    wp_enqueue_script( 'script', get_template_directory_uri() . '/assets/js/script.js', array ( 'jquery' ), 1.0, true);
    wp_enqueue_script( 'boostrap-script', 'https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js', array ( 'jquery' ),false, true);
    wp_enqueue_script( 'owl-script', get_template_directory_uri() . '/assets/js/owl.carousel.js', array ( 'jquery' ),false, false);
    
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

  function amplifytheme_register_sidebars() {

    register_sidebar( [
      'name'          => __( 'Footer collumn 01', 'amplifytheme' ),
      'id'            => 'footer-1',
      'description '  => __( 'Footer collumn 01', 'amplifytheme' ),
      'before_widget' => '<div id="%1$s" class="col widget widget-footer-01 %2$s">',
      'after_widget'  => '</div>',
      'before_title'  => '<p class="widget-title">',
      'after_title'   => '</p>',
    ] );

    register_sidebar( [
      'name'          => __( 'Footer collumn 02', 'amplifytheme' ),
      'id'            => 'footer-2',
      'description '  => __( 'Footer collumn 02', 'amplifytheme' ),
      'before_widget' => '<div id="%1$s" class="col widget widget-footer-02 %2$s">',
      'after_widget'  => '</div>',
      'before_title'  => '<p class="widget-title">',
      'after_title'   => '</p>',
    ] );

    register_sidebar( [
      'name'          => __( 'Footer collumn 03', 'amplifytheme' ),
      'id'            => 'footer-3',
      'description '  => __( 'Footer collumn 03', 'amplifytheme' ),
      'before_widget' => '<div id="%1$s" class="col widget widget-footer-03 %2$s">',
      'after_widget'  => '</div>',
      'before_title'  => '<p class="widget-title">',
      'after_title'   => '</p>',
    ] );

    register_sidebar( [
        'name'          => __( 'Footer Copyright', 'amplifytheme' ),
        'id'            => 'sidebar-1',
        'description '  => __( 'Footer Copyright sidebar', 'amplifytheme' ),
        'before_widget' => '<div id="%1$s" class="col widget widget-copyright %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<p class="widget-title">',
        'after_title'   => '</p>',
    ] );

  }

add_action( 'widgets_init', 'amplifytheme_register_sidebars' );

function amplifytheme_register_widgets(){
  register_widget( 'Amplify_Widget' );
}

add_action( 'widgets_init', 'amplifytheme_register_widgets' );


function integrate_logos_cpt() {
 
  // Set UI labels for Custom Post Type
    $labels = array(
      'name'                => _x( 'Logos', 'Post Type General Name', 'amplifytheme' ),
      'singular_name'       => _x( 'Logo', 'Post Type Singular Name', 'amplifytheme' ),
      'menu_name'           => __( 'Logos', 'amplifytheme' ),
      'parent_item_colon'   => __( 'Parent Logo', 'amplifytheme' ),
      'all_items'           => __( 'All Logos', 'amplifytheme' ),
      'view_item'           => __( 'View Logo', 'amplifytheme' ),
      'add_new_item'        => __( 'Add New Logo', 'amplifytheme' ),
      'add_new'             => __( 'Add New', 'amplifytheme' ),
      'edit_item'           => __( 'Edit Logo', 'amplifytheme' ),
      'update_item'         => __( 'Update Logo', 'amplifytheme' ),
      'search_items'        => __( 'Search Logo', 'amplifytheme' ),
      'not_found'           => __( 'Not Found', 'amplifytheme' ),
      'not_found_in_trash'  => __( 'Not found in Trash', 'amplifytheme' ),
    );
     
  // Set other options for Custom Post Type
     
    $args = array(
      'label'               => __( 'Integrate Logos', 'amplifytheme' ),
      'description'         => __( 'Integrate Logos', 'amplifytheme' ),
      'labels'              => $labels,
      // Features this CPT supports in Post Editor
      'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
      'hierarchical'        => false,
      'public'              => true,
      'show_ui'             => true,
      'show_in_menu'        => true,
      'show_in_nav_menus'   => true,
      'show_in_admin_bar'   => true,
      'menu_position'       => 5,
      'can_export'          => true,
      'has_archive'         => true,
      'exclude_from_search' => false,
      'publicly_queryable'  => true,
      'capability_type'     => 'post',
      'show_in_rest' => true,
   
    );
     
    // Registering your Custom Post Type
    register_post_type( 'integrate_logos', $args );
  }

  add_action('init', 'integrate_logos_cpt');