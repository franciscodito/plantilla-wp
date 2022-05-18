<?php
if ( ! function_exists('eventos_post_type') ) {

    // Register Custom Post Type
    function eventos_post_type() {
    
        $labels = array(
            'name'                  => _x( 'Eventos', 'Post Type General Name', 'text_domain' ),
            'singular_name'         => _x( 'Evento', 'Post Type Singular Name', 'text_domain' ),
            'menu_name'             => __( 'Eventos', 'text_domain' ),
            'name_admin_bar'        => __( 'Evento', 'text_domain' ),
            'archives'              => __( 'Archivos', 'text_domain' ),
            'attributes'            => __( 'Atributos', 'text_domain' ),
            'parent_item_colon'     => __( 'Evento Padre', 'text_domain' ),
            'all_items'             => __( 'Todos los Eventos', 'text_domain' ),
            'add_new_item'          => __( 'Agregar Nuevo Evento', 'text_domain' ),
            'add_new'               => __( 'Agregar Nuevo', 'text_domain' ),
            'new_item'              => __( 'Nuevo Evento', 'text_domain' ),
            'edit_item'             => __( 'Editar Evento', 'text_domain' ),
            'update_item'           => __( 'Actualizar Evento', 'text_domain' ),
            'view_item'             => __( 'Ver Evento', 'text_domain' ),
            'view_items'            => __( 'Ver Eventos', 'text_domain' ),
            'search_items'          => __( 'Buscar Evento', 'text_domain' ),
            'not_found'             => __( 'No Encontrado', 'text_domain' ),
            'not_found_in_trash'    => __( 'No Encontrado en la Papelera', 'text_domain' ),
            'featured_image'        => __( 'Imagen Destacada', 'text_domain' ),
            'set_featured_image'    => __( 'Agregar Imagen Destacada', 'text_domain' ),
            'remove_featured_image' => __( 'Remover Imagen Destacada', 'text_domain' ),
            'use_featured_image'    => __( 'Utilizar como Imagen Destacada', 'text_domain' ),
            'insert_into_item'      => __( 'Insertar dentro del Evento', 'text_domain' ),
            'uploaded_to_this_item' => __( 'Evento Subido', 'text_domain' ),
            'items_list'            => __( 'Lista de Eventos', 'text_domain' ),
            'items_list_navigation' => __( 'Lista de Navegación de Eventos', 'text_domain' ),
            'filter_items_list'     => __( 'Filtrar Lista de Eventos', 'text_domain' ),
        );
        $args = array(
            'label'                 => __( 'Evento', 'text_domain' ),
            'description'           => __( 'Entradas de Eventos', 'text_domain' ),
            'labels'                => $labels,
            'supports'              => array( 'title', 'editor', 'thumbnail', 'comments', 'custom-fields', 'post-formats' ),
            'taxonomies'            => array( 'category', 'post_tag' ),
            'hierarchical'          => false,
            'public'                => true,
            'show_ui'               => true,
            'show_in_menu'          => true,
            'menu_position'         => 5,
            'menu_icon'             => 'dashicons-tickets-alt',
            'show_in_admin_bar'     => true,
            'show_in_nav_menus'     => true,
            'can_export'            => true,
            'has_archive'           => true,
            'exclude_from_search'   => false,
            'publicly_queryable'    => true,
            'capability_type'       => 'page',
        );
        register_post_type( 'eventos', $args );
    
    }
    add_action( 'init', 'eventos_post_type', 0 );
    
    }

