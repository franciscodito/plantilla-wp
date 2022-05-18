<?php get_header(); ?>

<?php 
    if ( have_posts() ) : 
        while ( have_posts() ) : the_post();
?> 
    <div class="row">
        <div class="col-lg-12 text-center">
            <div class="alert alert-info mt-3 py-0" role="alert"><?php the_breadcrumb(); ?></div>
            <h1 class="display-1 py-3"><?php the_title(); ?></h1>
            <?php the_excerpt(); ?>
            <?php 
                if ( get_field( 'resumen' ) ){
                    the_field( 'resumen' );
                }  
            ?>
            <p class="small mb-0"><i class="bi bi-calendar-date"></i> : <?php the_time('F j, Y'); ?> | <i class="bi bi-person"></i> : <?php the_author(); ?> y <?php the_field( 'coautor' ); ?></p>
            <p class="small mb-5"><i class="bi bi-folder"></i> : <?php the_category(' / '); ?> | <i class="bi bi-tags"></i> : <?php the_tags('', ' / ', ''); ?></p>
        </div>
        <!-- Entradas -->
        <div class="col-lg-9">
            <!-- Entrada -->            
            <?php
                if ( has_post_thumbnail() ) {
                    the_post_thumbnail('large', array( 'class' => 'img-fluid img-thumbnail rounded mb-5 d-block' ));
                }
            ?>
            <?php the_content(); ?>
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
    <!-- Entrada -->
    <!-- Entradas -->
    <!-- Barra lateral -->
        <?php get_sidebar(); ?>
    <!-- Barra lateral -->
    </div>
</div>
<!-- Blog -->
<?php get_footer(); ?>