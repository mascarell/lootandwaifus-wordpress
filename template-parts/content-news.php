<div class="post container">
	<div class="margin">
		<a class="thumbnail" href="<?php the_permalink(); ?>">
			<div class="img lozad" data-background-image="<?php echo the_post_thumbnail_url(); ?>"></div>
		</a>
		<div class="content">
			<p class="date"><?php echo get_the_date(); ?></p>
			<a href="<?php the_permalink(); ?>"><h2><?php the_title(); ?></h2></a>
			<?php echo the_excerpt(); ?>
		</div>
	</div>
</div>