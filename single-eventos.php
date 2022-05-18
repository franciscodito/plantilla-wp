<?php get_header(); ?>
        <div class="row">
        <!-- Entradas -->
                <div class="col-lg-12">
                    <!-- Entrada -->
                    <div class="container py-4">
                        <div class="row">
                        <?php 
                            if ( have_posts() ) : 
                                while ( have_posts() ) : the_post();
                        ?> 
                                <div class="col-lg-4">
                                    <?php
                                        if ( has_post_thumbnail() ) {
                                            the_post_thumbnail('post-thumbnails', array( 'class' => 'img-fluid mb-3' ));
                                        }
                                    ?>
                                </div>
                                <div class="col-lg-8">
                                    <?php the_breadcrumb(); ?>
                                    <h2><?php the_title(); ?></h2>
                                    <h4><?php the_field('fecha'); ?></h4>
                                    <?php the_content(); ?>
                                    <h3><?php the_field('precio'); ?> €</h3>
                                    <a href="<?php the_field('url'); ?>" class="btn btn-primary mx-auto" role="button" data-bs-toggle="button" rel="nofollow" target="_blank">Comprar aquí</a>
                                    <div class="alert alert-info mt-3 mb-3" role="alert">
                                        <p class="small mb-0">Categorías: <?php the_category(' / '); ?></p>
                                        <p class="small mb-0">Etiquetas: <?php the_tags('', ' / ', ''); ?></p>
                                    </div>    
                                </div>
                                <div class="col-lg-12">    
                                    <hr>
                                    <ul class="list-group">
                                        <li class="list-group-item list-group-item-info"><b>Fecha:</b> <?php the_field('fecha'); ?></li>
                                        <li class="list-group-item"><b>Lugar:</b> <?php the_field('lugar'); ?></li>
                                        <li class="list-group-item list-group-item-info"><b>Promotor:</b> <?php the_field('promotor'); ?></li>
                                        <li class="list-group-item"><b>Email:</b> <?php the_field('email'); ?></li>
                                        <li class="list-group-item list-group-item-info"><b>Teléfono:</b> <?php the_field('telefono'); ?></li>
                                    </ul>
                                    <hr>
                                    <?php
                                        if ( comments_open() || get_comments_number() )  :
                                                comments_template();
                                        endif;      
                                    ?>
                                </div>
                        <?php            
                                endwhile; 
                            endif; 
                        ?>
                        </div>
                    </div>  
                    <!-- Entrada -->
                </div>
        <!-- Entradas -->
        </div>

    </div>
    <!-- Blog -->
    <?php get_footer(); ?>