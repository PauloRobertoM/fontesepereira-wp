	<?php
		$args = array(
			'posts_per_page'   => 3,
			'post_type'        => 'vitrines',
		);

		$vitrines = get_posts($args);
	?>
	
	<div class="slider">
        <ul class="slides">
        	<?php foreach ($vitrines as $vitrine) : ?>
			     <li>
			        <a href="<?= $vitrine->vitrines_link ?>" target="_blank">
			        	<?php
				        	$medias = rwmb_meta('vitrines_foto', 'type=plupload_image', $vitrine->ID);
				        	foreach ( $medias as $media ) {
				        		echo "<img src='{$media['url']}' alt='{$media['alt']}' />";
				        	}
			        	?>
			        	<div class="caption right-align">
			        		<h3><?= $vitrine->post_title ?></h3>
			        		<h5 class="light grey-text text-lighten-3"><?= $vitrine->post_content ?></h5>
			        	</div><!-- .content -->
			        </a>
			    </li>
			<?php endforeach; ?>
        </ul>
  	</div>

	<!-- <a href="<?php the_permalink($vitrine->ID); ?>" target="_blank"> -->