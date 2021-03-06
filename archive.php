<?php get_header(); ?>
        <!-- Título del archivo -->
        <header class="page-header">
            <h1 class="page-title text-center mt-3 py-4">
                <?php
                if ( is_day() ) {
                    /* translators: %s: Date. */
                    printf( __( 'Archivos del día: %s', 'temauno' ), get_the_date() );
                } elseif ( is_month() ) {
                    /* translators: %s: Date. */
                    printf( __( 'Archivos del mes: %s', 'temauno' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'temauno' ) ) );
                } elseif ( is_year() ) {
                    /* translators: %s: Date. */
                    printf( __( 'Archivos del año: %s', 'temauno' ), get_the_date( _x( 'Y', 'yearly archives date format', 'temauno' ) ) );
                } else {
                    _e( 'Archivos', 'temauno' );
                }
                ?>
            </h1>
        </header>
        <!-- Título del archivo -->
        <div class="row">
        <!-- Entradas -->
                <div class="col-lg-9 mb-3">
                    <div class="container">
                        <div class="row gy-5">
                    <!-- Entrada -->
                        <?php 
                            if ( have_posts() ) : 
                                while ( have_posts() ) : the_post();
                        ?> 
                            <div class="col-lg-4">
                                <div class="card">
                                    <?php if ( has_post_thumbnail() ) : ?>
                                        <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                                                <?php the_post_thumbnail('medium', array( 'class' => 'card-img-top img-fluid img-thumbnail rounded mx-auto d-block' )); ?>
                                        </a>
                                    <?php endif; ?>
                                    <div class="card-body">
                                    <a href="<?php the_permalink(); ?>">
                                        <h4><?php the_title(); ?></h4>
                                    </a>            
                                    </div>
                                </div>
                            </div>
                            <?php endwhile; ?>    
                        <?php endif; ?>
                    <!-- Entrada -->
                    <!-- Paginación -->
                                <div class="card-body">
                                    <?php get_template_part( 'template-parts/content', 'pagination' ); ?>
                                </div>
                    <!-- Paginación -->
                        </div>
                    </div>
                </div>
        <!-- Entradas -->
        <!-- Barra lateral -->
                <?php get_sidebar(); ?>
        <!-- Barra lateral -->
        </div>

    </div>
    <!-- Blog -->
    <?php get_footer(); ?>