<?php

get_header();

?>

<!-- Games that we cover -->
<div class="games container animated">
	<a href="<?php echo home_url(); ?>/nikke" class="game nikke covering">
		<div>
			<p>Goddess of Victory: Nikke</p>
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

<div class="container">
	<div id="chart_div"></div>
</div>

<?php

get_footer();

?>