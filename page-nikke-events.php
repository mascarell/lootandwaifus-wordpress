<?php /* Template Name: Nikke event list */ ?>

<?php

get_header();

$categories = get_the_category();
$category_id = $categories[0]->name;

?>

<!-- all the guides -->
<div class="double guides-wrapper animated">
	<div class="news">
		<?php
			$query = new WP_Query( array(
					'post_type'      => 'guides',
					'posts_per_page' => -1,
					'no_found_rows'  => true,
					'tag'            => '2022',
					'category_name'  => $category_id
			) );
			if ( $query->have_posts() ) :
					?> <h2 class="guides-title">2022 ➜</h2><div class="guides"> <?php
					while ( $query->have_posts() ) : $query->the_post();

							get_template_part('template-parts/guide');

					endwhile; wp_reset_postdata();
					?> </div> <?php
			endif; 
		?>

		<?php
			$query = new WP_Query( array(
					'post_type'      => 'guides',
					'posts_per_page' => -1,
					'no_found_rows'  => true,
					'tag'            => '2023',
					'category_name'  => $category_id
			) );
			if ( $query->have_posts() ) :
					?> <h2 class="guides-title">2023 ➜</h2><div class="guides"> <?php
					while ( $query->have_posts() ) : $query->the_post();

							get_template_part('template-parts/guide');

					endwhile; wp_reset_postdata();
					?> </div> <?php
			endif; 
		?>
	</div>

	<?php get_template_part('template-parts/sidebar'); ?>
</div>

<?php

get_footer();

?>