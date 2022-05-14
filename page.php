<?php get_header(); ?>
        <div class="row">
        <!-- Entradas -->
                <div class="col-lg-12">
                    <!-- Entrada -->
                    <div class="card-body">
                    <?php 
                        if ( have_posts() ) : 
                            while ( have_posts() ) : the_post();
                    ?> 
                    <div class="card-body">
                        <h2><?php the_title(); ?></h2>
                        <p class="small mb-0">Fecha: <?php the_time('F j, Y'); ?></p>
                        <p class="small mb-0">Autor: <?php the_author(); ?></p>
                        <p class="small mb-0">Categorías: <?php the_category(' / '); ?></p>
                        <p class="small">Etiquetas: <?php the_tags('', ' / ', ''); ?></p>
                        <?php
                            if ( has_post_thumbnail() ) {
                                the_post_thumbnail('post-thumbnails', array( 'class' => 'img-fluid mb-3' ));
                            }
                        ?>
                        <?php the_content(); ?>
                    </div>
                    <?php            
                            endwhile; 
                        endif; 
                    ?>
                    </div>
                    <!-- Entrada -->
                </div>
        <!-- Entradas -->
        </div>

    </div>
    <!-- Blog -->
    <?php get_footer(); ?>