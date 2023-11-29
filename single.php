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

          <!-- Author -->
          <div class="author">
            <div class="info">
              <?php
                $author_id = get_the_author_meta('ID');
                $author_avatar = get_avatar($author_id, 96); // You can change the size (96 in this example) as needed
                echo $author_avatar;
              ?>
              <p>Sefhi</p>
              <span class="tag">writer</span>
            </div>
            <div class="stats">
              <p>Published on: <?php echo get_the_date(); ?></p>
              <p>Last updated on: <?php echo get_the_modified_date(); ?></p>
            </div>
          </div>
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
</div>

<?php

get_footer();

?>