<?php /* Template Name: Nikke Team builder */ ?>

<?php

get_header();

$categories = get_the_category();
$category_id = $categories[0]->name;

?>

<div class="double characters-wrapper builder animated">
	<div class="news">
		<div class="teams">
			<h3>Your team</h3>

			<div class="characters">
				<div class="post builder character covering container"><div class="margin"><div class="content"><h2>Drag character</h2></div></div></div>
				<div class="post builder character covering container"><div class="margin"><div class="content"><h2>Drag character</h2></div></div></div>
				<div class="post builder character covering container"><div class="margin"><div class="content"><h2>Drag character</h2></div></div></div>
				<div class="post builder character covering container"><div class="margin"><div class="content"><h2>Drag character</h2></div></div></div>
				<div class="post builder character covering container"><div class="margin"><div class="content"><h2>Drag character</h2></div></div></div>
			</div>
		</div>

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

								get_template_part('template-parts/character-builder');

						endwhile; wp_reset_postdata();
				endif; 
			?>
		</div>
	</div>

	<?php get_template_part('template-parts/sidebar-nikke-builder'); ?>
</div>

<?php

get_footer();

?>