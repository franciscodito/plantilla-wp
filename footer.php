    <footer class="py-4 bg-dark text-light">
      <div class="container">    
          <div class="row">    
            <div class="col-lg-6">
              <?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
                  <?php dynamic_sidebar( 'footer-1' ); ?>
              <?php else : ?>
                  <!-- Time to add some widgets! -->
              <?php endif; ?> 
            </div>
            <div class="col-lg-3">
              <?php if ( is_active_sidebar( 'footer-2' ) ) : ?>
                  <?php dynamic_sidebar( 'footer-2' ); ?>
              <?php else : ?>
                  <!-- Time to add some widgets! -->
              <?php endif; ?> 
            </div>
            <div class="col-lg-3">
              <?php if ( is_active_sidebar( 'footer-3' ) ) : ?>
                  <?php dynamic_sidebar( 'footer-3' ); ?>
              <?php else : ?>
                  <!-- Time to add some widgets! -->
              <?php endif; ?> 
            </div>
          </div>
      </div>
    </footer>
    <?php wp_footer(); ?>
  </body>
</html>