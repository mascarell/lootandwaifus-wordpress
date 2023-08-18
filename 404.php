<?php

get_header();

?>

<div class="double characters-wrapper animated">
	<div class="news container">
	<div class="error">
		<h4>404</h4>
		<h2>Are you lost?</h2>
		<p>The page you are looking for is nowhere to be found, but you can always go back.</p>

		<img src="<?php echo get_theme_file_uri('images/cat.gif'); ?>" loading="lazy" alt="gato error">
	</div>
</div>

	<?php get_template_part('template-parts/sidebar'); ?>
</div>
	
<?php

get_footer();

?>