<?php
	// Custom fields for the event
	$startDate = get_post_meta( get_the_ID(), 'start_date', true );
	$endDate = get_post_meta( get_the_ID(), 'end_date', true );
	$bgColor = get_post_meta( get_the_ID(), 'bgColor', true );
	$eventLink = get_post_meta( get_the_ID(), 'eventLink', true );
?>

<a 
	class="chart-bar lozad" 
	<?php if ( ! empty( $eventLink ) ) { ?> href="<?php echo $eventLink; ?>" <?php } ?>
	data-start-date="<?php if ( ! empty( $startDate ) ) { echo $startDate; } ?>" 
	data-end-date="<?php if ( ! empty( $endDate ) ) { echo $endDate; } ?>"
	style="background-color: <?php if ( ! empty( $bgColor ) ) { echo $bgColor; } ?>"
	data-background-image="<?php echo the_post_thumbnail_url(); ?>"
>
	<div class="overlay" style="background: linear-gradient(to right, rgba(255, 255, 255, 0) 0%, <?php if ( ! empty( $bgColor ) ) { echo $bgColor; } ?> 100%);"></div>
	<p><?php the_title(); ?></p>
</a>