<?php get_header(); ?>

   <?php
      $args = array(
         'posts_per_page'   => 1,
         'post_type'        => 'escritorios',
      );
      $escritorios = get_posts($args);
   ?>

   <div class="topo-destaque"></div>

   <section class="interna">
      <div class="container">
         <div class="row">
            <div class="col s12 ">
               <?php foreach ($escritorios as $escritorio) : ?>
                  <h1 class="titulo"><?= $escritorio->post_title ?></h1>
                  <div class="conteudo">
                     <p>
                        <?php
                           $medias = rwmb_meta('escritorio_foto', 'type=plupload_image', $escritorio->ID);
                           foreach ( $medias as $media ) {
                              echo "<img src='{$media['url']}' alt='{$media['alt']}' class='responsive-img' />";
                           }
                        ?>
                     </p>
                     <p><?= $escritorio->post_content ?></p>
                     <div class="owl-carousel owl-theme owl-interna">
                        <?php
                           $medias = rwmb_meta('escritorio_fotos', 'type=plupload_image', $escritorio->ID);
                           foreach ( $medias as $media ) { ?>
                              <div class="item">
                                 <?php echo "<a href='{$media['url']}'' data-lightbox='image'>"; ?>
                                   <figure><?php echo "<img src='{$media['url']}' alt='{$media['alt']}' class='responsive-img' />"; ?></figure>
                               </a>
                              </div>
                        <?php } ?>
                     </div>
                  </div><!--.conteudo-->
               <?php endforeach; ?>
            </div>
         </div>
      </div>
   </section>

<?php get_footer(); ?>