<?php get_header(); ?>

   <?php
      $args = array (
         'post_status'            => 'publish',
         'pagination'             => true,
         'posts_per_page'         => '10',
      );
      $posts = new WP_Query( $args );
   ?>

   <div class="topo-destaque"></div>

   <section class="interna">
      <div class="container">
         <div class="row">
            <div class="col s12 ">
               <h1 class="titulo">BLOG</h1>
               <div class="conteudo">
                  <h2>SÓCIOS</h2>
                  <?php if ( $posts->have_posts() ) : ?>
                     <?php while ( $posts->have_posts() ) : $posts->the_post(); ?>
                        <?php $mes = ucfirst(get_the_date('F')); ?>
                        <?php $dia = get_the_date('d'); ?>
                        <?php $ano = get_the_date('Y'); ?>
                        <div class="row linha-adv">
                           <div class="col s12 m4 l4">
                              <?php if ( has_post_thumbnail() ) : ?>
                                 <a href="<?php the_permalink(); ?>">
                                    <?php the_post_thumbnail('responsive-img responsive-img'); ?> 
                                 </a><!-- end thumb -->
                              <?php endif; ?>
                           </div>
                           <div class="col s12 m8 l8">
                              <a href="<?php the_permalink(); ?>">
                                 <h4><?php the_title(); ?> <span><?php echo "{$dia} {$mes} {$ano}"; ?></span></h4>
                                 <p><?php echo excerpt(145, get_the_excerpt()); ?></p>
                              </a>
                              <a href="<?php the_permalink(); ?>">VEJA MAIS</a>
                           </div>
                        </div><!--.row-->
                     <?php endwhile; ?>
                  <?php endif; ?>
               </div><!--.conteudo-->
            </div>
         </div>
      </div>
   </section>

<?php get_footer(); ?>