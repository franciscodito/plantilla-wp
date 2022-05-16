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

   // Register Custom Post Type
function events_post_type() {

	$labels = array(
		'name'                  => _x( 'Events', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Event', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Events', 'text_domain' ),
		'name_admin_bar'        => __( 'Event', 'text_domain' ),
		'archives'              => __( 'Item Archives', 'text_domain' ),
		'attributes'            => __( 'Item Attributes', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent Event:', 'text_domain' ),
		'all_items'             => __( 'All Events', 'text_domain' ),
		'add_new_item'          => __( 'Add New Event', 'text_domain' ),
		'add_new'               => __( 'New Event', 'text_domain' ),
		'new_item'              => __( 'New Item', 'text_domain' ),
		'edit_item'             => __( 'Edit Event', 'text_domain' ),
		'update_item'           => __( 'Update Event', 'text_domain' ),
		'view_item'             => __( 'View Event', 'text_domain' ),
		'view_items'            => __( 'View Items', 'text_domain' ),
		'search_items'          => __( 'Search Events', 'text_domain' ),
		'not_found'             => __( 'No Events found', 'text_domain' ),
		'not_found_in_trash'    => __( 'No Events found in Trash', 'text_domain' ),
		'featured_image'        => __( 'Featured Image', 'text_domain' ),
		'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
		'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
		'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
		'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
		'items_list'            => __( 'Items list', 'text_domain' ),
		'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'Event', 'text_domain' ),
		'description'           => __( 'Event information pages.', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'comments', 'custom-fields' ),
		'taxonomies'            => array( 'category', 'post_tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'event', $args );

}
add_action( 'init', 'events_post_type', 0 );
  