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


<div class="top-menu animated">
	<div class="top-menu-contaier">
		<a class="loot-logo" href="<?php echo home_url(); ?>">
			<img class="game-logo" src="<?php echo get_theme_file_uri('images/lootlogo.png'); ?>" loading="lazy" alt="loot & waifus logo">
		</a>
	
		<div class="game-menu">
			<?php 
				if($category_id == 'nikke') { 
					$args = array( 'theme_location' => 'nikke' );
					wp_nav_menu( $args );
				} else if($category_id == 'higan') { 
					$args = array( 'theme_location' => 'haze' );
					wp_nav_menu( $args );
				} else {  
					$args = array( 'theme_location' => 'main' );
					wp_nav_menu( $args );
				} 
			?>
		</div>

		<div class="b-menu">
			<div class="b-bun b-bun--top"></div>
			<div class="b-bun b-bun--mid"></div>
			<div class="b-bun b-bun--bottom"></div>
		</div>
	</div>
</div>

<div class="overlay-menu">
	<?php 
		if($category_id == 'nikke') { 
			$args = array( 'theme_location' => 'nikke' );
			wp_nav_menu( $args );
		} else if($category_id == 'higan') { 
			$args = array( 'theme_location' => 'haze' );
			wp_nav_menu( $args );
		} else { 
			$args = array( 'theme_location' => 'main' );
			wp_nav_menu( $args );
		} 
	?>
</div>