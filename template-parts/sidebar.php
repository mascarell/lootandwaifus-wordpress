<div class="sidebar animated">
	<?php if ( is_singular( 'guides' ) ) { ?>
		<div class="container author">
			<h4>About the Author:</h4>
			<p><?php the_author_meta('description'); ?></p>
			<a href="<?php the_author_meta('user_url'); ?>" target="_blank" rel="noopener noreferrer">
			<svg fill="none" stroke="white" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
				<path stroke-linecap="round" stroke-linejoin="round" d="M12 21a9.004 9.004 0 008.716-6.747M12 21a9.004 9.004 0 01-8.716-6.747M12 21c2.485 0 4.5-4.03 4.5-9S14.485 3 12 3m0 18c-2.485 0-4.5-4.03-4.5-9S9.515 3 12 3m0 0a8.997 8.997 0 017.843 4.582M12 3a8.997 8.997 0 00-7.843 4.582m15.686 0A11.953 11.953 0 0112 10.5c-2.998 0-5.74-1.1-7.843-2.918m15.686 0A8.959 8.959 0 0121 12c0 .778-.099 1.533-.284 2.253m0 0A17.919 17.919 0 0112 16.5c-3.162 0-6.133-.815-8.716-2.247m0 0A9.015 9.015 0 013 12c0-1.605.42-3.113 1.157-4.418"></path>
			</svg>
				<p>Follow <?php echo get_the_author(); ?></p>
			</a>
		</div>
	<?php } ?>

	<div class="container">
		<p>If you want to stay up to date with all the content we publish the best way is to check us on Twitter.</p>

		<?php get_template_part('template-parts/buttons/twitter'); ?>
		<p></p>
		<?php get_template_part('template-parts/buttons/discord'); ?>
	</div>

	<div class="container">
		<h3>Sponsor</h3>

		<p>If you want to sponsor the website or our social media platforms, you can send an email to <a class="email" href="mailto:contact@lootandwaifus.com">contact@lootandwaifus.com</a>.</p>
	</div>
</div>