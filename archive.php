<?php

get_header();

?>

<div class="double">
	<div class="news">
		<div class="posts animated">
			<?php while ( have_posts() ) : the_post();
				get_template_part('template-parts/content-news');
			endwhile; // end of the loop. ?>
		</div>

		<?php get_template_part('template-parts/pagination'); ?>
	</div>

	<?php get_template_part('template-parts/sidebar'); ?>
</div>

<?php

get_footer();

?>