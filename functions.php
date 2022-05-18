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
    wp_enqueue_style( 'bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css', array(), '1.1', 'all');
    wp_enqueue_style( 'icons', 'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css', array(), '1.1', 'all');
    wp_enqueue_script( 'popper', 'https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js', array ( 'jquery' ), 5.1, true);
    wp_enqueue_script( 'app-js', get_template_directory_uri() . '/js/app.js', array ( 'popper' ), 1.0, true);
      
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
      }
  }
  add_action( 'wp_enqueue_scripts', 'temauno_add_theme_scripts' );

  

 //Registrar barras laterales
 function temauno_widgets_init() {
    /*register_sidebar(
        array(
            'id'            => 'primary',
            'name'          => __( 'Barra lateral primaria' ),
            'description'   => __( 'Elementos que se verán en la parte derecha de cada página.' ),
            'before_widget' => '<div class="card-body t1-wi">',
            'after_widget'  => '</div>',
            'before_title'  => '<h4 class="widget-title">',
            'after_title'   => '</h4></hr>',
        )
    );*/
    /* Add Multiple sidebar 
*/
if ( function_exists('register_sidebar') ) {
    $sidebar1 = array(
        'id'            => 'primary',
        'before_widget' => '<div class="card-body t1-wi mb-3">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="widget-title">',
        'after_title' => '</h4>',        
        'name'=> __( 'Barra lateral primaria' ), 
    );  
    $sidebar2 = array(
        'id'            => 'footer-1',
        'before_widget' => '<div class="card-body mt-3">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="widget-title">',
        'after_title' => '</h4>',        
        'name'=> __( 'Pie de página 1' ),  
    );
    $sidebar3 = array(
        'id'            => 'footer-2',
        'before_widget' => '<div class="card-body mt-3">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="widget-title">',
        'after_title' => '</h4>',        
        'name'=> __( 'Pie de página 2' ),  
    );
    $sidebar4 = array(
        'id'            => 'footer-3',
        'before_widget' => '<div class="card-body mt-3">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="widget-title">',
        'after_title' => '</h4>',        
        'name'=> __( 'Pie de página 3' ),  
    );
    register_sidebar($sidebar1);
    register_sidebar($sidebar2);
    register_sidebar($sidebar3);
    register_sidebar($sidebar4);
    }
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

   function the_breadcrumb() {
       echo '<nav aria-label="breadcrumb">';    
       echo '<ol class="breadcrumb">';
       if (!is_home()) {
           echo '<li class="breadcrumb-item"><a href="';
           echo get_option('home');
           echo '">';
           echo 'Inicio';
           echo "</a></li>";
           if (is_category() || is_single()) {
               echo '<li class="breadcrumb-item">';
               the_category(' </li><li class="breadcrumb-item"> ');
               if (is_single()) {
                   echo "</li><li class='breadcrumb-item active'>";
                   the_title();
                   echo '</li>';
               }
           } elseif (is_page()) {
               echo '<li class="breadcrumb-item">';
               echo the_title();
               echo '</li>';
           }
       }
       elseif (is_tag()) {single_tag_title();}
       elseif (is_day()) {echo"<li class='breadcrumb-item'>Archivo del día: "; the_time('F jS, Y'); echo'</li>';}
       elseif (is_month()) {echo"<li class='breadcrumb-item'>Archivo del mes: "; the_time('F, Y'); echo'</li>';}
       elseif (is_year()) {echo"<li class='breadcrumb-item'>Archivo del año "; the_time('Y'); echo'</li>';}
       elseif (is_author()) {echo"<li class='breadcrumb-item'>Archivos del autor:"; echo'</li>';}
       elseif (isset($_GET['paged']) && !empty($_GET['paged'])) {echo "<li>Archivos del blog"; echo'</li>';}
       elseif (is_search()) {echo"<li class='breadcrumb-item'>Resultados de búsqueda"; echo'</li>';}
       echo '</ol>';
       echo '</nav>';
   } 
   
add_filter( "the_excerpt", "add_class_to_excerpt" );
function add_class_to_excerpt( $excerpt ) {
    return str_replace('<p', '<p class="h4 fst-italic text-center mb-3"', $excerpt);
}
  