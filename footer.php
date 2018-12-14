		<section id="contato">
			<div class="container">
				<div class="row">
					<div class="col s12">
						<h2 class="center">CONTATO</h2>
					</div>
				</div>
				<div class="row">
					<form class="col s12" id="_form_contato">
					    <div id="_contato_callbacks"></div>

						<div class="row">
							<div class="input-field col s6">
								<input name="nome" id="contato_nome" type="text" class="validate">
								<label for="contato_nome">Seu Nome</label>
							</div>
							<div class="input-field col s6">
								<input name="email" id="contato_email" type="email" class="validate">
								<label for="contato_email">Seu E-mail</label>
							</div>
						</div>

						<div class="row">
							<div class="input-field col s12">
								<input name="assunto" id="contato_assunto" type="text" class="validate">
								<label for="contato_assunto">Seu assunto</label>
							</div>
						</div>
						<div class="row">
							<div class="input-field col s12">
								<textarea name="mensagem" id="contato_mensagem" class="materialize-textarea"></textarea>
								<label for="contato_mensagem">Mensagem</label>
							</div>
						</div>
						<div class="row">
							<div class="input-field col s12">
								<button class="btn waves-effect waves-light blue darken-4 right" type="submit" name="action">ENVIAR</button>
							</div>
						</div>
					</form>
				</div><!--.row-->
			</div>
		</section>

		<footer>
			<div class="container">
				<div class="row">
					<div class="col s12 m6">
						<p>© Copyright Fontes e Pereira. Todos os direitos reservados.</p>
					</div>
					<div class="col s12 m6">
						<p class="right"><i class="fas fa-phone-square"></i> (84) 3656.6565 |  <i class="fas fa-envelope-square"></i> atendimento@fontesepereira.com.br</p>
					</div>
				</div>
			</div>
		</footer>

		<script defer src="https://use.fontawesome.com/releases/v5.0.10/js/all.js" integrity="sha384-slN8GvtUJGnv6ca26v8EzVaR9DC58QEwsIk9q1QXdCU8Yu8ck/tL/5szYlBbqmS+" crossorigin="anonymous"></script>
		<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/assets/js/jquery.min.js"></script>
		<script src="<?php echo get_template_directory_uri(); ?>/assets/js/jquery-migrate-1.2.1.min.js"></script>
		<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/assets/js/materialize.min.js"></script>
		<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/assets/js/owl.carousel.min.js"></script>
		<script type="text/javascript">
       		var ajaxurl = "<?php echo admin_url('admin-ajax.php'); ?>";
	   	</script>
	   	<script type='text/javascript' src='<?php echo get_template_directory_uri(); ?>/assets/js/lightbox.min.js'></script>
	   	<script async custom-element="amp-form" src="https://cdn.ampproject.org/v0/amp-form-0.1.js"></script>
		<script src="<?php echo get_template_directory_uri(); ?>/assets/js/script.js"></script>
		<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-58f7c0564ca95573"></script> 
	</body>
</html>