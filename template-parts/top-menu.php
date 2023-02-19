<?php 
	if(is_front_page()) {
		$category_id = '';
	} else {
		$categories = get_the_category();
		if ( ! empty( $categories ) ) {
			$category_id = $categories[0]->slug;
		} else {
			$category_id = '';
		}
	}
?>

<?php if($category_id == 'nikke') { ?>
	<a href="<?php echo home_url(); ?>/nikke">
		<img class="game-logo animated" src="<?php echo get_theme_file_uri('images/nikke.png'); ?>" loading="lazy" alt="nikke logo">
	</a>
	<div class="game-menu animated">
		<?php get_template_part('template-parts/buttons/game-nikke'); ?>
	</div>
<?php } else if($category_id == 'limbus-company') { ?>
		<a href="<?php echo home_url(); ?>/limbus-company">
			<img class="game-logo animated" src="<?php echo get_theme_file_uri('images/limbus.webp'); ?>" loading="lazy" alt="limbus company logo">
		</a>
		<div class="game-menu animated">
			<?php get_template_part('template-parts/buttons/game-limbus'); ?>
		</div>
<?php } else { ?>
	<div class="game-menu animated">
		<?php get_template_part('template-parts/buttons/game-normal'); ?>
	</div>
<?php } ?>