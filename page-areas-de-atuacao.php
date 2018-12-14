<?php get_header(); ?>

   <?php
      $args = array(
         'posts_per_page'   => 10,
         'post_type'        => 'areas',
      );
      $areas = get_posts($args);
   ?>

   <div class="topo-destaque"></div>

   <section class="interna">
      <div class="container">
         <div class="row">
            <div class="col s12 ">
               <h1 class="titulo">ÁREAS DE ATUAÇÃO</h1>
               <div class="conteudo">
                  <?php foreach ($areas as $area) : ?>
                     <div class="row">
                        <h2><?= $area->post_title ?></h2>
                        <div class="col s12">
                           <p><?= $area->post_content ?></p>
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