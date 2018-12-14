<nav>
    <div class="nav-wrapper container">
        <a href="<?php echo site_url('/'); ?>" class="brand-logo"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo-fontes-e-pereira.png" alt="Fontes e Pereira"></a>
        <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
        <ul class="right hide-on-med-and-down">
            <li><a href="<?php echo site_url('o-escritorio'); ?>">O ESCRITÓRIO</a></li>
            <li><a href="<?php echo site_url('profissionais'); ?>">PROFISSIONAIS</a></li>
            <li><a href="<?php echo site_url('blog'); ?>">BLOG</a></li>
            <?php /*<li><a href="clientes.php">CLIENTES ATENDIDOS</a></li>*/ ?>
            <li><a href="<?php echo site_url('areas-de-atuacao'); ?>">ÁREAS DE ATUAÇÃO</a></li>
            <li><a href="#contato">CONTATO</a></li>
        </ul>
        <ul class="side-nav" id="mobile-demo">
            <li><a href="<?php echo site_url('o-escritorio'); ?>">O ESCRITÓRIO</a></li>
            <li><a href="<?php echo site_url('profissionais'); ?>">PROFISSIONAIS</a></li>
            <li><a href="<?php echo site_url('blog'); ?>">BLOG</a></li>
            <?php /*<li><a href="clientes.php">CLIENTES ATENDIDOS</a></li>*/ ?>
            <li><a href="<?php echo site_url('areas-de-atuacao'); ?>">ÁREAS DE ATUAÇÃO</a></li>
            <li><a href="#contato">CONTATO</a></li>
        </ul>
    </div>
</nav>