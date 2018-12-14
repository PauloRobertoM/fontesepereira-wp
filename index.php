<?php get_header(); ?>

    <?php
        $page = 'home';
    ?>

    <?php include 'components/vitrine.php'; ?>

 	<section id="o-escritorio" class="box-fontes">
        <div class="container">
            <?php
                $args = array(
                   'posts_per_page'   => 1,
                   'post_type'        => 'escritorios',
                );
                $escritorios = get_posts($args);
            ?>
               
            <div class="row white fontes-box">
                <?php foreach ($escritorios as $escritorio) : ?>
                    <div class="col s12 m6">
                        <div class="texto">
                            <h1><?= $escritorio->post_title ?></h1>
                            <p><?php $teste = $escritorio->post_content; echo mb_strimwidth($teste, 0, 350, '...') ?></p>
                            <p><a class="waves-effect waves-light btn indigo darken-4 modal-trigger" href="<?php echo site_url('o-escritorio'); ?>">Saiba mais</a></p>
                        </div>
                    </div>
                    <div class="col s12 m6 img-foto">
                        <div class="texto"></div>
                        <div class="owl-carousel owl-theme owl-capa">
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
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section id="areas-de-atuacao" class="grey lighten-4">
        <div class="container">
            <div class="row">
                <div class="col s12">
                    <h1 class="titulo"> ÁREAS DE ATUAÇÃO</h1>
                </div>
            </div>
            <div class="row">
                <a href="<?php echo site_url('areas-de-atuacao'); ?>">
                    <?php
                        $args = array(
                           'posts_per_page'   => 6,
                           'post_type'        => 'areas',
                        );
                        $areas = get_posts($args);
                    ?>
                    <?php foreach ($areas as $area) : ?>
                        <div class="col s12 m2">
                            <div class="card-trab">
                                <p><i class="fas <?= $area->area_icone ?> fa-5x"></i></p>
                                <h5><?= $area->post_title ?></h5>
                            </div>
                        </div><!--col s12 m2-->
                    <?php endforeach; ?>
                </a>
            </div>
        </div>  
    </section>

<?php get_footer(); ?>