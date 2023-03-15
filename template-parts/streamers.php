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
	<div class="container latest">
		<div class="info">
			<div class="streamers">
				<h4>Nikke streamers</h4>
				<div class="streamer">
					<a href="https://www.twitch.tv/jay_sparkz" target="_blank" rel="noopener noreferrer">
						<img src="<?php echo get_theme_file_uri('images/streamers/jay.png'); ?>" loading="lazy" alt="nikke logo">
					</a>
					<?php echo do_shortcode('[streamweasels channels="jay_sparkz" limit="15" layout="status"]'); ?>
				</div>
			</div>
		</div>
	</div>
<?php } else if($category_id == 'limbus-company') { ?>
<?php } else { ?>
<?php } ?>