<div class="sidebar">
   <?php
      $args = array (
         'post_status'    => 'publish',
         'posts_per_page' => '5',
         'post__not_in'   => array($post->ID),
      );

      $posts = new WP_Query( $args );
   ?>

   <?php if ( $posts->have_posts() ) : ?>
      <?php while ( $posts->have_posts() ) : $posts->the_post(); ?>
         <a href="<?php the_permalink(); ?>">
            <?php the_title(); ?>
         </a>
      <?php endwhile; ?>
   <?php endif; wp_reset_postdata(); ?>

   <?php
      $args = array(
         'type'         => 'post',
         'child_of'     => 0,
         'parent'       => '',
         'orderby'      => 'name',
         'order'        => 'ASC',
         'hide_empty'   => 1,
         'hierarchical' => 1,
         'exclude'      => '',
         'include'      => '',
         'number'       => '',
         'taxonomy'     => 'category',
         'pad_counts'   => false 
      ); 

   ?>

   <?php $categories = get_categories( $args ); ?> 

   <?php foreach ($categories as $categorie) : ?>
      <a href="<?php echo get_category_link($categorie->term_id); ?>"><?php echo $categorie->name; ?> <span class="count"><?php echo $categorie->count; ?></span></a>
   <?php endforeach; ?>
</div><!-- .sidebar -->