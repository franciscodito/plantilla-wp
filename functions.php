<?php

/**
 * Register Custom Navigation Walker
 */
function temauno_register_navwalker(){
	require_once get_template_directory() . '/template-parts/navbar.php';
}
add_action( 'after_setup_theme', 'temauno_register_navwalker' );

function temauno_setup(){
    //Soporte imágenes destacadas
    if ( function_exists( 'add_theme_support' ) ) {
        add_theme_support( 'post-thumbnails' );
     }
     add_theme_support( 'title-tag' );
     add_theme_support( 'custom-logo', array(
      'height'               => 100,
      'width'                => 400,
      'flex-height'          => true,
      'flex-width'           => true,
      'header-text'          => array( 'site-title', 'site-description' ),
      'unlink-homepage-logo' => true,
      ) );
     add_theme_support( 'automatic-feed-links' );
     add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption', 'style', 'script' ) );
     add_theme_support( 'post-formats', array( 'aside', 'gallery' ) );
  }
add_action( 'after_setup_theme', 'temauno_setup' );

function temauno_add_theme_scripts() {
    wp_enqueue_style( 'style', get_stylesheet_uri() );
    wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '1.1', 'all');
    wp_enqueue_script( 'popper', 'https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js', array ( 'jquery' ), 5.1, true);
    wp_enqueue_script( 'app-js', get_template_directory_uri() . '/js/app.js', array ( 'popper' ), 1.0, true);
      
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
      }
  }
  add_action( 'wp_enqueue_scripts', 'temauno_add_theme_scripts' );

  

 //Registrar barras laterales
 function temauno_widgets_init() {
    register_sidebar(
        array(
            'id'            => 'primary',
            'name'          => __( 'Barra lateral primaria' ),
            'description'   => __( 'Elementos que se verán en la parte derecha de cada página.' ),
            'before_widget' => '<div class="card-body t1-wi">',
            'after_widget'  => '</div>',
            'before_title'  => '<h4 class="widget-title">',
            'after_title'   => '</h4></hr>',
        )
    );
 }
 add_action( 'widgets_init', 'temauno_widgets_init' );

 //Registrar menús
 function temauno_register_my_menus() {
    register_nav_menus(
      array(
        'main-menu' => __( 'Menú principal', 'temauno' ),
        'extra-menu' => __( 'Menú extra', 'temauno' )
       )
     );
   }
   add_action( 'init', 'temauno_register_my_menus' );
  