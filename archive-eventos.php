<?php get_header(); ?>
        <!-- Título del archivo -->
        <header class="page-header">
            <h1 class="page-title text-center mt-3">
                <?php
                if ( is_day() ) {
                    /* translators: %s: Date. */
                    printf( __( 'Eventos por día: %s', 'temauno' ), get_the_date() );
                } elseif ( is_month() ) {
                    /* translators: %s: Date. */
                    printf( __( 'Eventos por mes: %s', 'temauno' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'temauno' ) ) );
                } elseif ( is_year() ) {
                    /* translators: %s: Date. */
                    printf( __( 'Eventos por año: %s', 'temauno' ), get_the_date( _x( 'Y', 'yearly archives date format', 'temauno' ) ) );
                } else {
                    _e( 'Eventos', 'temauno' );
                }
                ?>
            </h1>
        </header>
        <!-- Título del archivo -->
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
                                <div class="card text-center py-4">
                                    <?php if ( has_post_thumbnail() ) : ?>
                                        <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                                                <?php the_post_thumbnail('medium'); ?>
                                        </a>
                                    <?php endif; ?>
                                    <div class="card-body">
                                        <a href="<?php the_permalink(); ?>">
                                            <h5 class="card-title"><?php the_title(); ?></h5>
                                        </a> 
                                        <p><?php the_field('fecha'); ?> | <strong> <?php the_field('precio'); ?> € </strong></p>
                                    </div>
                                </div>           
                            </div>
                            <?php endwhile; ?>    
                        <?php endif; ?>
                        </div>
                    </div> 
                    <!-- Entrada -->
                    <!-- Paginación -->
                                <div class="card-body">
                                    <?php get_template_part( 'template-parts/content', 'pagination' ); ?>
                                </div>
                    <!-- Paginación -->
                </div>
        <!-- Entradas -->
        </div>

    </div>
    <!-- Blog -->
    <?php get_footer(); ?>