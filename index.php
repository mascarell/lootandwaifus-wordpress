<?php

get_header();

?>

<!-- Hero section -->
<div class="hero animated">
  <h1>Your one-stop shop for in depth game guides, tier lists and more</h1>
  <p>Loot & Waifus is a community driven wiki for the games we love and care about, both RPG and gacha. Click down below on your favorite game to get started.</p>
</div>

<!-- Games that we cover -->
<div class="games container animated">
	<a href="<?php echo home_url(); ?>/nikke" class="game nikke covering">
		<div>
			<p>Goddess of Victory: Nikke</p>
		</div>
	</a>
	<a href="<?php echo home_url(); ?>/brown-dust-2" class="game browndust covering">
		<div>
			<p>Brown Dust 2</p>
		</div>
	</a>
	<a href="<?php echo home_url(); ?>/girls-frontline-2" class="game gfl2 covering">
		<div>
			<p>Girl's Frontline 2: Exilium</p>
		</div>
	</a>
	<!-- <a class="game">
		<div>
		</div>
	</a> -->
</div>

<div class="double">
	<div class="news">
		<div class="posts animated">
			<?php
					$args = array(
							'posts_per_page' => 8,
							'post_type'      => array('post', 'guides', 'characters'),
							'paged'          => get_query_var( 'paged' ),
					);
					$wp_query = new WP_Query( $args );
	
					if( have_posts() ):
							while ( $wp_query->have_posts() ) : $wp_query->the_post();
	
							get_template_part('template-parts/content-news');
							
							endwhile;            
					endif;
							
			wp_reset_query(); ?>
		</div>

		<?php get_template_part('template-parts/pagination'); ?>
	</div>
</div>

<?php

get_footer();

?>