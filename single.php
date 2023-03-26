<?php

get_header();

?>

<div class="double">
	<div class="news">
		<div class="article container animated">
			<?php
			// TO SHOW THE PAGE CONTENTS
			while ( have_posts() ) : the_post(); ?> <!--Because the_content() works only inside a WP Loop -->
				
				<!-- Depending on post type, thumbnail or small picture -->
				<?php if ( is_singular( 'guides' ) ) { ?>
					<img class="lozad small-thumbnail" data-src="<?php echo the_post_thumbnail_url(); ?>">
					<h1><?php the_title(); ?></h1>
				<?php } else if ( is_singular( 'characters' ) ) { ?>
					<h1><?php the_title(); ?></h1>
				<?php } else { ?>
					<p class="date"><?php echo the_date(); ?></p>
					<h1><?php the_title(); ?></h1>
					<img class="lozad thumbnail" data-src="<?php echo the_post_thumbnail_url(); ?>">
				<?php } ?>

				<div class="article-content">
					<?php the_content(); ?> <!-- Page Content -->
				</div>
					
				<?php if ( comments_open() ) { 
					?> <div class="article-comments"> <?php comments_template(); ?> </div> <?php
				} ?>

			<?php
				endwhile; //resetting the page loop
				wp_reset_query(); //resetting the page query
			?>
		</div>
	</div>

	<?php get_template_part('template-parts/sidebar'); ?>
</div>

<?php

get_footer();

?>