<?php get_header(); ?>

   <?php
      $args = array(
         'posts_per_page'   => 10,
         'post_type'        => 'socios',
      );
      $socios = get_posts($args);

      $args = array(
         'posts_per_page'   => 10,
         'post_type'        => 'associados',
      );
      $associados = get_posts($args);
   ?>

   <div class="topo-destaque"></div>

   <section class="interna">
      <div class="container">
         <div class="row">
            <div class="col s12 ">
               <h1 class="titulo">PROFISSIONAIS</h1>
               <div class="conteudo">
                  <h2>SÓCIOS</h2>
                  <?php foreach ($socios as $socio) : ?>
                     <div class="row linha-adv">
                        <div class="col s12 m4 l4">
                           <?php
                              $medias = rwmb_meta('socio_foto', 'type=plupload_image', $socio->ID);
                              foreach ( $medias as $media ) {
                                 echo "<img src='{$media['url']}' alt='{$media['alt']}' class='responsive-img' />";
                              }
                           ?>
                        </div>
                        <div class="col s12 m8 l8">
                           <h4><?= $socio->post_title ?> <span><?= $socio->post_numeracao ?></span></h4>
                           <ul class="list-adv">
                              <?= $socio->post_content ?>
                           </ul>
                        </div>
                     </div><!--.row-->
                  <?php endforeach; ?>
                                             

                  <h2>ASSOCIADOS</h2>
                  <?php foreach ($associados as $associado) : ?>
                     <div class="row linha-adv">
                        <div class="col s12 m4 l4">
                           <?php
                              $medias = rwmb_meta('associado_foto', 'type=plupload_image', $associado->ID);
                              foreach ( $medias as $media ) {
                                 echo "<img src='{$media['url']}' alt='{$media['alt']}' class='responsive-img' />";
                              }
                           ?>
                        </div>
                        <div class="col s12 m8 l8">
                           <h4><?= $associado->post_title ?> <span><?= $associado->post_numeracao ?></span></h4>
                           <ul class="list-adv">
                              <?= $associado->post_content ?>
                           </ul>
                        </div>
                     </div><!--.row-->
                  <?php endforeach; ?>
                  <div class="right addthis_inline_share_toolbox"></div>
               </div><!--.conteudo-->
            </div>
         </div>
      </div>
   </section>

<?php get_footer(); ?>