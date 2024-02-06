<main class="site group">
   <?php
      if( have_posts( ) ) {
         get_template_part( 'parts/content/single', get_post_type( ) );
      } else {
         ?><section id="content" <?php post_class( 'site group' ) ?>><?php
         // 404
         if( get_option( 'ropecon_404_page' ) > 0 ) {
            if( function_exists( 'pll_get_post' ) ) {
               $post_id = pll_get_post( get_option( 'ropecon_404_page' ) );
            } else {
               $post_id = get_option( 'ropecon_404_page' );
            }

            echo apply_filters( 'the_content', get_the_content( null, false, $post_id ) );
         } else {
            ?>
               <div class="wp-block-cover alignfull is-style-full-height"><img class="wp-block-cover__image-background" src="<?php echo get_stylesheet_directory_uri( ); ?>/images/block-pattern-preview/title-cover.svg" data-object-fit="cover">
                  <div class="wp-block-cover__inner container" style="z-index: 1000;">
                     <h1 class="has-text-align-center has-white-color has-text-color"><?php _e( 'Content not found', 'ropecon' ); ?></h1>
                     <p class="has-text-align-center has-white-color has-text-color"><?php _e( 'The content you were looking for was not found.', 'ropecon' ); ?></p>
                  </div>
               </div>
            <?php
         }
         ?></section><?php
      }
   ?>
</main>
