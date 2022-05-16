<?php get_header(); ?>
        <div class="row">
        <!-- Entradas -->
                <div class="col-lg-9">
                    <!-- Entrada -->
                    <!-- Título del archivo -->
                    <header class="page-header">
                        <h1 class="page-title">
                            <?php
                            if ( is_day() ) {
                                /* translators: %s: Date. */
                                printf( __( 'Daily Archives: %s', 'temauno' ), get_the_date() );
                            } elseif ( is_month() ) {
                                /* translators: %s: Date. */
                                printf( __( 'Monthly Archives: %s', 'temauno' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'temauno' ) ) );
                            } elseif ( is_year() ) {
                                /* translators: %s: Date. */
                                printf( __( 'Yearly Archives: %s', 'temauno' ), get_the_date( _x( 'Y', 'yearly archives date format', 'temauno' ) ) );
                            } else {
                                _e( 'Archives', 'temauno' );
                            }
                            ?>
                        </h1>
			        </header>
                    <!-- Título del archivo -->
                    <div class="card-body">
                    <?php 
                        if ( have_posts() ) : 
                            while ( have_posts() ) : the_post();
                    ?> 
                    <div class="card-body">
                        <a href="<?php the_permalink(); ?>">
                            <h4><?php the_title(); ?></h4>
                        </a>
                    </div>
                    <?php endwhile; ?>

                    <?php else: ?>

                    <h5>No se encontró el término: 
                    <?php printf(esc_html('%s'), get_search_query()); ?>
                    </h5>
                    <?php get_search_form(); ?>        

                    <?php endif; ?>
                    </div>
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