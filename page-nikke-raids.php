<?php /* Template Name: Nikke raids list */ ?>

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
					'posts_per_page' => 9,
					'no_found_rows'  => true,
					'tag'            => 'solo-raid',
					'category_name'  => $category_id
			) );
			if ( $query->have_posts() ) :
					?> <h2 class="guides-title">Solo Raid ➜</h2><div class="guides"> <?php
					while ( $query->have_posts() ) : $query->the_post();

							get_template_part('template-parts/guide');

					endwhile; wp_reset_postdata();
					?> </div> <?php
			endif; 
		?>
		
		<?php
			$query = new WP_Query( array(
					'post_type'      => 'guides',
					'posts_per_page' => 9,
					'no_found_rows'  => true,
					'tag'            => 'union-raid',
					'category_name'  => $category_id
			) );
			if ( $query->have_posts() ) :
					?> <h2 class="guides-title">Union Raid ➜</h2><div class="guides"> <?php
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