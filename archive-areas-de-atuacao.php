<?php get_header(); ?>

    <?php
      $args = array(
         'posts_per_page'   => 1,
         'post_type'        => 'areas',
      );
      $areas = get_posts($args);
   ?>

   <section id="vitrine-interna">
      <img src="<?php echo get_template_directory_uri(); ?>/assets/images/como-usar.png" alt="Como Usar - Ecofix" />
      <div class="content">
         <div class="container">
            <h1>Produtos</h1>
            <p>Home / <span>Produtos</span></p>
         </div><!-- container -->
      </div><!-- .content -->
   </section><!-- #vitrine -->

   <section class="como-usar-interno interna">
      <div class="container">
         <div class="row">
            <?php if ( have_posts() ) : ?>
               <?php query_posts( array_merge($wp_query->query_vars, array('posts_per_page' => 100, )) ); ?>
               <?php while ( have_posts() ) : the_post(); ?>
                  <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                     <h4 class="text-center"><?php the_title(); ?></h4>
                     <p class="p-geral"><?php the_content(); ?></p>
                     
                     <?php $preco = rwmb_meta('produtos_preco', array('type' => 'text_datalist')); ?>
                     <h4 class="text-center">R$ <?= $area->area_icone ?></h4>
                  </div><!-- .md-3 -->
               <?php endwhile; ?>
            <?php endif; ?>
         </div>
      </div>
   </section><!-- .como-usar-interno -->

   <?php get_template_part('content', 'gostou'); ?>

<?php get_footer(); ?>