<?php /* Template Name: Puzzles page */ ?>

<?php

get_header();

?>

<!-- all the guides -->
<div class="double guides-wrapper animated">
	<div class="news">
    <div class="article container animated">
      <div class="article-content">
        <?php the_content(); ?>
      </div>
		</div>

		<?php
			$query = new WP_Query( array(
					'post_type'      => 'guides',
					'posts_per_page' => -1,
					'no_found_rows'  => true,
					'tag'            => 'lost-sectors',
					'category_name'  => $category_id
			) );
			if ( $query->have_posts() ) :
					?> <h2 class="guides-title">Lost Sectors ➜</h2><div class="guides"> <?php
					while ( $query->have_posts() ) : $query->the_post();

							get_template_part('template-parts/guide');

					endwhile; wp_reset_postdata();
					?> </div> <?php
			endif; 
		?>
	</div>
</div>

<?php

get_footer();

?>