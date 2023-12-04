<?php

get_header();

?>

<!-- Latest video section with WP customizer -->
<!-- <div class="latest-video animated">
	<div>
		<?php
			$custom_link = get_theme_mod( 'custom_link' );
			$custom_title = get_theme_mod( 'custom_title' );

			if ( $custom_title ) { echo '<h2>' . esc_html( $custom_title ) . '</h2>'; }
			if ( $custom_link ) { echo '<a target="_blank" href="' . esc_url( $custom_link ) . '">watch now</a>'; }
		?>
	</div>

	<div>
		<?php
			$custom_image = get_theme_mod( 'custom_image' );

			if ( $custom_image ) { echo '<img src="' . esc_url( $custom_image ) . '">'; }
		?>
	</div>
</div> -->

<!-- Hero section -->
<div class="hero animated">
  <h1>Your one-stop shop for in depth gacha games tier lists and guides</h1>
  <p>Loot & Waifus is a community driven wiki for the games we love and care about. Click down below on your favorite game to get started.</p>
</div>

<!-- Games that we cover -->
<div class="games container animated">
	<a href="<?php echo home_url(); ?>/nikke" class="game nikke covering">
		<div>
			<p>Goddess of Victory: Nikke</p>
		</div>
	</a>
  <a href="<?php echo home_url(); ?>/reverse-1999" class="game reverse covering">
		<div>
			<p>Reverse: 1999</p>
		</div>
	</a>
	<!-- <a class="game overlord covering">
		<div>
			<p>Overlord: King of Nazarick (soon)</p>
		</div>
	</a> -->
	<a href="<?php echo home_url(); ?>/brown-dust-2" class="game browndust covering">
		<div>
			<p>Brown Dust 2</p>
		</div>
	</a>
	<a class="game">
		<div>
		</div>
	</a>
	<a class="game">
		<div>
		</div>
	</a>
	<a class="game">
		<div>
		</div>
	</a>
	<a class="game">
		<div>
		</div>
	</a>
	<a class="game">
		<div>
		</div>
	</a>
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