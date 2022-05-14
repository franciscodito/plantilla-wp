<?php get_header(); ?>
        <div class="row">
        <!-- Entradas -->
                <div class="col-lg-9">
                    <!-- Entrada -->
                    <h3 class="bg-primary text-white py-3 mb-5 text-center">Resultados de búsqueda</h3>
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