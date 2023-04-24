<?php /* Template Name: Guides */ ?>

<?php

get_header();

$categories = get_the_category();
$category_id = $categories[0]->name;

?>

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

<?php 
if($category_id == 'Nikke') { 
	?>
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
				if ($currentHour >= 22) {
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

		<div class="container recent">
			<h3>Recent news</h3>
			<?php
				$query = new WP_Query( array(
						'post_type'      => 'post',
						'posts_per_page' => 12,
						'category_name'  => $category_id
				) );
				if ( $query->have_posts() ) :
						while ( $query->have_posts() ) : $query->the_post();
							get_template_part('template-parts/recent-news');
						endwhile; wp_reset_postdata();
				endif; 
			?>
		</div>
	</div>
	<?php
} else if($category_id == 'haze') { 
} else { 
} 
?>

<!-- all the guides -->
<div class="double guides-wrapper animated">
	<div class="news">
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
	</div>

	<?php get_template_part('template-parts/sidebar'); ?>
</div>

<?php

get_footer();

?>