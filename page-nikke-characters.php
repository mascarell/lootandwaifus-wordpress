<?php /* Template Name: Nikke Characters */ ?>

<?php

get_header();

$categories = get_the_category();
$category_id = $categories[0]->name;

?>

<div class="double characters-wrapper animated">
	<div class="news">
		<div class="character-filters">
			<input type="search" id="search" name="search" placeholder="Filter characters" autocomplete="off">
		</div>
		<div class="characters filtered">
			<?php
				$query = new WP_Query( array(
						'post_type'      => 'characters',
						'orderby'        => 'title',
						'order'          => 'ASC',
						'posts_per_page' => -1,
						'no_found_rows'  => true,
						'category_name'  => $category_id
				) );
				if ( $query->have_posts() ) :

						while ( $query->have_posts() ) : $query->the_post();

								get_template_part('template-parts/character');

						endwhile; wp_reset_postdata();
				endif; 
			?>
		</div>
	</div>

	<?php get_template_part('template-parts/sidebar'); ?>
</div>

<?php

get_footer();

?>