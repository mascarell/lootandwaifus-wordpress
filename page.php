<?php

get_header();

?>

<div class="double">
	<div class="news">
		<div class="article container animated">
			<?php
			// TO SHOW THE PAGE CONTENTS
			while ( have_posts() ) : the_post(); ?> <!--Because the_content() works only inside a WP Loop -->
				<p class="date"><?php echo the_date(); ?> </p>

				<h1><?php the_title(); ?></h1>

				<div class="article-content">
					<?php the_content(); ?> <!-- Page Content -->
				</div>

			<?php
				endwhile; //resetting the page loop
				wp_reset_query(); //resetting the page query
			?>

			<?php if ( comments_open() ) { 
				?> <div class="article-comments"> <?php comments_template(); ?> </div> <?php
			} ?>
		</div>
	</div>
</div>

<?php

get_footer();

?>