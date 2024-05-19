<?php /* Template Name: 3-unit Random Team Generator */ ?>

<?php

get_header();

$categories = get_the_category();
$category_id = $categories[0]->name;

?>

<div class="double characters-wrapper builder animated">
	<div class="news">
    <div class="teams three">
			<h3>Wuthering Waves Team Randomizer</h3>
      <a id="generate-teams-wuwa" class="play randomizer" target="_blank" rel="noopener noreferrer">
        <span>Randomize teams</span>
      </a>

      <div class="separator"></div>

			<div class="characters random-characters">
				<div class="post builder team1 character nomargin zoomIn container"><div class="margin"><div class="content"><h2>--</h2></div></div></div>
				<div class="post builder team1 character nomargin zoomIn container"><div class="margin"><div class="content"><h2>--</h2></div></div></div>
				<div class="post builder team1 character nomargin zoomIn container"><div class="margin"><div class="content"><h2>--</h2></div></div></div>
				<div class="post builder team2 character nomargin zoomIn container"><div class="margin"><div class="content"><h2>--</h2></div></div></div>
				<div class="post builder team2 character nomargin zoomIn container"><div class="margin"><div class="content"><h2>--</h2></div></div></div>
				<div class="post builder team2 character nomargin zoomIn container"><div class="margin"><div class="content"><h2>--</h2></div></div></div>
				<div class="post builder team3 character nomargin zoomIn container"><div class="margin"><div class="content"><h2>--</h2></div></div></div>
				<div class="post builder team3 character nomargin zoomIn container"><div class="margin"><div class="content"><h2>--</h2></div></div></div>
				<div class="post builder team3 character nomargin zoomIn container"><div class="margin"><div class="content"><h2>--</h2></div></div></div>
			</div>
		</div>

		<div class="characters filtered wuthering-waves" style="display:none;">
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
              get_template_part('template-parts/character-nomargin');
						endwhile; wp_reset_postdata();
				endif; 
			?>
		</div>
	</div>
</div>

<?php

get_footer();

?>