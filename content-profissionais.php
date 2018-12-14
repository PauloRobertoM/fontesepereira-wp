   <?php
      $args = array(
         'posts_per_page'   => 20,
         'post_type'        => 'produtos',
      );

      $produtos = get_posts($args);
   ?>

   <div class="menu-categorias">
      <ul>
         <li><a href="<?php echo site_url('portfolio'); ?>">Todas</a></li>
         <?php foreach ($produtos as $produto) : ?>
            <?php $ingredientes = get_post_meta($produto->ID, 'produtos_categoria', true); ?>
            <?php if ($ingredientes) : ?>
               <?php foreach ($ingredientes as $ingrediente) : ?>
                  <li><a href=""><?= $ingrediente ?></a></li>
               <?php endforeach; ?>
            <?php endif; ?>
         <?php endforeach; ?>
      </ul>
   </div><!-- .menu-categorias -->

   <div class="grid">
      <?php foreach ($produtos as $produto) : ?>
         <div class="item grid-item">
            <a href="<?php the_permalink($produto->ID); ?>" class="hover-port">
               <div class="content">
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/images/play.png" alt="">
                  <h4><?= $produto->post_title ?></h4>
               </div><!-- .content -->
               <?php
                  $medias = rwmb_meta('produtos_fotos', 'type=plupload_image', $produto->ID);
                  foreach ( $medias as $media ) {
                     echo "<img src='{$media['url']}' alt='{$media['alt']}' />";
                  }
               ?>
            </a>
         </div><!-- .item grid-item -->
      <?php endforeach; ?>
   </div><!-- .grid -->
   