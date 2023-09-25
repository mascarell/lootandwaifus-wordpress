<?php

get_header();

?>

<!-- Latest video section with WP customizer -->
<div class="latest-video animated">
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
</div>

<div class="double">
	<div class="news">
		<div class="posts animated">
			<?php
					$args = array(
							'posts_per_page' => 8,
							'post_type'      => 'post',
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

	<?php get_template_part('template-parts/sidebar'); ?>
</div>

<?php

get_footer();

?>