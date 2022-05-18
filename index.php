<?php get_header(); ?>
        <div class="page-header"> 
            <h1 class="page-title text-center mt-3 py-4">Bienvenidos a mi blog</h1>
        </div>
        <div class="row">
        <!-- Entradas -->
                <div class="col-lg-9 mt-3">
                    <!-- Entrada -->
                    <?php 
                        if ( have_posts() ) : 
                            while ( have_posts() ) : the_post();
                    ?> 
                    <div class="card-body mb-3">
                        <a href="<?php the_permalink(); ?>"><h2><?php the_title(); ?></h2></a>
                        <p class="small mb-0">Fecha: <?php the_time('F j, Y'); ?></p>
                        <p class="small mb-0">Autor: <?php the_author(); ?></p>
                        <p class="small mb-0">Categorías: <?php the_category(' / '); ?></p>
                        <p class="small">Etiquetas: <?php the_tags('', ' / ', ''); ?></p>
                        <?php
                            if ( has_post_thumbnail() ) {
                                the_post_thumbnail('medium');
                            }
                        ?>
                        <?php the_excerpt(); ?>
                        <a href="<?php the_permalink(); ?>" class="btn btn-primary">Ver más</a>
                    </div>
                    <?php            
                            endwhile; 
                        endif; 
                    ?>
                    <!-- Entrada -->
                    <!-- Paginación -->
                        <div class="card-body">
                            <?php get_template_part( 'template-parts/content', 'pagination' ); ?>
                        </div>
                    <!-- Paginación -->
                </div>
        <!-- Entradas -->
        <!-- Barra lateral -->
                <?php get_sidebar(); ?>
        <!-- Barra lateral -->
        </div>

    </div>
    <!-- Blog -->
    <?php get_footer(); ?>