<div class="post guide covering container">
		<?php
	$last_modified = strtotime(get_the_modified_date('Y-m-d')); // get the last modified date of the post
	$one_week_ago = strtotime('-6 days'); // get the timestamp of 4 days ago

	if ($last_modified > $one_week_ago) {
		?> <span class="updated">updated</span> <?php
	}
	?>
	<a href="<?php the_permalink(); ?>" class="margin">
		<div class="thumbnail" href="<?php the_permalink(); ?>">
			<div class="img lozad" data-background-image="<?php echo the_post_thumbnail_url(); ?>"></div>
		</div>
		<div class="content">
			<h2><?php the_title(); ?></h2>
		</div>
	</a>
</div>