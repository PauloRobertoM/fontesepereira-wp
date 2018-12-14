<?php get_header(); ?>

  <?php
      $args = array(
         'posts_per_page'   => 1,
         'post_type'        => 'areas',
      );
      $areas = get_posts($args);
   ?>

   <div class="topo-destaque"></div>

   <section class="interna">
      <div class="container">
         <div class="row">
            <div class="col s12 ">
               <h1 class="titulo">BLOG</h1>
               <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                  <div class="conteudo">
                     <div class="row">
                        <?php if (has_post_thumbnail()) : ?>
                           <?php the_post_thumbnail('responsive-img responsive-img'); ?>
                        <?php endif; ?>
                        <h2><?php the_title(); ?></h2>
                        <div class="col s12">
                           <p><?php the_content(); ?></p>
                        </div>
                     </div><!--.row-->

                     <div class="right addthis_inline_share_toolbox"></div>
                  </div><!--.conteudo-->
               <?php endwhile; else : ?>
                  <p><?php _e( 'Nenhum post cadastrado até o momento' ); ?></p>
               <?php endif; ?>
            </div>
         </div>
      </div>
   </section>

<?php get_footer(); ?>