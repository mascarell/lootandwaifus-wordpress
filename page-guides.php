<?php /* Template Name: Guides */ ?>

<?php

get_header();

$categories = get_the_category();
$category_id = $categories[0]->name;

?>

<!-- Game titles for better SEO -->
<?php 
if($category_id == 'Nikke') { 
	?>
		<div class="game-info animated">
			<div class="logo">
				<img src="<?php echo get_theme_file_uri('images/nikke-logo.png'); ?>" loading="lazy" alt="nikke logo">
			</div>

			<div class="game-info-text">
				<h1>NIKKE: Goddess of Victory wiki</h1>
				<p>Welcome to the ultimate NIKKE wiki with everything you need: tier list, character guides, boss guides and tips and tricks for the game. We also cover the latest news and made custom tools for you like the interactive map and team builder.</p>
			</div>
		</div>
	<?php
} else if($category_id == 'Reverse: 1999') {
	?>
    <a href="https://www.ldplayer.net/games/reverse-1999-on-pc.html?gameId=1365&n=39386997#utm_source=aff&utm_medium=aff&utm_campaign=aff39386997" class="play big animated" target="_blank" rel="noopener noreferrer">
      <img src="<?php echo get_theme_file_uri('images/ldplayer.webp'); ?>" alt="ldplayer logo">
      <span>Play Reverse: 1999 on PC with LDPlayer</span>
    </a>
  
		<div class="game-info animated">
			<div class="logo">
				<img src="<?php echo get_theme_file_uri('images/reverse-logo.png'); ?>" loading="lazy" alt="reverse 1999 logo">
			</div>

			<div class="game-info-text">
				<h1>Reverse: 1999 wiki</h1>
				<p>Welcome to the ultimate Reverse: 1999 wiki with everything you need: tier list, character guides, boss guides and tips and tricks for the game. We also cover the latest news and make custom tools to help you out in your gacha journey.</p>
			</div>
		</div>
	<?php
} else if($category_id == 'Brown Dust 2') {
	?>  
		<div class="game-info animated">
			<div class="logo">
				<img src="<?php echo get_theme_file_uri('images/brown-dust-2-logo.png'); ?>" loading="lazy" alt="brown dust 2 logo">
			</div>

			<div class="game-info-text">
				<h1>Brown Dust 2 wiki</h1>
				<p>Welcome to the ultimate Brown Dust 2 wiki with everything you need: tier list, character guides, boss guides and tips and tricks for the game. We also cover the latest news and make custom tools to help you out in your gacha journey.</p>
			</div>
		</div>
	<?php
} else if($category_id == 'Noneidk') { ?>
<?php } else { 
} 
?>

<?php if($category_id == 'Nikke') {  ?>
	<!-- Current special interception and latest news -->
	<div class="events animated">
		<div class="boss container">
			<?php
				// Set the timezone to Spain, bosses reset at 9pm for me
				date_default_timezone_set('Europe/Madrid');
				// Array of 5 texts
				$texts = array(
						'Chatterbox',
						'Modernia',
						'Alteisen MK.VI',
						'Grave Digger',
						'Blacksmith'
				);
		
				// Get the current time
				$currentHour = date('H');
		
				// Determine which text to display based on time and day of year
				if ($currentHour >= 21) {
						// If it's past 9pm, show the text for the next day
						$dayOfYear = date('z') + 2; // Add 2 to skip the current day and go to the next day
				} else {
						// Otherwise, show the text for the current day
						$dayOfYear = date('z') + 1; // Add 1 to get the current day
				}
				$textIndex = ($dayOfYear - 1) % 5; // Use modulus operator to cycle through texts

				switch ($textIndex) { // Show boss of the day
					case 0:
						?> <h3>Today's SI: Chatterbox</h3><span class="chatterbox"></span> <?php
						break;
					case 1:
						?> <h3>Today's SI: Modernia</h3><span class="modernia"></span> <?php
						break;
					case 2:
						?> <h3>Today's SI: Alteisen MK.VI</h3><span class="train"></span> <?php
						break;
					case 3:
						?> <h3>Today's SI: Grave Digger</h3><span class="gravedigger"></span> <?php
						break;
					case 4:
						?> <h3>Today's SI: Blacksmith</h3><span class="blacksmith"></span> <?php
						break;
				}
			?>
		</div>

		<!-- Gantt chart with current events -->
		<div class="container animated chart-parent">
			<div class="show-more">show all events</div>
			<div class="chart-events">
				<!-- Date header will be dynamically created using JavaScript -->
				<div class="chart-dates"></div>
			
				<div class="chart-container">
					<!-- Additional chart bars can be added here -->
					<?php
						$eventQuery = new WP_Query( array(
								'meta_key'       => 'end_date',
								'meta_value'     => date('Y-m-d', strtotime('-14 days')),
								'meta_compare'   => '>=',
								'post_type'      => 'events',
								'posts_per_page' => -1,
								'category_name'  => $category_id
						) );
						if ( $eventQuery->have_posts() ) :
								while ( $eventQuery->have_posts() ) : $eventQuery->the_post();
									get_template_part('template-parts/active-events');
								endwhile; wp_reset_postdata();
						endif; 
					?>
				</div>
			</div>
		</div>
	</div>
	<?php } else if ($category_id == 'Brown Dust 2') { ?>
    <!-- Current special interception and latest news -->
	<div class="events animated">
		<div class="boss container">
			<?php
      // Set the timezone to Spain, bosses reset at 9pm for me
      date_default_timezone_set('Europe/Madrid');

      // Get the current time
      $currentHour = date('H');

      // Determine which text to display based on time and day of the week
      if ($currentHour <= 1) {
        // If it's past 9 pm, show the text for the next day
        $dayOfWeek = (date('w') + 1) % 7; // Add 1 to skip the current day and go to the next day
      } else {
        // Otherwise, show the text for the current day
        $dayOfWeek = date('w');
      }

      // Determine the text index based on the day of the week
      switch ($dayOfWeek) {
        case 5: // Friday
        case 6: // Saturday
        case 0: // Sunday
            ?> <h3>Today: Goblin and Slime</h3><span class="slime-and-goblin"></span> <?php
            break;
        case 1: // Monday
        case 3: // Wednesday
            ?> <h3>Today: Slime Empire</h3><span class="slime"></span> <?php
            break;
        default: // Tuesday, Thursday
            ?> <h3>Today: Goblin Ruins</h3><span class="goblin"></span> <?php
            break;
      }
			?>
		</div>

		<!-- Gantt chart with current events -->
		<div class="container animated chart-parent">
			<div class="show-more">show all events</div>
			<div class="chart-events">
				<!-- Date header will be dynamically created using JavaScript -->
				<div class="chart-dates"></div>
			
				<div class="chart-container">
					<!-- Additional chart bars can be added here -->
					<?php
						$eventQuery = new WP_Query( array(
								'meta_key'       => 'end_date',
								'meta_value'     => date('Y-m-d', strtotime('-14 days')),
								'meta_compare'   => '>=',
								'post_type'      => 'events',
								'posts_per_page' => -1,
								'category_name'  => $category_id
						) );
						if ( $eventQuery->have_posts() ) :
								while ( $eventQuery->have_posts() ) : $eventQuery->the_post();
									get_template_part('template-parts/active-events');
								endwhile; wp_reset_postdata();
						endif; 
					?>
				</div>
			</div>
		</div>
	</div>
	<?php } else { ?>
	<!-- Gantt chart with current events -->
	<div class="container animated chart-parent">
		<div class="show-more">show all events</div>
		<div class="chart-events">
			<!-- Date header will be dynamically created using JavaScript -->
			<div class="chart-dates"></div>
		
			<div class="chart-container">
				<!-- Additional chart bars can be added here -->
				<?php
					$eventQuery = new WP_Query( array(
							'meta_key'       => 'end_date',
							'meta_value'     => date('Y-m-d', strtotime('-14 days')),
							'meta_compare'   => '>=',
							'post_type'      => 'events',
							'posts_per_page' => -1,
							'category_name'  => $category_id
					) );
					if ( $eventQuery->have_posts() ) :
							while ( $eventQuery->have_posts() ) : $eventQuery->the_post();
								get_template_part('template-parts/active-events');
							endwhile; wp_reset_postdata();
					endif; 
				?>
			</div>
		</div>
	</div>
<?php } ?>

<!-- all the guides -->
<div class="double guides-wrapper animated">
	<div class="news">
    <?php
			$query = new WP_Query( array(
					'post_type'      => array('post', 'guides', 'characters'),
					'posts_per_page' => 3,
					'no_found_rows'  => true,
					'tag'            => 'featured',
					'category_name'  => $category_id
			) );
			if ( $query->have_posts() ) :
					?> <h2 class="guides-title">Featured content ➜</h2><div class="guides"> <?php
					while ( $query->have_posts() ) : $query->the_post();

							get_template_part('template-parts/guide');

					endwhile; wp_reset_postdata();
					?> </div> <?php
			endif; 
		?>
    
		<?php
			$query = new WP_Query( array(
					'post_type'      => 'guides',
					'posts_per_page' => -1,
					'no_found_rows'  => true,
					'tag'            => 'basics',
					'category_name'  => $category_id
			) );
			if ( $query->have_posts() ) :
					?> <h2 class="guides-title">The basics ➜</h2><div class="guides"> <?php
					while ( $query->have_posts() ) : $query->the_post();

							get_template_part('template-parts/guide');

					endwhile; wp_reset_postdata();
					?> </div> <?php
			endif; 
		?>
		
		<?php
			$query = new WP_Query( array(
					'post_type'      => 'guides',
					'posts_per_page' => -1,
					'no_found_rows'  => true,
					'tag'            => 'general',
					'category_name'  => $category_id
			) );
			if ( $query->have_posts() ) :
					?> <h2 class="guides-title">General Guides ➜</h2><div class="guides"> <?php
					while ( $query->have_posts() ) : $query->the_post();

							get_template_part('template-parts/guide');

					endwhile; wp_reset_postdata();
					?> </div> <?php
			endif; 
		?>
		
		<?php
			$query = new WP_Query( array(
					'post_type'      => 'guides',
					'posts_per_page' => -1,
					'no_found_rows'  => true,
					'tag'            => 'game-modes',
					'category_name'  => $category_id
			) );
			if ( $query->have_posts() ) :
					?> <h2 class="guides-title">Game Modes ➜</h2><div class="guides"> <?php
					while ( $query->have_posts() ) : $query->the_post();

							get_template_part('template-parts/guide');

					endwhile; wp_reset_postdata();
					?> </div> <?php
			endif; 
		?>
		
		<?php
			$query = new WP_Query( array(
					'post_type'      => 'guides',
					'posts_per_page' => -1,
					'no_found_rows'  => true,
					'tag'            => 'bosses',
					'category_name'  => $category_id
			) );
			if ( $query->have_posts() ) :
					?> <h2 class="guides-title">Bosses ➜</h2><div class="guides"> <?php
					while ( $query->have_posts() ) : $query->the_post();

							get_template_part('template-parts/guide');

					endwhile; wp_reset_postdata();
					?> </div> <?php
			endif; 
		?>

		<?php
			$query = new WP_Query( array(
					'post_type'      => 'guides',
					'posts_per_page' => -1,
					'no_found_rows'  => true,
					'tag'            => 'lost-sectors',
					'category_name'  => $category_id
			) );
			if ( $query->have_posts() ) :
					?> <h2 class="guides-title">Lost Sectors ➜</h2><div class="guides"> <?php
					while ( $query->have_posts() ) : $query->the_post();

							get_template_part('template-parts/guide');

					endwhile; wp_reset_postdata();
					?> </div> <?php
			endif; 
		?>
	</div>
</div>

<?php

get_footer();

?>